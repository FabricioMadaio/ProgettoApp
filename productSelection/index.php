<?php 

	include '../php/sessionControl.php';
	include '../php/models/Inventory.php';

	/*load dbConn*/
	include '../php/config.php';
	include '../php/DBConnection.php';
	
	$dbConn = new DBConnection();
	$inventory = new Inventory(0,"");
	
	/*userid from session*/
	$userid = $_SESSION["userid"];
	
	if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["inventory"])){
		$inventory->id = $_GET['inventory'];
	}else{
		/*missed data*/
		header('Location:../errorPage.html');
	}
	
	try{
			
		$dbConn->open();
		
		$inventory->checkUserOwner($userid,$dbConn);

		$dbConn->close();
			
	}catch (Exception $e){
		header('Location:../errorPage.html');
	}		
		
	/*load view*/
	include 'productSelectionView.php';
 ?>