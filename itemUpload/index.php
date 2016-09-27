<?php

	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	include '../php/models/Inventory.php';
	
	$inventoryId = -1;
	
	if ($_SERVER["REQUEST_METHOD"] == "GET"){

		if(!empty($_GET["inventory"])){
			$inventoryId = testInput($_GET["inventory"]);
		} 
	}
	
	/*load view*/
	include 'ItemView.php';
?>