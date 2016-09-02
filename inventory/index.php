
<?php 
    if(!isset($_SESSION)){
		session_start();
     }
	 
	if(!isset($_SESSION["username"]))
    {
    	header('Location:../login/');
    }
	 
	/*load dbConn*/
	include '../php/DBConnection.php';
	/*init model*/
	include 'initInventory.php';
	/*load view*/
	include 'inventoryView.php';
 ?>