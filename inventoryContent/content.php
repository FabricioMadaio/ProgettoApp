<?php

	include '../php/sessionControl.php';
	include '../php/models/Inventory.php';

	/*load dbConn*/
	include '../php/DBConnection.php';
	
	$dbConn = new DBConnection();
	$inventory = new Inventory(0,"");
	
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
		}else{
			  while($row = mysqli_fetch_assoc($result))
			  { 
				$inventory->id  = $row['idInventario'];
				$inventory->name  = $row['nomeInventario'];
			  }
		}	

		$dbConn->close();
			
	}catch (Exception $e){
		header('Location:../errorPage.html');
	}		
		
	/*load view*/
	include 'inventoryContentView.php';
?>