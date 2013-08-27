var descriptionTab, supplementalFactsTab, reviewsTab, 
	descriptionTabBtn, supplementalFactsTabBtn, reviewsTabBtn,
	currentlyAnimatingTab, tabAnimationTimer, tabAnimationReachedOpacity,
	expandAllTabsBtn;
function setupTabs () {
	descriptionTab = $('description_tab') ;
	supplementalFactsTab = $('supplemental_facts_tab');
	reviewsTab = $('reviews_tab');
	descriptionTabBtn = $('description_tab_btn') ;
	supplementalFactsTabBtn = $('supplemental_facts_tab_btn');
	reviewsTabBtn = $('reviews_tab_btn');
	expandAllTabsBtn = $('expand_all_btn');
}

function switchTab (index) {
	descriptionTab.style.display = 'none';
	supplementalFactsTab.style.display = 'none';
	reviewsTab.style.display = 'none';
	descriptionTabBtn.removeClassName('selected');
	supplementalFactsTabBtn.removeClassName('selected');
	reviewsTabBtn.removeClassName('selected');;
	expandAllTabsBtn.removeClassName('selected');
	if (currentlyAnimatingTab) {
		currentlyAnimatingTab.setOpacity(1);
	}
	if (tabAnimationTimer)
		clearInterval(tabAnimationTimer);
		
	switch (index) {
		case 0: 
			descriptionTab.style.display = 'block'; 
			descriptionTabBtn.addClassName('selected');
			currentlyAnimatingTab = descriptionTab;
			break;
		case 1: 
			supplementalFactsTab.style.display = 'block'; 
			supplementalFactsTabBtn.addClassName('selected');
			currentlyAnimatingTab = supplementalFactsTab;
			break;
		case 2:
			reviewsTab.style.display = 'block'; 
			reviewsTabBtn.addClassName('selected');
			currentlyAnimatingTab = reviewsTab; 
			break;
	}
	if (currentlyAnimatingTab) {
		currentlyAnimatingTab.setOpacity (0);
		tabAnimationReachedOpacity = 0;
		tabAnimationTimer = setInterval(animateTabFadeIn, 60);
	}
	return false;
}

function animateTabFadeIn () {
	tabAnimationReachedOpacity += 0.25;
	currentlyAnimatingTab.setOpacity (tabAnimationReachedOpacity);
	if (tabAnimationReachedOpacity > 0.99) {
		clearInterval(tabAnimationTimer);
		tabAnimationTimer = 0;
		currentlyAnimatingTab = null;
	}
}

function showExpandedView () {
	descriptionTabBtn.removeClassName('selected');
	supplementalFactsTabBtn.removeClassName('selected');
	reviewsTabBtn.removeClassName('selected');
	expandAllTabsBtn.addClassName('selected');
	descriptionTab.style.display = 'block';
	supplementalFactsTab.style.display = 'block';
	reviewsTab.style.display = 'block';
	
	descriptionTab.setOpacity (0);
	supplementalFactsTab.setOpacity (0);
	reviewsTab.setOpacity (0);
	tabAnimationReachedOpacity = 0;
	tabAnimationTimer = setInterval(animateAllTabsFadeIn, 60);
	
	return false;
}

function animateAllTabsFadeIn () {
	tabAnimationReachedOpacity += 0.25;
	descriptionTab.setOpacity (tabAnimationReachedOpacity);
	supplementalFactsTab.setOpacity (tabAnimationReachedOpacity);
	reviewsTab.setOpacity (tabAnimationReachedOpacity);
	if (tabAnimationReachedOpacity > 0.99) {
		clearInterval(tabAnimationTimer);
		tabAnimationTimer = 0;
	}
}

Event.observe(window, 'load', setupTabs);

var email_filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

