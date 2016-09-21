/******************************************************************** 

	MODULO SINGUP:
	
	registra su server un nuovo utente
	
	author: Fabricio Nicolas Madaio

*********************************************************************/


function initSignup(){
	
	var params = ["nome","cognome","username","password","bday",
	              "residenza","cf","indirizzo-spedizioni","pagamento",
	              "bonifico","numero-carta","scadenza"];
	
	//controllo errori (VEDI PRODUCT)
	for(var name in params) {
		var elem = document.getElementsByName(params[name]+"_e")[0];
		if(elem!=null){
			var inputTag = document.getElementsByName(params[name])[0];
			if(inputTag!=null)inputTag.style.borderColor = "#cc0000";
		}
	}
	
}

/*aggiorna gli elementi del form visibili con quelli indicati dal radio button*/
function updateSelection(checkbox){
	var iban = document.getElementById("ibanForm");
	var credit = document.getElementById("creditForm");
	
	if(checkbox.value=="iban"){
		iban.style.display="block";
		credit.style.display= "none";
	}else{
		iban.style.display="none";
		credit.style.display= "block";
	}
	
}

function showHidePassword(){
	
	var input = document.getElementById("password");
	
	if (input.getAttribute("type") === "password") {
		input.setAttribute('type', 'text');
	} else {
		input.setAttribute('type', 'password');
	}
}


function getCouple(name){
	return name+"="+document.getElementsByName(name)[0].value;
}

