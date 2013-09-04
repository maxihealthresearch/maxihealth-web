var PhotoEnlarger = {
	initialize: function () {
		this.background = document.createElement('div');
		document.body.appendChild (this.background);
		this.background.id = 'pp_background';
		this.background.onclick = this.close.bindAsEventListener(this);
		
		this.loadingDisplay = document.createElement('div');
		document.body.appendChild (this.loadingDisplay);
		this.loadingDisplay.id = 'pp_loading';
		
		this.tmpImage = $(document.createElement ('img'));
		this.tmpImage.observe('load', this.imageLoaded.bind(this));
		
		this.element = document.createElement('div');
		this.element.style.position = 'fixed';
		this.element.id = 'pp_element';
		this.element.onclick = this.close.bindAsEventListener(this);
		this.element.innerHTML = '<div>Click to close</div>';
		document.body.appendChild (this.element);
		
		this._onBrowserResize = this.onBrowserResize.bindAsEventListener(this)
	},
	onLinkClick: function (event, element) {
		Event.stop(event);
		this.open(element.href);
	},
	open: function (src) {
		if (!this.initialized)
			this.initialize();
		/*this.element.display = 'block';
		Position.clone($('product_photo'), this.element);*/
		this.background.style.display = 'block';
		this.loadingDisplay.style.display = 'block';
		this.tmpImage.style.height = '';
		this.tmpImage.style.width = '';
		this.tmpImage.setOpacity(0.01);
		this.background.appendChild(this.tmpImage);
		this.openingSRC = src;
		this.tmpImage.src = src;
		Event.observe(window, "resize", this._onBrowserResize);
	},
	imageLoaded: function () {
		this.centerElement();
		this.element.insertBefore (this.tmpImage, this.element.childNodes[0]);
		this.tmpImage.setOpacity(1);
		
		this.loadingDisplay.style.display = 'none';
		this.element.style.display = 'block';
	},
	close: function (event) {
		Event.stop(event);
		this.background.style.display = 'none';
		this.loadingDisplay.style.display = 'none';
		this.element.style.display = 'none';
		Event.stopObserving(window, "resize", this._onBrowserResize);
	},
	centerElement: function () {
		var mh = this.background.offsetHeight - 40;
		var mw = this.background.offsetWidth - 40;
		var w = this.tmpImage.offsetWidth;
		var h = this.tmpImage.offsetHeight;
		var imgSyle = '';
		if (w > mw || h > mh) {
			var rr = Math.max (w / mw, h / mh);
			w = w / rr;
			h = h / rr;
			this.tmpImage.style.height = h + 'px';
			
		}
		this.element.style.height = h + 15 + 'px';
		this.element.style.width = w + 'px';
		this.element.style.top = (this.background.offsetHeight - h - 30) / 2 + 'px';
		this.element.style.left = (this.background.offsetWidth - w - 30) / 2 + 'px';
	},
	onBrowserResize: function (){
		this.centerElement();
	}
}
Event.observe(window, 'load', PhotoEnlarger.initialize.bind(PhotoEnlarger));