
function retriveUserInfo(){
	
	
	loadDoc(
		function(xml){
			retriveHandler(xml);
		}
	,"profileInfoRetrive.php");
 }
 
 /*carica il contenuto del catalogo da xml nella tabella catalogTable*/
 function retriveHandler(xml) {
			
		var i;
		var xmlDoc = xml.responseXML;
		console.log(xml)
		//if(xmlDoc==null){ siteOfflineError();}
		
		var list = document.getElementById("section");
		var x = xmlDoc.getElementsByTagName("user");

		list.innerHTML = "";
		
		for (i = 0; i <x.length; i++) { 
            var user = [];
			user.nome =x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
            user.cognome =x[i].getElementsByTagName("secondName")[0].childNodes[0].nodeValue;
			user.username = x[i].getElementsByTagName("username")[0].childNodes[0].nodeValue;
			user.bDay = x[i].getElementsByTagName("bDay")[0].childNodes[0].nodeValue;
			user.email = x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue;
			user.residenza = x[i].getElementsByTagName("residenza")[0].childNodes[0].nodeValue;
			list.innerHTML+=profileInfoString(user);
		}
		
		//aggiorno le dimensioni
		onResize();
}

function profileInfoString(user)
{

var str = '<table id="dataList" style="box-shadow: none;">'+
			'<tbody><tr>'+
			'<td style="font-weight: bold;">Nome:</td>'+
			'<td>'+user.nome+'</td></tr>'+
			'<td style="font-weight: bold;">Cognome:</td>'+
			'<td>'+user.cognome+'</td></tr>'+
			'<td style="font-weight: bold;">Username:</td>'+
			'<td>'+user.username+'</td></tr>'+
			'<td style="font-weight: bold;">Password:</td>'+
			'<td><a class="bigrow" href="../passwordReset.html">Cambia Password</a></td></tr>'+
			'<td style="font-weight: bold;">Data di nascita:</td>'+
			'<td>'+user.bDay+'</td></tr>'+
			'<td style="font-weight: bold;">Email:</td>'+
			'<td>'+user.email+'</td></tr>'+
			'<td style="font-weight: bold;">Residenza:</td>'+
			'<td>'+user.residenza+'</td></tr>'+
			'</tbody></table>';

return str;
	

}