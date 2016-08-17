
function Modal(id){
	
	this.id = id;
	this.element = undefined;
	
	//public methods
	this.startModal = startModal;
	
	//private methods
	this.close = function(){
		this.element.style.display = "none";
	}
	this.open = function(){
		this.element.style.display = "block";
	}
	
	//initializer
	this.startModal();
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
