function showHint() 
{
		var str = document.getElementById("inventoryname").value;
        var modalContent=document.getElementById("modalBody").innerHTML;
        var flag = false;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
				if(this.responseText==="inserimentoRiuscito")
                {
					document.getElementById("modalBody").style.display="none"
                    document.getElementById("ok").style.display="block"
                    document.getElementById("footer").style.display="none"
				}
                else
                {
                    document.getElementById("errorList").style.display="block";
					document.getElementById("errorList").innerHTML = this.responseText;

				}
            }
              
        };
        xmlhttp.open("POST", "inventoryControl.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("inventoryName="+str);
}