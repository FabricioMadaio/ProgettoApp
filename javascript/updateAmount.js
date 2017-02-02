function updateAmount(productId,inventoryId)
{
  var id = productId;
  var idInv =inventoryId;
  var newAmount = document.getElementById("amount"+id).value;
  console.log(newAmount);
  loadDoc(function(xmlhttp){
  			updateHandler(xmlhttp,inventoryId);
  			},"updateAmount.php","productId="+id+"&"+"inventoryId="+idInv+"&"+"amount="+newAmount);
}
function updateHandler(xmlhttp,inventoryId)
{
	 
	var responseElem = document.getElementById("response");
	var id = inventoryId;
	console.log(id);
	 console.log(xmlhttp);
	if(xmlhttp.responseText==="updateRiuscito")
	{
      loadInventoryContent(id);
	}
	else
	{
		console.log(xmlhttp.responseText);
	  // document.location.href = parentUrl(parentUrl(document.location.href))+"/errorPage.html/"
	}
}
