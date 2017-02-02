
<?php 
    
	/*load session*/
	if(!isset($_SESSION)){
		session_start();
     }
	 
	if(!isset($_SESSION["username"]))
    {
    	header('Location:login/');
    }

	include 'php/config.php';
	/*load view*/
	include 'inventory/inventoryView.php';
 ?>