var reviewForm = {
	initialize: function () {
		this.reviewForm = $('review_form');
		this.reviewForm.observe('submit', this.onSubmit.bind(this));
		this.messageArea = $('review_send_result');
		
		this.textInput = this.reviewForm.getElementsByTagName('textarea')[0];
		
		var inputs = this.reviewForm.getElementsByTagName('input');
		for (var i = 0; i < inputs.length; i ++)
			if (inputs[i].name)
				this[inputs[i].name + 'Input'] = inputs[i];
		
		this.sendingElement = document.createElement('div');
		this.sendingElement.innerHTML = 'Sending, please wait!';
		this.sendingElement.className = 'ajax_sending';
		this.sendingElement.style.display = 'none';
		
		this.submitInput.parentNode.insertBefore(this.sendingElement, this.submitInput);
		
		this.nameInput.disabled = false;
		this.emailInput.disabled = false;
		this.textInput.disabled = false;
	},
	onSubmit: function (event) { 
		Event.stop(event);
		this.hideMessages();
		if (this.nameInput.value.trim().length == 0) {
			this.showError('Please enter your name!');
			this.nameInput.focus();
			return;
		}
		if (this.emailInput.value.trim().length == 0) {
			this.showError('Please enter your email!');
			this.emailInput.focus();
			return;
		}
		if (!this.emailInput.value.match(email_filter)) {
			this.showError('The provided email does not appear valid!');
			this.emailInput.focus();
			return;
		}
		if (this.textInput.value.trim().length == 0) {
			this.showError('Please enter your story!');
			this.textInput.focus();
			return;
		}
		
		this.nameInput.disabled = true;
		this.emailInput.disabled = true;
		this.textInput.disabled = true;
		
		this.sendingElement.style.display = 'block';
		this.submitInput.style.display = 'none';
		
		new Ajax.Request ('/ajax/post-review.json', {
			parameters: {name: this.nameInput.value, email: this.emailInput.value, 
				story: this.textInput.value, pid: this.pidInput.value},
			onSuccess: this.onSubmitSuccess.bind(this),
			onFailure: this.onSubmitFailure.bind(this)
		})
	},
	reenableForm: function () {
		this.nameInput.disabled = false;
		this.emailInput.disabled = false;
		this.textInput.disabled = false;
		this.sendingElement.style.display = 'none';
		this.submitInput.style.display = '';
	},
	onSubmitSuccess: function (ajaxTransport) {
		var res = null;
		try {
			eval ('res=' + ajaxTransport.responseText);
		} catch (e) {
		}
		if (!res || !res.success) {
			this.onSubmitFailure(ajaxTransport);
			return;
		}
		this.reenableForm();
		this.reviewForm.style.display = 'none';
		this.showMessage('Thank you for sharing your story with us!<br />We will review and publish it as soon as possible');
		this.nameInput.value = '';
		this.emailInput.value = '';
		this.textInput.value = '';
	},
	onSubmitFailure: function (ajaxTransport) {
		this.reenableForm();
		this.showError('There was a problem posting your story! Please check your internet connection and try again!');
	},
	showError: function (msg) {
		this.messageArea.innerHTML = '<p class="msg_error">' + msg + '</p>'; 
	},
	showMessage: function (msg) {
		this.messageArea.innerHTML = '<p class="msg_success">' + msg + '</p>';
	},
	hideMessages: function () {
		this.messageArea.innerHTML = '';
	}
}

Event.observe(window, 'load', reviewForm.initialize.bind(reviewForm));

