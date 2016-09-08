
function Modal(id,config){
	
	this.id = id;
	this.element = undefined;
	this.config = config;
	
	//public methods
	this.startModal = startModal;
	
	//initializer
	this.startModal();
}

//private methods
Modal.prototype.close=function(){
	
	if(this.config.onClose){this.config.onClose();}
	this.element.style.display = "none";
}

Modal.prototype.open=function(){
	
	if(this.config.onOpen){this.config.onOpen();}
	this.element.style.display = "block";
	document.getElementById("modalBody").style.display="block";
	document.getElementById("ok").style.display="none";
	document.getElementById("errorList").style.display="none";
	document.getElementById("footer").style.display="block";
	document.getElementById("inventoryname").value="";
}

function startModal(){


	
	// Get the modal
	var modal = this;
	
	//search the modal element
	this.element = document.getElementById(this.id);	
	
	// Get the elements that closes the modal
	var closers = document.getElementsByClassName(this.id+"_close");

	for(var i=0;i<closers.length;i++){
		// When the user clicks on <span> (x), close the modal
		closers[i].onclick = function() {
			modal.close();
		}
	}
		
	// Get the button that opens the modal
	var openers = document.getElementsByClassName(this.id+"_open");

	// When the user clicks the button, open the modal
	for(var i=0;i<openers.length;i++){
		openers[i].onclick = function() {
			modal.open();
		}
	}


	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal.element) {
			modal.close();
		}
	}

}
