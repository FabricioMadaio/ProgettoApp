/******************************************************************** 

	MODULO GALLERY:
	
	contiene la funzione per cambiare 
	l'immagine principale della galleria
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

function startGallery(){
	setImage(0);
}

/*funzione per cambiare l'immagine grande nella galleria */
function setImage(imageIndex){
	
	var src = "";
	
	var viewer = document.getElementById("view");
	var images = document.getElementById("images");
	
	var selection = images.children[imageIndex];
	
	/*setto a classe thumbnail tutte le immagini*/
	for(var i=0;i<images.childElementCount;i++)
		images.children[i].className = "thumbnail";
	
	/*setto la classe thumnailSelected solo alla immagine selezionata*/
	selection.className = "thumbnailSelected";
	viewer.src = selection.children[0].src;
}