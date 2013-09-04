var descriptionTab, supplementalFactsTab, reviewsTab,
    descriptionTabBtn, supplementalFactsTabBtn, reviewsTabBtn,
    currentlyAnimatingTab, tabAnimationTimer, tabAnimationReachedOpacity,
    expandAllTabsBtn;

function setupTabs() {
    descriptionTab = $('description_tab');
    supplementalFactsTab = $('supplemental_facts_tab');
    reviewsTab = $('reviews_tab');
    descriptionTabBtn = $('description_tab_btn');
    supplementalFactsTabBtn = $('supplemental_facts_tab_btn');
    reviewsTabBtn = $('reviews_tab_btn');
    expandAllTabsBtn = $('expand_all_btn');
}

function switchTab(index) {
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
        currentlyAnimatingTab.setOpacity(0);
        tabAnimationReachedOpacity = 0;
        tabAnimationTimer = setInterval(animateTabFadeIn, 60);
    }
    return false;
}

function animateTabFadeIn() {
    tabAnimationReachedOpacity += 0.25;
    currentlyAnimatingTab.setOpacity(tabAnimationReachedOpacity);
    if (tabAnimationReachedOpacity > 0.99) {
        clearInterval(tabAnimationTimer);
        tabAnimationTimer = 0;
        currentlyAnimatingTab = null;
    }
}

function showExpandedView() {
    descriptionTabBtn.removeClassName('selected');
    supplementalFactsTabBtn.removeClassName('selected');
    reviewsTabBtn.removeClassName('selected');
    expandAllTabsBtn.addClassName('selected');
    descriptionTab.style.display = 'block';
    supplementalFactsTab.style.display = 'block';
    reviewsTab.style.display = 'block';

    descriptionTab.setOpacity(0);
    supplementalFactsTab.setOpacity(0);
    reviewsTab.setOpacity(0);
    tabAnimationReachedOpacity = 0;
    tabAnimationTimer = setInterval(animateAllTabsFadeIn, 60);

    return false;
}

function animateAllTabsFadeIn() {
    tabAnimationReachedOpacity += 0.25;
    descriptionTab.setOpacity(tabAnimationReachedOpacity);
    supplementalFactsTab.setOpacity(tabAnimationReachedOpacity);
    reviewsTab.setOpacity(tabAnimationReachedOpacity);
    if (tabAnimationReachedOpacity > 0.99) {
        clearInterval(tabAnimationTimer);
        tabAnimationTimer = 0;
    }
}

Event.observe(window, 'load', setupTabs);

var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

