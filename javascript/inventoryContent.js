/******************************************************************** 

	MODULO INVENTORY CONTENT:
	
	carica il contenuto di un inventario da server
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*inizializza la pagina caricando gli elementi HTML nella tabella*/
 function loadInventoryContent(idInventory){
	
	var params = getSearchParams();
	
	if(params!="")	params+="&";
	
	params+="idInventory="+idInventory;
	console.log(params);
	
	loadDoc(
		function(xml){
			loadXMLItems(xml,idInventory);
		}
	,"itemListRetrieve.php",params);
 }
 
 /*carica il contenuto del catalogo da xml nella tabella catalogTable*/
 function loadXMLItems(xml,inventory) {
			
		var i;
		var xmlDoc = xml.responseXML;
		console.log(xml)
		//if(xmlDoc==null){ siteOfflineError();}
		
		var list = document.getElementById("elementGrid");
		var x = xmlDoc.getElementsByTagName("item");

		list.innerHTML = "";
		
		for (i = 0; i <x.length; i++) { 
			var item = [];
			item.idProdotto =x[i].getElementsByTagName("idProdotto")[0].childNodes[0].nodeValue;
            item.idInventario =x[i].getElementsByTagName("idInventario")[0].childNodes[0].nodeValue;
			item.name = x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
			item.imgUrl = x[i].getElementsByTagName("img")[0].childNodes[0].nodeValue;
			item.amount = x[i].getElementsByTagName("amount")[0].childNodes[0].nodeValue;
			list.innerHTML+=itemString(item,inventory);
		}
		
		//aggiorno le dimensioni
		onResize();
}


 /*genera il codice HTML del singolo prodotto*/
function itemString(item,inventory){

	var detailsUrl ="../productsDetails/productsDetailsControl.php?id="+item.idProdotto+"&inventory="+inventory;
	
	return "<div class='inventoryElem'>"+
				"<a class='removeItemButton' onClick=deleteProductFromInventory("+item.idProdotto+","+item.idInventario+")>×</a>"+	
				"<div class='squareBox'>"+
					"<a href='"+detailsUrl+"'>"+
						"<div class='circle squareContent' style='background-color: #99a8c1;background-image: url(../uploads/20x20/"+item.imgUrl+");'>"+
							"<div class='circle squareContent' style='margin: 0;border: none;background-color: transparent;background-image: url(../uploads/150x150/"+item.imgUrl+");'></div>"+
						"</div><a>"+
					"<div style='bottom: 0;right: 0;position: absolute;'>"+
						"<input id='amount"+item.idProdotto+"' onChange=updateAmount("+item.idProdotto+","+item.idInventario+") type='number' class='smallInputNumber' value='"+item.amount+"' />"+
				"</div></div>"+
				"<span class='inventoryName'>"+item.name+"</span>"+	
			"</div>";	
 }

/* chiama il servizio di creazione nuovo inventario*/ 
function createIventory(){
	 
	var str = document.getElementById("inventoryname").value;
	loadDoc(createHandler,"inventory/inventoryNew.php","inventoryName="+str);

}

function createHandler(xmlhttp){
	 
	var responseElem = document.getElementById("response");
	 
	if(xmlhttp.responseText==="inserimentoRiuscito"){
		document.getElementById("footer").style.visibility="hidden";
		responseElem.innerHTML = "<section class='infoBox'>Inventario creato!</section>";
	}else{
		
		var content = "<section class='infoBox' style='background:#f9d0d0;border-color:#f7a7a2;color:red;'>";
		content += "<p id='errorResponse'>Errore</p><ul class='errorList'><li> - "+xmlhttp.responseText+"</li></ul><br></section>";
		responseElem.innerHTML = content; 
		startInventoryList();
	}
 }