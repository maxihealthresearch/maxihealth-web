var SearchByIngredients = {
	initialize: function () {
		var body = $('body');
		this.ingredientsLIs = body.getElementsBySelector('.clmn>ul>li');
		var a = null;
		for (var i = 0, c = this.ingredientsLIs.length; i < c; i ++) {
			a = this.ingredientsLIs[i].getElementsByTagName('a')[0];
			a.onclick = this.toggleIngredient.bindAsEventListener (this, i);
		}
		this.currentOpened = -1;
		
		this.productsDiv = document.createElement('div');
		this.productsDiv.id = 'products_with_ingredient_result';
		this.dataCache = [];
		this._onDataReceived = this.onDataReceived.bind(this);
		this._onDataFailure = this.onDataFailure.bind(this);
	},
	toggleIngredient: function (event, index) {
		Event.stop(event);
		if (this.currentOpened == index)
			this.closeLink();
		else
			this.openLink(index);
	},
	openLink: function (index) {
		if (this.currentOpened > -1) {
			this.closeLink();
		}
		this.currentOpened = index;
		var li = this.ingredientsLIs[this.currentOpened];
		var id = li.id;
		id = parseInt(id.substr(2));
		if (!id) {
			return;
			this.currentOpened = -1;
		}
		li.addClassName('open');
		li.appendChild(this.productsDiv);
		
		if (this.dataCache[id]) {
			this.displayProducts(this.dataCache[id]);
		} else {
			this.productsDiv.innerHTML = 'Loading...';
			this.productsDiv.className = 'ajax_sending';
			new Ajax.Request ('/ajax/products-by-ingredient.json', {
				method:'get', parameters:{ing:id}, 
				onSuccess: this._onDataReceived, onFailure: this._onDataFailure 
			});
		}
	},
	closeLink: function () {
		if (this.currentOpened < 0) return;
		this.ingredientsLIs[this.currentOpened].removeClassName('open');
		this.currentOpened = -1;
		if (this.productsDiv.parentNode) {
			this.productsDiv.parentNode.removeChild(this.productsDiv);
		}
	},
	
	onDataReceived: function (ajaxTransport) {
		this.productsDiv.className = '';
		var jsonData = null;
		try {
			eval ('jsonData = ' + ajaxTransport.responseText);
		} catch (e) { }
		if (jsonData) {
			this.dataCache[jsonData.ing] = jsonData.products;
			this.displayProducts(jsonData.products);
		} else
			this.onDataFailure();
	},
	
	onDataFailure: function () {
		this.productsDiv.innerHTML = 'Error! Please refresh the page and try again'
	},
	
	displayProducts: function (jsonData) {
		this.productsDiv.innerHTML = '';
		if (jsonData.length == 0) {
			this.productsDiv.innerHTML = 'There are no products with this ingredient!';
			return;
		}
		for (var i = 0, c = jsonData.length; i < c; i ++) {
			var pr = jsonData[i];
			var div = document.createElement('div');
			var a = document.createElement('a');
			a.innerHTML = pr.name;
			a.href = '/products/' + pr.url + '.html';
			a.title = pr.name;
			div.appendChild(a);
			div.id = 'product_0_' + pr.id;
			div.onmouseover = AllProductsPopup.showButton.bind(AllProductsPopup, div.id);
			div.onmouseout = AllProductsPopup._hideButton;
			this.productsDiv.appendChild(div);
			if (i == c - 1)
				div.className = 'last';
		}
	}
}

Event.observe(window, 'load', SearchByIngredients.initialize.bind(SearchByIngredients));