/******************************************************************** 

	MODULO INVENTORY LIST:
	
	carica la lista degli inventari da server
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*inizializza la pagina del carrello caricando gli elementi HTML nella tabella*/
 function startInventoryList(){
	
	var params = getSearchParams();
	/*server code*/
	//loadDoc(loadXMLInventories,"getInventories"+params);
 
	loadDoc(loadXMLInventories,"xml/inventari.xml");
 }
 
 /*carica il contenuto del catalogo da xml nella tabella catalogTable*/
 function loadXMLInventories(xml) {
			
		var i;
		var xmlDoc = xml.responseXML;
		var list = document.getElementById("elementGrid");
		var x = xmlDoc.getElementsByTagName("inventory");

		list.innerHTML = "";
		
		for (i = 0; i <x.length; i++) { 
			var inventory = [];
			inventory.id = x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
			inventory.name = x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
			inventory.color = x[i].getElementsByTagName("color")[0].childNodes[0].nodeValue;
	
			list.innerHTML+=inventoryString(inventory);
		}
		
}


 /*genera il codice HTML del singolo prodotto*/
function inventoryString(item){

	 var url ="inventory?id="+item.id;
	 
	 return "<div class='inventoryElem'>"+
				"<div class='squareBox'>"+
				"<div class='circle squareContent' style='background-color:"+item.color+"'></div>"+
				"</div><span class='inventoryName'>"+item.name+"</span>"+
				"</div>";
 }
 