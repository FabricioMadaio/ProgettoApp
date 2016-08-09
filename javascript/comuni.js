/******************************************************************** 

	MODULO COMUNI:
	
	carica la lista delle province e dei comuni in due select
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*inizio richiedendo al server la lista delle province*/
function initComuni(sComune,sProvincia){
	requestProvince(sComune,sProvincia);
}

/*setto alla select comune il valore passato*/
function setComune(sComune){
	if(sComune!=undefined)
	document.getElementById("comune").value = sComune;
}

/*setto alla select provincia il valore passato*/
function setProvincia(sProvincia){
	if(sProvincia!=undefined )
	document.getElementById("provincia").value = sProvincia;
}

/*chiamata ajax al servizio lato server che restituisce le province*/
function requestProvince(sComune,sProvincia){
	loadDoc(function(xml){
		if(xml!=null){
			loadSelectFromXML("provincia",xml);
			//carico i comuni della prima provincia trovata
			setProvincia(sProvincia);
			requestComuni(document.getElementById("provincia").value,sComune);
		}
	},"Province");
}

/*chiama ajax al servizio che restituisce i comuni di una determinata provincia*/
function requestComuni(value,sComune){
	loadDoc(function(xml){
		if(xml!=null){
			loadSelectFromXML("comune",xml);
			setComune(sComune);
		}
	},"Comuni?provincia="+value);
}

/*carica i campi di una select a partire da un xml*/
function loadSelectFromXML(id,xml) {
	
	var i;
	var xmlDoc = xml.responseXML;
	var table = document.getElementById(id);
	var x = xmlDoc.getElementsByTagName(id);
	
	table.innerHTML = "";
	
	for (i = 0; i <x.length; i++) { 
	
		var c = x[i].childNodes[0].nodeValue;
		table.innerHTML+= "<option name='"+id+"' value="+c+">"+c+"</option>";
	}
}