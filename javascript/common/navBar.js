/******************************************************************** 

	MODULO NAVBAR:
	
	gestisce il comportamento della barra di navigazione
	in ambito mobile
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*funzione di inizio (da chiamare nella onload)*/
function startNavBar(){ 

	/*chiudo tutti i menu cliccando sul body*/
	document.body.onclick = reset;
	window.onclick = reset;
	
	/*inserisco il listener del resize*/
	window.addEventListener("resize", onResize);
	
	/*carico i dati della local storage*/
	//loadUser();
	onResize();
	
	setErrors();

	/*funzione per aggiustare la navbar dopo il cambio di orientamento dello schermo*/
	window.addEventListener('orientationchange', function () {
		
		/*numero massimo di giri del ciclo senza cambiamento di dimensioni, una volta raggiunto questo la fine viene rilevata*/
		var noChangeCountToEnd = 100;
		/*durata in millisecondi del timeout*/
		var noEndTimeout = 1000;	
	
        var interval,
            timeout,
            end,
            lastInnerWidth,
            lastInnerHeight,
            noChangeCount; /*contatore dei giri senza cambiamento*/

		 /* funzione di fine transizione*/
        end = function () {
            clearInterval(interval);
            clearTimeout(timeout);

            interval = null;
            timeout = null;

			/*gestico il ridimensionamento*/
			onResize();
        };

		/*lancio la funzione che cicla in parallelo*/
        interval = setInterval(function () {
			
			/*se è avvenuto un cambio nelle dimensioni dello schermo incremento il contatore dei giri senza cambiamento*/
            if (window.innerWidth === lastInnerWidth && window.innerHeight === lastInnerHeight) {
                noChangeCount++;
				
                if (noChangeCount === noChangeCountToEnd) {
                    /* il ciclo ha finito prima del timeout*/
                    end();
                }
            } else {
				
				/* richiamo la resize in ogni giro*/
				onResize();
				
                lastInnerWidth = window.innerWidth;
                lastInnerHeight = window.innerHeight;
                noChangeCount = 0;
            }
        });
        timeout = setTimeout(function () {
            /*se il timeout avviene prima della fine*/ 
            end();
        }, noEndTimeout);
    });
}


function setErrors(){
	
	//nome e cognome portano un unico messaggio di errore
	
	var error = document.getElementsByClassName("error-li");
	
	if(error.length!=0){
		loginForm();
	}
}


/*chiude tutti i menu a dropdown*/
function reset(){
	resetVisibility("menu-content");
	resetVisibility("login-content");
}

/* apre e chiude il form di login*/
function loginForm(){
	resetVisibility("menu-content");
	updateVisibility("login-content");
}

/* apre e chiude il menu mobile*/
function menuMobile(){
	resetVisibility("login-content");
	updateVisibility("menu-content");
}

/* fa apparire/scomparire un menu di tipo dropdown*/
function updateVisibility(className){
	
	var form = document.getElementsByClassName(className)[0];
	
	if(form.style.display=="block"){
		form.style.display="none";
	}else{
		form.style.display="block";
	}
	
	if(window.event)
	window.event.stopPropagation();
}

/* fa sparire un menu di tipo dropdown*/
function resetVisibility(className){
	var menu = document.getElementsByClassName(className)[0];
	menu.style.display="none";
}

/* blocca la propagazione degli eventi nei blocchi sottostanti*/
function blockReset(){
	window.event.stopPropagation();
}

/*registra l'username in localstorage*/
function loginUsername(username){
	localStorage.setItem("username",username);
}

/*carica i dati dell'utente da local storage*/
function loadUser(){
	
	if(typeof(Storage) !== "undefined") {
		
		var username = localStorage["username"];
		if(username){
			resetVisibility("login-content");
			var formLogin = document.getElementById("formLogin");
			var formLogout = document.getElementById("formLogout");
			var button = document.getElementById("loginButton");
			
			/*modifico l'intestazione il tasto logout e aggiungo il saluto*/
			formLogin.style.display="none";
			formLogout.style.display="block";
			
			button.text="Benvenuto, "+username+"!";
			
		}
	} else {
		alert("Sorry! No Web Storage support..");
	}
}

/*ridimensionamento schermo*/
function onResize(){
	
	var menu = document.getElementsByClassName("login-dropdown")[0];
	var nav = document.getElementsByTagName("nav")[0];
	
	/*applico questo stile per riempire tutta la navbar rimasta con il saluto*/
	//menu.style.maxWidth = ""+(nav.offsetWidth - 116)+"px";
}
