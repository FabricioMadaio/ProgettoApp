/******************************************************************** 

	MODULO CATALOGO:
	
	carica il catalogo da server sulla vetrina dell'utente
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*inizializza la pagina del carrello caricando gli elementi HTML nella tabella*/
 function startShowcase(){
	
	var params = getSearchParams();
	/*server code*/
	loadDoc(loadXMLShowcase,"ShowcaseSearch"+params);
 }
 
 /*carica il contenuto del catalogo da xml nella tabella catalogTable*/
 function loadXMLShowcase(xml) {
		
		var i;
		var xmlDoc = xml.responseXML;
		var table = document.getElementById("catalogTable");
		x = xmlDoc.getElementsByTagName("prodotto");
		
		table.innerHTML = "";
		
		for (i = 0; i <x.length; i++) { 
		
			var prodotto = [];
			prodotto.id = x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
			prodotto.name = x[i].getElementsByTagName("nome")[0].childNodes[0].nodeValue;
			prodotto.price = parseFloat(x[i].getElementsByTagName("prezzo")[0].childNodes[0].nodeValue);
			prodotto.desc = x[i].getElementsByTagName("descrizione")[0].childNodes[0].nodeValue;
			prodotto.img = x[i].getElementsByTagName("immagine")[0].childNodes[0].nodeValue;
		

			table.innerHTML+=productString(prodotto);
		}
}

 /*genera il codice HTML del singolo prodotto*/
 function productString(product){
	 
	 var productName = "\""+product.name+"\"";
	 var url ="ProductRetrieve?id="+product.id;
	 
	return "<tr id='_"+product.name+"'><td><div class= 'product'>"
			+"<a  href='"+url+"'><img src='img/"+product.img+"' class='product-preview' alt='formaggio' /></a></div>"
			+"<div class = 'description'><h4>"+product.name+"</h4>"
			+"<blockquote>"+product.desc
			+"<h3>"+product.price.toFixed(2)+"&euro; </h3></blockquote>"

			+"</div><div class = 'buy'>"
				+"<a href='"+url+"' class='myButton'>Acquista</a>"
			+"</div></td></tr>";
 }
 