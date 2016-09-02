
<?php 
    if(!isset($_SESSION)){
    session_start();
     }
	/*load dbConn*/
	include '../php/DBConnection.php';
	/*init model*/
	include 'initInventory.php';
	/*load view*/
	include 'inventoryView.php';
 ?>