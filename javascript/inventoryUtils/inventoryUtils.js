function showHint() 
{
		var str = document.getElementById("inventoryname").value;
  
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
				if(this.responseText="inserimentoRiuscito"){
					document.getElementById("modalBody").innerHTML = "inserimento Riuscito";
				}else{
					document.getElementById("errorList").innerHTML = this.responseText;
				}
            }
        };
        xmlhttp.open("POST", "inventoryControl.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("inventoryName="+str);
}