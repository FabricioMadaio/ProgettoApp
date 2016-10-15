
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

var str = '<p class="littlerow">Nome</p>'+
'			<p class="bigrow">'+user.nome+'</p>	'+
'			<p class="littlerow">Cognome</p>'+
'			<p class="bigrow">'+user.cognome+'</p>	'+
'			<p class="littlerow">Username</p>'+
'			<p class="bigrow">'+user.username+'</p>	'+
'			<p class="littlerow">Password</p>'+
'			<a class="bigrow" href=<?php echo ROOT."passwordReset.html"; ?>Cambia Password</a>'+
'			<p class="littlerow">Data di nascita</p>'+
'			<p class="bigrow">'+user.bDay+'</p>	'+
'			<p class="littlerow">Email</p>'+
'			<p class="bigrow">'+user.email+'</p>'
'			<p class="littlerow">Residenza</p>'+
'			<p class="bigrow">'+user.residenza+'</p>';

return str;
	

}