/******************************************************************** 

	MODULO CATALOGO:
	
	carica il catalogo da server
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*inizializza la pagina del carrello caricando gli elementi HTML nella tabella*/
 function startCatalog(){
	
	var params = getSearchParams();
	/*server code*/
	loadDoc(loadXMLCatalog,"CatalogSearch"+params);
 }
 
 /*carica il contenuto del catalogo da xml nella tabella catalogTable*/
 function loadXMLCatalog(xml) {
			
		var i;
		var xmlDoc = xml.responseXML;
		var table = document.getElementById("catalogTable");
		var x = xmlDoc.getElementsByTagName("prodotto");
		var info = document.getElementById("noElements");
		var esaurimento = false;
		
		table.innerHTML = "";
		
		for (i = 0; i <x.length; i++) { 
			var prodotto = [];
			prodotto.id = x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
			prodotto.name = x[i].getElementsByTagName("nome")[0].childNodes[0].nodeValue;
			prodotto.sell = parseFloat(x[i].getElementsByTagName("prezzo_vendita")[0].childNodes[0].nodeValue);
			prodotto.purchase = parseFloat(x[i].getElementsByTagName("prezzo_acquisto")[0].childNodes[0].nodeValue);
			prodotto.amount = parseFloat(x[i].getElementsByTagName("quantita")[0].childNodes[0].nodeValue);
			prodotto.minstock = parseFloat(x[i].getElementsByTagName("quantita_min")[0].childNodes[0].nodeValue);
			prodotto.img = x[i].getElementsByTagName("immagine")[0].childNodes[0].nodeValue;
		

			table.innerHTML+=productString(prodotto);
			info.style.display="none";
			
			if(prodotto.amount<=prodotto.minstock)
				esaurimento =true;
		}
		
		if(esaurimento==true) document.getElementById("esaurimento").style.display="block";
		else document.getElementById("esaurimento").style.display="none";
		
		if(x.length==0){
			info.style.display="block";
		}
}
 
 /*cambia la quantità acquistata per il prodotto con nome "name" */
 function setAmount(id,value){
	 loadDoc(function(){startCatalog()}, "ProductSetAmount?id="+id+"&amount="+value);
	 
 }
 
 /*cambia la quantità acquistata per il prodotto con nome "name" */
 function removeElement(id){
	 loadDoc(function(){
		 var elem=document.getElementById("_"+id);
		 elem.parentNode.removeChild(elem);
	 }, "ProductRemove?id="+id);
 }
 
 /*cambia la quantità acquistata per il prodotto con nome "name" */
 function updateElement(id){
	 document.location.href = "product?id="+id;
 }

 /*genera il codice HTML del singolo prodotto*/
function productString(product){
	 
	 var productName = "\""+product.name+"\"";
	 var url ="prodotto?id="+product.id;
	 
	 var errorStyleTd = "";
	 var errorStyleIn = "";
	 
	 if(product.amount<=product.minstock){
		 errorStyleTd = "style='background: #F18888;'";
		 errorStyleIn = "style='background: #EA4343;'";
		 
	 }
	 
	return "<tr id='_"+product.id+"'><td = "+errorStyleTd+"><div class= 'product'>"
			+"<a  href=''><img src='../img/"+product.img+"' class='product-preview' alt='formaggio' /></a></div>"
			+"<div class = 'description'>"
			+"<h3>"+product.name+"</h3>"
			+"<h4 class='littleMargin'>Prezzo: "+product.sell.toFixed(2)+"&euro; </h4>"
			+"<div class='littleLineBlock'>"
				+"Quantit&agrave : "
				+"<input type='number' class='amount' name='quantity'"+errorStyleIn+" min='1' value="+product.amount
				+" style='margin-right:6px' onchange='setAmount("+product.id+",this.value);'>"
			+"</div>"
			+"<div class='littleLineBlock'>"
				+" Scorta minima: "
				+" <input type='number' class='amount'"+errorStyleIn+" name='minstock' min='1' value="+product.minstock+" disabled='disabled'>"
			+"</div>"
			+"</div><div class = 'editProduct'>"
				+"<a onclick='updateElement("+product.id+");' class='myButton adminCButton'>Modifica</a>"
				+"<a onclick='removeElement("+product.id+");' class='cartButton adminCButton'>Rimuovi</a>"
			+"</div></td></tr>";
 }
 