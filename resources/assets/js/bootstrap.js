
window.$ = window.jQuery = require('jquery');

require('bootstrap-sass');

window.axios = require('axios');

window.axios.defaults.headers.common = {
	'X-CSRF-TOKEN': window.Laravel.csrfToken,
	'X-Requested-With': 'XMLHttpRequest'
};

var app = {
	
	init: function() {
		this.getData();
	},

	getData: function() {
		axios.get("/api/candies")
		.then( (response) => this.displayList(response.data) );
	},

	displayList: function(data) {	
		let len = data.length;		
		for (let i = 0; i < len; i++) {
			$('#list').append(
				'<tr>' + 
				'<td>' + data[i].name + '</td>' +
				'<td id="stock_' + data[i].id + '">' + data[i].stock + '</td>' +
				'<td> <button data-id="' + data[i].id + '" class="btnAddToStock">Ajouter</button> </td>' +
				'<td> <button data-id="' + data[i].id + '" class="btnSubtractToStock">Supprimer</button> </td>' +
				'</tr>'
				);
		}
		this.listeners();
	},

	listeners: function() {
		$(".btnAddToStock").on("click", this.addToStock);
		$(".btnSubtractToStock").on("click", this.subtractToStock);
	},

	addToStock : function() {
		let id = $(this).data("id");
		let action = "add";
		axios.put("/api/changeStock/" + action + "/" + id)
		.then( (response) => app.changeStockValue(response.data, id) );
	},

	subtractToStock : function() {
		let id = $(this).data("id");
		let action = "subtract";
		axios.put("/api/changeStock/" + action + "/" + id)
		.then( (response) => app.changeStockValue(response.data, id) );	
	},

	changeStockValue : function(value, id) {
		$("#stock_" + id).html(value);
	}
}

app.init();
