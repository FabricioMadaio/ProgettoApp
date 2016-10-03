
function Selection(button){
	this.items = [];
	this.confirmButton = button;
}

Selection.prototype.addItem = function(item){
	this.items.push(item);
	this.updateButton();
}

Selection.prototype.dropItem = function(item){
	this.items.pop(item);
	this.updateButton();
}

Selection.prototype.updateButton = function(item){
	
	if(this.items.length>0)
		this.confirmButton.disabled = false;
	else
		this.confirmButton.disabled = true;
}

Selection.prototype.submit = function(modal,inventoryId){
	
	var fd = new FormData();
	fd.append("inventory",""+inventoryId);
	
	for(var i=0;i<this.items.length;i++){
		fd.append("indices[]", this.items[i].getAttribute("pid"));
		fd.append("amounts[]", this.items[i].nextSibling.childNodes[0].value);
	}
	
	var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		  selectionHandler(xhttp,modal);
		}
	  };
	  
	xhttp.open("POST", "productSelection.php", true);
	xhttp.send(fd);
	
}

function selectionHandler(xmlhttp,modal){
	 
	var responseElem = document.getElementById("response");
	 console.log(xmlhttp);
	if(xmlhttp.responseText==="cancellazioneRiuscita"){
		
		responseElem.innerHTML = "<section class='infoBox'>Prodotti aggiunti!</section>";
		modal.close= function(){
			document.location.href = parentUrl(parentUrl(document.location.href)) + "/productList/";
		}
	}else{
		
		var content = "<section class='infoBox' style='background:#f9d0d0;border-color:#f7a7a2;color:red;'>";
		content += "<p id='errorResponse'>Errore</p><ul class='errorList'><li> - "+xmlhttp.responseText+"</li></ul><br></section>";
		responseElem.innerHTML = content; 
	}
 }