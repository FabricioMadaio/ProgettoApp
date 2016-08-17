/******************************************************************** 

	MODULO CART:
	
	contiene le funzioni per effettuare operazioni sul
	carrello
	
	author: Fabricio Nicolas Madaio

*********************************************************************/


/*inizializza la pagina del carrello caricando gli elementi HTML nella tabella*/
 function startCart(){
	
	/*server code*/
	loadDoc(loadXMLCart,"CartRetrieve");

 }
 
 /* carica il carrello da xml*/
 function loadXMLCart(xml) {
		
		var i;
		var xmlDoc = xml.responseXML;
		var table = document.getElementById("cartTable");
		var x = xmlDoc.getElementsByTagName("prodotto");
		
		var cart = [];
		table.innerHTML = "";
		
		for (i = 0; i <x.length; i++) { 
			var prodotto = [];
			prodotto.id = x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue;
			prodotto.name = x[i].getElementsByTagName("nome")[0].childNodes[0].nodeValue;
			prodotto.price = parseFloat(x[i].getElementsByTagName("prezzo")[0].childNodes[0].nodeValue);
			prodotto.amount = parseFloat(x[i].getElementsByTagName("quantita")[0].childNodes[0].nodeValue);
			prodotto.max_amount = parseFloat(x[i].getElementsByTagName("quantita_max")[0].childNodes[0].nodeValue);
			prodotto.img = x[i].getElementsByTagName("immagine")[0].childNodes[0].nodeValue;
		

			table.innerHTML+=productString(prodotto);
			cart.push(prodotto);
		}
		console.log(cart);
		updateTotal(cart);
}
 
 /*aggiorna il totale da pagare nella pagina del carrello*/
 function updateTotal(cart){
		
		var totale = document.getElementById("totale");
		var sum = 0.0;
		
		//sommo tutti i prezzi dei prodotti moltiplicati per le relative quantità
		for(var i=0;i<cart.length;i++){
			sum+=cart[i].price*cart[i].amount;
		}
		
		totale.innerHTML="Totale: "+sum.toFixed(2)+"&euro;";
 }
 
 /*effettua l'acquisto dei prodotti nel carrello*/
 function checkout(){
	 
	 var table = document.getElementById("cartTable");
	 var totale = document.getElementById("totale");
	 
	 table.innerHTML = "";
	 totale.innerHTML ="Totale: 0&euro;";
	 
	 loadDoc(function(){
		 alert("acquisto effettuato");
	 },"CartCheckout");
	 
 }
 
 
 /*aggiunge un nuovo prodotto al carrello, se il prodotto gia si trova nel carrello, aumenta le quantit�*/
 function addToCart(id){
	 var amount = document.getElementById("amount").value;
	 document.location.href = "CartAddProduct?id="+id+"&amount="+amount;
 }

 /*cambia la quantit� acquistata per il prodotto con nome "name" */
 function setAmount(id,value){
	 loadDoc(function(){startCart();}, "CartProductUpdate?id="+id+"&amount="+value+"&mode=SET");
 }
 
 /*elimina il prodotto con nome "name" dal carrello*/
 function removeElement(id){
	 loadDoc(function(){ startCart();}, "CartProductUpdate?id="+id+"&amount=1&mode=REMOVE");
 }
 
 /*
  * restituisce l'elemento HTML associato al prodotto
 */
 function productString(product){
	 
	 var productName = "\""+product.name+"\"";
	 var url ="ProductRetrieve?id="+product.id;
	 
	return "<tr><td><div class= 'product'>"
			+"<a  href='"+url+"'><img src='img/"+product.img+"' class='product-preview' alt='formaggio' /></a></div>"
			+"<div class = 'description'>"
			+"<h3>"+product.name+"</h3>"
			+"<h4 class='littleMargin'>Prezzo: "+product.price.toFixed(2)+"&euro; </h4>"
			+"<p class='littleMargin'>Quantit&agrave; : <input type='number' class='amount' name='quantity' min='1' max='"+product.max_amount+"' value="+product.amount+" onchange='setAmount("+product.id+",this.value);'></p>"
			+"</div><div class = 'buy'>"
				+"<p class='littleMargin subtotal'>Subtotale: "+(product.price*product.amount).toFixed(2)+"&euro; </p>"
				+"<a onclick='removeElement("+product.id+");' class='cartButton'>Rimuovi</a>"
			+"</div></td></tr>";
 }