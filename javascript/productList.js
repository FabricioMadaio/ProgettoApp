 
 function redirectToInvetoryProduts(invetoryId){
	
	var params = getSearchParams();
	var invetId=invetoryId;
	/*server code*/
	//loadDoc(loadXMLInventories,"getInventories"+params);
 
	loadRedirect("../productList/index.php?invetoryId='invetId'");
 }

  function loadRedirect(path) {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		    document.location.href = path;
		}
	  };
	  console.log(path);
	  xhttp.open("POST", path, true);
	  xhttp.send();
}