<?php

	include '../php/sessionControl.php';

	/*load dbConn*/
	include '../php/DBConnection.php';
	
	$dbConn = new DBConnection();
	
	/*userid from session*/
	$userid = $_SESSION["userid"];
	
	if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["inventoryId"])){
		$inventoryId = $_GET['inventoryId'];
	}else{
		/*missed data*/
		header('Location:../errorPage.html');
	}
	
	try{
			
		$dbConn->open();
		
		/*check if inventoryid matches the user*/
		$query="SELECT * FROM inventari WHERE idUtente='$userid' AND idInventario = '$inventoryId'";
		$result =$dbConn->query($query);
		
		if(mysqli_num_rows($result) != 1){
			/*access denied*/
			header('Location:../errorPage.html');
		}	

		$dbConn->close();
			
	}catch (Exception $e){
		header('Location:../errorPage.html');
	}		
		
	/*load view*/
	include 'inventoryContentView.php';
?>