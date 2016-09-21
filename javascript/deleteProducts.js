
function deleteProduct(productId)
{
  var id = productId;
  loadDoc(deleteHandler,"deleteProducts.php","productId="+id);
}

function deleteHandler(xmlhttp){
	 
	var responseElem = document.getElementById("response");
	 
	if(xmlhttp.responseText==="cancellazioneRiuscita"){
		document.getElementById("footer").style.visibility="hidden";
		responseElem.innerHTML = "<section class='infoBox'>Cancellazione effettuata con successo!</section>";
		/*var m = new Modal("myModal",{
						onOpen:null,
						onClose:function(){toProductList()};
					});*/
	}else{
		
		var content = "<section class='infoBox' style='background:#f9d0d0;border-color:#f7a7a2;color:red;'>";
		content += "<p id='errorResponse'>Errore</p><ul class='errorList'><li> - "+xmlhttp.responseText+"</li></ul><br></section>";
		responseElem.innerHTML = content; 
	}
 }