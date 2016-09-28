<?php

	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	include '../php/models/Inventory.php';
	/*load dbConn*/
	include '../php/DBConnection.php';
	
	$dbConn = new DBConnection();
	$inventory = new Inventory(-1,"");
	$userid = $_SESSION["userid"];
	
	if ($_SERVER["REQUEST_METHOD"] == "GET"){

		if(!empty($_GET["inventory"])){
			$inventory->id = testInput($_GET["inventory"]);
		
			try{
				
				$dbConn->open();
				
				$inventory->checkUserOwner($userid,$dbConn);

				$dbConn->close();
				
			}catch (Exception $e){
				header('Location:../errorPage.html');
			}

		} 
	}
	
	/*load view*/
	include 'ItemView.php';
?>