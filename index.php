
<?php 
    
	/*load session*/
	if(!isset($_SESSION)){
		session_start();
     }
	 
	if(!isset($_SESSION["username"]))
    {
    	header('Location:login/');
    }	 
	
	/*load dbConn*/
	include 'php/DBConnection.php';
	/*init model*/
	include 'inventory/initInventory.php';
	/*load view*/
	include 'inventory/inventoryView.php';
 ?>