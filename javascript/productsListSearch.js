/******************************************************************** 

	MODULO INVENTORY LIST:
	
	carica la lista degli inventari da server
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*inizializza la pagina del carrello caricando gli elementi HTML nella tabella*/
 function startProductsList(selectionMode){
	
	var params = getSearchParams();
	/*server code*/
	//loadDoc(loadXMLInventories,"getInventories"+params);
    var search = document.getElementById("ricerca").value;
	
	loadDoc(function(xml){
		loadXMLProducts(xml,selectionMode);
		}
	,"../productList/productsSearch.php","ricerca="+search);
 }
 
 /*carica il contenuto del catalogo da xml nella tabella catalogTable*/
 function loadXMLProducts(xml,selectionMode) {
			
		var i;
		 xmlDoc = xml.responseXML;
		console.log(xml);
		var list = document.getElementById("elementGrid");
		var x = xmlDoc.getElementsByTagName("product");

		list.innerHTML = "";
		
		for (i = 0; i <x.length; i++) { 
			var product = [];
			product.id = x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
			product.name = x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
			product.image = x[i].getElementsByTagName("image")[0].childNodes[0].nodeValue;
	
			list.innerHTML+=inventoryString(product,selectionMode);
		}
		
		//aggiorno le dimensioni
		onResize();
}


 /*genera il codice HTML del singolo prodotto*/
function inventoryString(item,selectionMode){

	var url ="../productsDetails/productsDetailsControl.php?id="+item.id;
	
	var itemString = "";
	
	if (selectionMode){
		itemString = "<a onclick='document.selectItem(this)' class='notSelected' pid="+item.id+">";
	}else{
		itemString = "<a href='"+url+"'>";
	}

	itemString = "<div class='inventoryElem'>"+
				"<div class='squareBox'>"+
					itemString+
					"<div class='circle squareContent' style='background-color: initial;background-image: url(../uploads/20x20/"+item.image+");'>"+
							"<div class='circle squareContent' style='margin: 0;border: none;background-color: initial;background-image: url(../uploads/150x150/"+item.image+");'></div>"+
						"</div><a>"+
					"<div style='bottom: 0;right: 0;position: absolute;margin-right: 27px;'>"+
						"<input type='number' class='itemCounter' value='1' />"+
				"</div></div>"+
				"<span class='inventoryName'>"+item.name+"</span>"+	
			"</div>";
			
	return itemString;
 }
