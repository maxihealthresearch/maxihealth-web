var AllProductsPopup = {
	initialize: function () {
		this.element = $('product_popup');
		this.element.observe('mouseout', this.delayedClose.bind(this));
		this.element.observe('mouseover', this.cancelDelayedClose.bind(this));
		this._close = this.close.bind(this);
		this._onSuccess = this.onSuccess.bind(this);
		this._onFailure = this.onFailure.bind(this);
		this.titleElement = $('product_popup_title');
		this.contentElement = $('product_popup_content');
		
		this.button = document.createElement('a');
		this.button.id = 'product_popup_button';
		this.button.onclick = this.open.bindAsEventListener(this);
		this.button.onmouseover = this.open.bindAsEventListener(this);
		var body = $('body');
		var lis = body.getElementsByTagName ('li');
		this._hideButton = this.hideButton.bind(this);
		for (var i = 0; i < lis.length; i ++) {
			var li = lis[i];
			if (/^product_(.*)_(\d*)$/.match(li.id)) {
				li.onmouseover = this.showButton.bind(this, li.id);
				li.onmouseout = this._hideButton;
			}
		}
	},
	showButton: function (id) {
		if (this.lastHoveredID == id)
			return;
		if (this.lastHoveredID && this.lastHoveredID != id)
			this.hideButton();
		var element = $(id);
		if (!element) return;
		element.addClassName('hover');
		if (element.childNodes.length > 0)
			element.insertBefore(this.button, element.childNodes[0]);
		else
			element.appendChild(this.button);
		this.lastHoveredID = id;
	},
	hideButton: function () {
		if (!this.lastHoveredID)
			return;
		var element = $(this.lastHoveredID);
		element.removeClassName('hover');
		//element.removeChild(this.button);
		//this.lastHoveredID = null;
	},
	open: function () {
		var id = this.lastHoveredID;
		if (!id) return;
		var element = $(this.lastHoveredID);
		if (!element) return;
		var chunk = /^product_(.*)_(\d*)$/.exec(this.lastHoveredID);
		var id = chunk[2];
		
		this.titleElement.innerHTML = 'Loading...';
		this.contentElement.innerHTML = '<div class="loading"></div>';
		this.element.style.display = 'block';
		Element.clonePosition(this.element, element, {setLeft:true, setTop:true, setWidth:false, setHeight:false, offsetLeft:-10, offsetTop:-10});
		if (this.ajaxRequest) {
			this.ajaxRequest.abort();
		}
		this.ajaxRequest = new Ajax.Request ('/ajax/product-popup.json',{
			method: 'get',
			parameters: {pid: id},
			onSuccess: this._onSuccess,
			onFailure: this._onFailure
		})
	},
	close: function () {
		this.element.style.display = 'none';
		if (this.ajaxRequest) {
			this.ajaxRequest.abort();
		}
		this.ajaxRequest = null;
	},
	delayedClose: function () {
		this.delayedCloseTimer = setTimeout(this._close, 1000);
	},
	cancelDelayedClose: function () {
		if (this.delayedCloseTimer)
			clearTimeout(this.delayedCloseTimer);
		this.delayedCloseTimer = 0;
	},
	onSuccess: function (ajaxTransport) {
		this.ajaxRequest = null;
		var res = null;
		try {
			eval ('res = ' + ajaxTransport.responseText);
		} catch (e) {
			this.onFailure(ajaxTransport);
			return;
		}
		if (res) {
			this.titleElement.innerHTML = res.title;
			this.contentElement.innerHTML = res.content;
		}
	},
	onFailure: function (ajaxTransport) {
		this.contentElement = '<div class="loading">Error! Sorry</div>';
		this.ajaxRequest = null;
	}
}

Event.observe(window, 'load', AllProductsPopup.initialize.bind(AllProductsPopup));