var reviewForm = {
    initialize: function () {
        this.reviewForm = $('review_form');
        this.reviewForm.observe('submit', this.onSubmit.bind(this));
        this.messageArea = $('review_send_result');

        this.textInput = this.reviewForm.getElementsByTagName('textarea')[0];

        var inputs = this.reviewForm.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++)
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

        new Ajax.Request('/ajax/post-review.json', {
            parameters: {
                name: this.nameInput.value,
                email: this.emailInput.value,
                story: this.textInput.value,
                pid: this.pidInput.value
            },
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
            eval('res=' + ajaxTransport.responseText);
        } catch (e) {}
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
        Element.clonePosition(this.element, this.activatorLink, {
            setLeft: true,
            setTop: true,
            setWidth: false,
            setHeight: false,
            offsetLeft: window.isRTL ? this.activatorLink.offsetWidth + 8 : -345,
            offsetTop: -10
        });
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

        new Ajax.Request('/ajax/email-friend.json', {
            method: 'post',
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
            Event.element(event).id != this.activatorLink && !Element.descendantOf(Event.element(event), this.element))
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

    var imageSwitcher = (function () {

        var $productTop = $("#productTop"),
            $productID = $productTop.data("productid"),
            $photoWrap = $("product-top-photo-wrap"),
            $zoomIcon = $productTop.find(".product-top-single-zoom"),
            $productArrow = $("#productTop").find(".js-product-arrow"),
            $thumbList = $(".product-top-thumblist"),
            $thumb = $thumbList.find("li"),
            $thumbsLength = $thumbList.find("li").length,
            $productPhoto = $productTop.find(".js-product-pic"),
            $productCaption = $productTop.find(".product-top-caption"),
            productCaptionText,
            productImageDir = "/images/products/",
            imageIndex = 0,
            imageArray = [$productID];

        for (i = 2; i < $thumbsLength + 1; i++) {
            imageArray.push($productID + "_" + i);
        }


        function setImageIndex(direction) {

            if (direction === "prev") {
                if (imageIndex === 0) {
                    imageIndex = $thumbsLength - 1;
                } else {
                    imageIndex = imageIndex - 1;
                }
            } else {
                if (imageIndex === $thumbsLength - 1) {
                    imageIndex = 0;
                } else {
                    imageIndex = imageIndex + 1;
                }
            }


        }

        function populateCaption() {
            productCaptionText = $thumbList.find(".product-top-thumblist-selected").attr("title");
            $productCaption.text(productCaptionText);
        }

        function thumbSwitcher() {


            if (!$(this).is(".product-top-thumblist-selected")) {
                $thumb.removeClass("product-top-thumblist-selected");
                $(this).addClass("product-top-thumblist-selected");

                var $liIndex = $thumb.index(this);

                imageIndex = $liIndex;
                changeHeroImage();
                populateCaption();

            }


        }

        function changeHeroImage() {
            $productPhoto.parent().animate({
                right: "300px"
            }, {
                duration: 200,
                complete: function () {
                    /*$productPhoto.hide();*/
                    $(this).css({
                        right: "-300px"
                    });
                    $productPhoto.attr("src", productImageDir + imageArray[imageIndex] + ".png");
                    $("body").data("imageid", imageArray[imageIndex]);
                }
            }).animate({
                right: 0
            }, 500);
        }


        function productSwitchImage(event) {
            var direction = $(this).data("direction");


            setImageIndex(direction);

            changeHeroImage();


            $thumb.removeClass("product-top-thumblist-selected");
            $thumbList.find("li:eq(" + imageIndex + ")").addClass("product-top-thumblist-selected");
            populateCaption();
        }

        return {
            thumb_switcher: thumbSwitcher,
            switch_image: productSwitchImage
        };

    })();


    var Gallery = (function () {

        var $bgElements = $("#main_container"),
            $modalWindow = $("#adsModalContainer"),
            $overlay = $("#adsModalOverlay"),
            $productID = $("#productTop").data("productid"),
            $bigImage = $("#adsModalContainer").find(".modal-gallery-product"),
            modalURL = "/includes/boxes/modal-product-gallery.php?productid=",
            imageList = [],
            selectedImageID,
            prev_id,
            next_id;

        function setImageListValues(imageid) {
            imageList.length = 0;
            var $modalGalleryList = $modalWindow.find(".modal-gallery-list li");
            for (i = 0; i < $modalGalleryList.length; i++) {
                var photoid = $modalGalleryList.eq(i).data("photoid");
                imageList.push(photoid);
            }

            selectedImageID = imageid.toString();
        }

        function setLocHash() {
            location.hash = "product-gallery";
        }

        function transition(pictype, imageid) {
            var modalURLWithParams = $("body").data("modal_product_gallery_url") + $productID + "&imageid=" + imageid + "&pictype=" + pictype;
            $modalWindow.load(modalURLWithParams);

            $bgElements.fadeOut('fast', function () {
                $modalWindow.fadeIn('slow', function () {
                    $overlay.show();
                    setImageListValues(imageid);
                });
            });
        }


        function navigate(e) {
            e.preventDefault();
            var $direction = $(this).data("navigate");
            var selectedImageIndex = imageList.indexOf(selectedImageID);
            var lastImageIndex = imageList.length - 1;
            prev_id = selectedImageIndex !== 0 ? imageList[selectedImageIndex - 1] : imageList[lastImageIndex];
            next_id = selectedImageIndex !== lastImageIndex ? imageList[selectedImageIndex + 1] : imageList[0];
            selectedImageID = $direction === 'next' ? next_id : prev_id;
            switchImage();

            var $modalGalleryList = $modalWindow.find(".modal-gallery-list li");
            $modalGalleryList.removeClass("modal-gallery-node-selected");
            $modalGalleryList.filter('[data-photoid=' + selectedImageID + ']').addClass("modal-gallery-node-selected");
        }

        function highlightNavNode() {
            if (!$(this).hasClass("modal-gallery-node-selected")) {
                $(this).parent().find("li").removeClass("modal-gallery-node-selected");
                $(this).addClass("modal-gallery-node-selected");
                selectedImageID = $(this).data("photoid");
                switchImage();
            }
        }

        function switchImage() {
            $modalWindow.find(".modal-gallery-product img").remove();
            $modalWindow.find(".modal-gallery-product").append("<img src='/images/products/" + selectedImageID + "_original.png'>");

        }

        function showGallery() {
            var pictype = $(this).closest("figure").data("pictype");
            var imageid;

            if (pictype === "ad") {
                imageid = $(this).closest("figure").data("adid");
            } else {
                imageid = $("body").data("imageid");
            }
            setLocHash();
            transition(pictype, imageid);
        }

        function checkGalleryHash() {
            var hash = window.location.hash.substr(1);
            if (hash === "product-gallery") {
                showGallery();
            }
        }

        return {
            show_gallery: showGallery,
            check_gallery_hash: checkGalleryHash,
            navigate: navigate,
            highlight_nav_node: highlightNavNode
        };

    })();


    var productPage = (function () {

        var $productTop = $("#productTop"),
            $modalWindow = $("#adsModalContainer");


        $("body").data("imageid", $(".js-product-pic").data("imageid"))
            .data("modal_product_gallery_url", "/includes/boxes/modal-product-gallery.php?productid=");

        var init = function () {
            bindEvents();
        };

        function bindEvents() {
            $("#productPrintMail").on("click", ".product-print", printPage);
            $(".product-top-thumblist").on("click", "li", imageSwitcher.thumb_switcher);
            $productTop.find(".js-product-arrow").on("click", imageSwitcher.switch_image);
            $productTop.find(".js-largezoom").on("click", Gallery.show_gallery);
            $productTop.find(".product-top-seead").on("click", Gallery.show_gallery);
            $modalWindow.on("click", ".modal-gallery-arrow", Gallery.navigate);
            $modalWindow.on("click", ".modal-gallery-list li", Gallery.highlight_nav_node);
            $(window).on("load", Gallery.check_gallery_hash);
        }

        function printPage() {
            window.open('?print', 'print', 'width=600,menubar=1');
        }

        return {
            init: init
        };

    })();

    productPage.init();



})(jQuery);