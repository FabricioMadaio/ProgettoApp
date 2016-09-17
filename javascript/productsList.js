/******************************************************************** 

	MODULO INVENTORY LIST:
	
	carica la lista degli inventari da server
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*inizializza la pagina del carrello caricando gli elementi HTML nella tabella*/
 function startProductsList(){
	
	var params = getSearchParams();
	/*server code*/
	//loadDoc(loadXMLInventories,"getInventories"+params);
 
	loadDoc(loadXMLProducts,"../productsXml/products.php");
 }
 
 /*carica il contenuto del catalogo da xml nella tabella catalogTable*/
 function loadXMLProducts(xml) {
			
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
			product.color = x[i].getElementsByTagName("color")[0].childNodes[0].nodeValue;
	
			list.innerHTML+=inventoryString(product);
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
 

 /*Controlla quello che c'è scritto nella barra di ricerca*/
 function checkIfSearch()
 {
 	console.log("sono qui checkIfSearch");
 	var search = document.getElementById("ricerca").value;
 	if(search == "")
 	{
 		loadDoc(loadXMLProducts,"../productsXml/products.php");
 	}
 	else
    { 
    	loadDoc(loadXMLProducts,"../productsXml/productsSearch.php","ricerca="+search);
    }
 }