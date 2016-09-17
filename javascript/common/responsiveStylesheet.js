/******************************************************************** 

	MODULO RESPONSIVE STYLESHEET:
	
	gestisce il comportamento della barra di navigazione
	in ambito mobile
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

var elementStartWidth = 140;
var marginCloseButton = 6;

/*funzione di inizio (da chiamare nella onload)*/
function startStylesheet(){ 

	/*chiudo tutti i menu cliccando sul body*/
	document.body.onclick = reset;
	window.onclick = reset;
	var timeout;
	
	/*inserisco il listener del resize*/
	window.addEventListener("resize", onResize);
	
	/*carico i dati della local storage*/
	onResize();

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

/*chiude tutti i menu a dropdown*/
function reset(){
	resetVisibility("menu-content");
}

/* apre e chiude il form di login*/
function loginForm(){
	resetVisibility("menu-content");
}

/* apre e chiude il menu mobile*/
function menuMobile(){
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

/*ridimensionamento schermo*/
function onResize(){
	
	/*aggiusto la dimensione dei riquadri in modo da riempire il contenitore*/
	
	var container = document.getElementsByClassName("responsiveGrid")[0];
	var elms = document.getElementsByClassName('inventoryElem');
	
	if(elms.length>0){
		
		/*
			dimensioni contenitore/dimensione di partenza rettangolo
			NOTA: +1 perche ne aggiungiamo un altro per riempire lo spazio extra
		*/
		var containerWidth = container.clientWidth;
		
		var capacity = parseInt(containerWidth/elementStartWidth)+1;
		var newWidth = (containerWidth/capacity);
		
		//sottraggo il 20 percento di un singolo rettangolo a tutta la serie
		newWidth-= (newWidth/20)/capacity;
		
		var margin = 0;
		
		if(elms.length<capacity){
			newWidth = elementStartWidth;
			margin = marginCloseButton;
		} 
			
		/*aggiorna le dimensioni finali*/
		for (var i = 0; i < elms.length; i++) {
			elms[i].style.width = ""+newWidth+"px";
			var itemButton = elms[i].getElementsByClassName("removeItemButton");
			if(itemButton && itemButton.lenght>0)
				itemButton[0].style.marginRight = ""+margin+"px";
		}
		
	}
	
}
