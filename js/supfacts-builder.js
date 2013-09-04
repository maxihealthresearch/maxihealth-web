$(function() {


var ingRowObj = {
"rowsperpage": "50",
"rows": []
   };

//automatically output ingredient rows
for (var i=0;i< ingRowObj.rowsperpage;i++)
{
ingRowObj.rows[i] = {};
ingRowObj.rows[i].zerobasecount = i;
ingRowObj.rows[i].onebasecount = i+1;
}
var template3 = $('#ingRowTpl').html();
var html3 = Mustache.to_html(template3, ingRowObj);
$('#ingRowArea').html(html3);//display preview html

displayJson(ingRowObj);

//auto fill
$('#autofill').click(function() {
	$('[name="serving"]').val('6 tablets');
	
	$('[name="ingredients[0][name]"]').val('vitamin a');
	$('[name="ingredients[1][name]"]').val('vitamin b');
	$('[name="ingredients[2][name]"]').val('vitamin c');
	$('[name="ingredients[0][amount]"]').val('100');
	$('[name="ingredients[1][amount]"]').val('200');
	$('[name="ingredients[2][amount]"]').val('300');
	$('[name="ingredients[0][dv]"]').val('10');
	$('[name="ingredients[1][dv]"]').val('20');
	$('[name="ingredients[2][dv]"]').val('30');
	$('[name="notestablished"]').attr('checked', true);
});

//this function is only to view json data for me.
function displayJson(obj) {
	var json_text = JSON.stringify(obj, null, 2);
	 console.log(json_text)
}

var dataObj = $('form').serializeObject();
var template2 = $('#countTpl').html();
var html2 = ""

//Output number of ingredients
function countIngs() {
//dataObj.ingredients.splice(0, 1);// remove 1st ingredient so operator won't put line after last ingredient
for (var i=0;i< dataObj.ingredients.length;i++)
{
dataObj.ingredients[i].count = i+1;
}
html2 = Mustache.to_html(template2, dataObj);
$('#lineafter').html(html2);
	
}
countIngs();
/*
as long as this is not last item put thin line uless thick line checkbox is check
      
*/      

    $('form').submit(function() {

	//collect values from form
	dataObj = $('form').serializeObject();
	

//remove empty ingredients keys
var totalTemp = dataObj.ingredients.length - 1;
for (var i=totalTemp; i>=0; i--)
{
	if ($.trim(dataObj.ingredients[i].name) == "") {
	dataObj.ingredients.splice(i, 1);
	}
}

	//modify object by adding keys which help to display separator lines between ingredients
	var totalIngredients = dataObj.ingredients.length - 1;
	dataObj.ingredients[totalIngredients].last = "T";
	if (dataObj.hasOwnProperty('addthickline')) {
	dataObj.ingredients[dataObj.lineafter-1].thickline = "T";
	}
	
	//Mustache function
	var template = $('#factsTpl').html();
	var html = Mustache.to_html(template, dataObj);
	$('#previewTable').html(html);//display preview html
	$('#htmltocopy').html(html);//paste html into textarea(final step)

countIngs();

	//don't submit form
    return false;
    });

});