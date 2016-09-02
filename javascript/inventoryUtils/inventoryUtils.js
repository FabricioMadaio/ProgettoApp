function showHint(str) 
{
  
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("errorList").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "inventoryControl.php", true);
        xmlhttp.send("inventoryName="+str);
}