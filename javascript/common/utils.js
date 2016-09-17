/******************************************************************** 

	MODULO UTILS:
	
	contiene funzioni generiche
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

 /* chiamata ajax di tipo POST generica */
 function loadDoc(handler,path,attrs) {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200 && handler!= null) {
		  handler(xhttp);
		}
	  };
	  console.log(path);
	  xhttp.open("POST", path, true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.send(attrs);
}
 
 /*resituisce i parametri passati in un URI */
 function getQueryParams(qs) {
     qs = qs.split('+').join(' ');

     var params = {},
         tokens,
         re = /[?&]?([^=]+)=([^&]*)/g;

     while (tokens = re.exec(qs)) {
         params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
     }

     return params;
 }
 
 /*prende i parametri dalla navbar e li converte in parametri da passare al server per la ricerca */
 function getSearchParams(){
	var search = document.getElementById("ricerca");
	var ord = document.getElementById("ordinamento");
	var inizioFascia = document.getElementById("inizioFascia");
	var fineFascia = document.getElementById("fineFascia");
	var checkStock = document.getElementById("checkStock");
	
	var params = "";
	if(search && search.value!=""){
		if(params=="") params= "?";
		params+="search="+search.value;
	}
	
	if(ord && ord.value!=""){
		if(params=="") params= "?";
		else	params+="&";
		params+="ord="+ord.value;
	}
	
	if(checkStock && checkStock.checked==true){
		if(params=="") params= "?";
		else	params+="&";
		params+="stock=1";
	}
	
	if(inizioFascia && fineFascia && inizioFascia!= "" && fineFascia!=""){
		if(parseInt(inizioFascia.value)<parseInt(fineFascia.value)){
			if(params=="") params= "?";
			else	params+="&";
			params+="start="+inizioFascia.value+"&end="+fineFascia.value;
		}
	}
	
	return params;
 }
 
 /*aggiorna il contenuto di un elemento input generico*/
 function updateInputFile(obj,id){
	 document.getElementById(id).value = obj.value;
 }
 
 /*restituisce l'url del livello precedente*/
 function parentUrl(url){
	return url.substring(0, url.lastIndexOf('/'));
 }

 /*link alla home*/
 function toHome(){
	document.location.href = parentUrl(document.location.href);
 }
 
 /*link alla home per l'admin verso il client*/
 function toClientHome(){
	 document.location.href = parentUrl(parentUrl(document.location.href));
 }
 function toProductList(){
	 document.location.href = parentUrl(parentUrl(document.location.href))+"/productList/";
 }