var EmailFriend = {
	initialize: function () {
		this.initialized = true;
		/*this.element = document.createElement ('div');
		this.element.id = 'email_product_box';
		$('body').appendChild(this.element);
		this.element.innerHTML = '';*/
		this.element = $('product_popup');
		this.element.style.width = '335px';
		this.form = $('email_friend_form');
		this.form.onsubmit = this.onSubmit.bindAsEventListener(this); 
		this.messageArea = $('email_friend_send_result');
		this.nameInput = this.form.getElementsBySelector('input[name=name]')[0];
		this.emailInput = this.form.getElementsBySelector('input[name=email]')[0];
		this.recipientNameInput = this.form.getElementsBySelector('input[name=recipient_name]')[0];
		this.recipientEmailInput = this.form.getElementsBySelector('input[name=recipient_email]')[0];
		this.submitInput = $('btn_email_friend');
		this.sendingElement = $('email_friend_sending');
		this.sendingElement.style.display = 'none';
		
		this.enableForm();
		
		this._onClickAway = this.onClickAway.bindAsEventListener(this);
		
		this.activatorLink = $('email_friend_link');
		this.activatorLink.onclick = this.open.bindAsEventListener(this);
		Element.clonePosition(this.element, this.activatorLink, {setLeft:true, setTop:true, setWidth:false, setHeight:false, offsetLeft:window.isRTL?this.activatorLink.offsetWidth + 8:-345, offsetTop:-10});
	},
	open: function (event) {
		Event.stop(event);
		this.element.style.display = 'block';
		/*this.nameInput.value = '';
		this.emailInput.value = '';
		this.recipientNameInput.value = '';
		this.recipientEmailInput.value = '';*/
		
		this.hideMessages();
		Event.observe(document, 'click', this._onClickAway);
		this.nameInput.focus();
	},
	close: function () {
		this.element.style.display = 'none';
	},
	onSubmit: function (event) {
		Event.stop(event);
		this.hideMessages();
		
		if (this.nameInput.value == '') {
			this.showError('Please enter your name!');
			this.nameInput.focus();
			return;
		}
		
		if (this.emailInput.value == '') {
			this.showError('Please enter your email address!');
			this.emailInput.focus();
			return;
		}
		
		if (!this.emailInput.value.match(email_filter)) {
			this.showError('The provided email does not appear valid!');
			this.emailInput.focus();
			return;
		}
		
		if (this.recipientNameInput.value == '') {
			this.showError('Please enter the recipient\'s name!');
			this.recipientNameInput.focus();
			return;
		}
		
		if (this.recipientEmailInput.value == '') {
			this.showError('Please enter the recipient\'s email address!');
			this.recipientEmailInput.focus();
			return;
		}
		
		if (!this.recipientEmailInput.value.match(email_filter)) {
			this.showError('The provided recipient email does not appear valid!');
			this.recipientEmailInput.focus();
			return;
		}
		
		var params = this.form.serialize(true);
		
		this.disableForm();
		this.sendingElement.style.display = 'block';
		this.submitInput.style.display = 'none';
		
		new Ajax.Request ('/ajax/email-friend.json', {
			method:'post',
			parameters: params,
			onSuccess: this.onSendSuccess.bind(this),
			onFailure: this.onSendFailure.bind(this)
		});
	},
	disableForm: function () {
		this.nameInput.disabled = true;
		this.emailInput.disabled = true;
		this.recipientNameInput.disabled = true;
		this.recipientEmailInput.disabled = true;
	},
	enableForm: function () {
		this.nameInput.disabled = false;
		this.emailInput.disabled = false;
		this.recipientNameInput.disabled = false;
		this.recipientEmailInput.disabled = false;
	},
	onClickAway: function (event) {
		if (!Position.within(this.element, Event.pointerX(event), Event.pointerY(event)) &&
			Event.element(event).id != this.activatorLink &&
			!Element.descendantOf(Event.element(event), this.element))
			this.close();
	},
	onSendSuccess: function () {
		this.showMessage('Thank you!');
		this.sendingElement.style.display = 'none';
		this.submitInput.style.display = 'block';
		this.enableForm();
		this.recipientNameInput.focus();
	},
	onSendFailure: function () {
		this.enableForm();
		this.sendingElement.style.display = 'none';
		this.submitInput.style.display = 'block';
		this.nameInput.focus();
		this.showError('There was a problem sending your email.<br />' + 
						'Please check your internet connection and try again.')
	},
	showError: function (msg) {
		this.messageArea.innerHTML = '<span class="msg_error">' + msg + '</span>'; 
	},
	showMessage: function (msg) {
		this.messageArea.innerHTML = '<span class="msg_success">' + msg + '</span>';
	},
	hideMessages: function () {
		this.messageArea.innerHTML = '';
	}
}
Event.observe(window, 'load', EmailFriend.initialize.bind(EmailFriend));








jQuery.noConflict();

// Put all your jquery code in your document ready area to avoid conflict with prototype
(function ($) {
    
    $("#productPrintMail").on("click", ".product-print", printPage);
    
    function printPage() {
        window.open('?print', 'print', 'width=600,menubar=1');
    }
    
})(jQuery);    
