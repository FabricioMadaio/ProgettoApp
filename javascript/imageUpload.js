/******************************************************************** 

	MODULO INVENTORY LIST:
	
	carica la lista degli inventari da server
	
	author: Fabricio Nicolas Madaio

*********************************************************************/

/*sostituisce l'immagine di preview con quella caricata da input file*/
 function loadPreview(input){
	 
	if (input.files && input.files[0]) {
		
		document.getElementById('previewImage').src = window.URL.createObjectURL(input.files[0]);
	}
 }
 