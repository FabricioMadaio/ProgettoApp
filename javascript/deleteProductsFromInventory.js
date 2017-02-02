function deleteProductFromInventory(productId,inventoryId)
{
  var id = productId;
  var idInv =inventoryId;
  loadDoc(function(xmlhttp){
  			deleteProductFromInventoryHandler(xmlhttp,inventoryId);
  			},"deleteProductsFromInventory.php","productId="+id+"&"+"inventoryId="+idInv);
}
function deleteProductFromInventoryHandler(xmlhttp,inventoryId)
{
	 
	var responseElem = document.getElementById("response");
	var id = inventoryId;
	console.log(id);
	 console.log(xmlhttp);
	if(xmlhttp.responseText==="cancellazioneRiuscita")
	{
      loadInventoryContent(id);
	}
	else
	{
		console.log(xmlhttp.responseText);
	  // document.location.href = parentUrl(parentUrl(document.location.href))+"/errorPage.html/"
	}
}