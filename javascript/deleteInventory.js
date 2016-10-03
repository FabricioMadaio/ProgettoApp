function deleteInventory(inventoryId,modal)
{
  var id = inventoryId;
  console.log("sono qui");
  loadDoc(function(xmlhttp){
  			deleteInventoryHandler(xmlhttp,modal);
  			},"inventoryDelete.php","inventoryId="+id);
}

function deleteInventoryHandler(xmlhttp,modal){
	 
	var responseElem = document.getElementById("responseRemove");
	 console.log(xmlhttp);
	if(xmlhttp.responseText==="cancellazioneRiuscita")
    {
		document.getElementById("footerRemove").style.display="none";
		document.getElementById("messageRemove").style.display="none";
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