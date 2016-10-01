function deleteInventory(inventoryId,modal)
{
  var id = inventoryId;
  console.log("sono qui");
  loadDoc(function(xmlhttp){
  			deleteHandler(xmlhttp,modal);
  			},"inventoryDelete.php","inventoryId="+id);
}

function deleteHandler(xmlhttp,modal){
	 
	var responseElem = document.getElementById("response");
	 console.log(xmlhttp);
	if(xmlhttp.responseText==="cancellazioneRiuscita"){
		document.getElementById("footer").style.visibility="hidden";
		document.getElementById("message").style.visibility="hidden";
		responseElem.innerHTML = "<section class='infoBox'>Cancellazione effettuata con successo!</section>";
		modal.close= function(){
			document.location.href = parentUrl(parentUrl(document.location.href));
		}
	}else{
		
		var content = "<section class='infoBox' style='background:#f9d0d0;border-color:#f7a7a2;color:red;'>";
		content += "<p id='errorResponse'>Errore</p><ul class='errorList'><li> - "+xmlhttp.responseText+"</li></ul><br></section>";
		responseElem.innerHTML = content; 
	}
 }