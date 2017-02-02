/******************************************************************** 

	MODULO PRODUCT:
	
	aggiusta lo stile dei campi con errori del form aggiornamento prodotto 
	
	author: Fabricio Nicolas Madaio

*********************************************************************/


function startProduct(){
	
	var params = ["id","nome","descrizione","prezzo-vendita","prezzo-acquisto",
	    		  "quantita","quantita-min",
	    		  "immagine1","immagine2","immagine3","immagine4"];
	
	/* cerco se ci sono elementi di tipo errore (nomeParametro_e)*/
	for(var i=0;i<params.length;i++) {
		var elem = document.getElementsByName(params[i]+"_e")[0];
		if(elem!=null){
			/*se esiste l'elemento setto il bordo dell'imput associato come rosso*/
			var inputTag = document.getElementsByName(params[i])[0];
			if(inputTag!=null)inputTag.style.borderColor = "#cc0000";
			
			//cancello il fratello (se ho due errori successivi ne metto solo uno)
			var sibling = elem.nextElementSibling;			
			if(sibling!=null && sibling.className == "error-li" && sibling.innerHTML==elem.innerHTML){
				var inputTag = document.getElementsByName(params[++i])[0];
				//setto il bordo a rosso di questo input "fratello"
				if(inputTag!=null)inputTag.style.borderColor = "#cc0000";
				//cancello il blocco di errore di questo elemento, fratello al principale
				sibling.parentNode.removeChild(sibling);
			}
		}
	}
	
}


