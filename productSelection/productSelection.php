<?php

	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	
	include '../php/models/Inventory.php';
	
	$dbConn = new DBConnection();

    try
    {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
				
			$userid = $_SESSION["userid"];
			
			if(	empty($_POST["indices"]) || !is_array($_POST["indices"]) ||
				empty($_POST["amounts"]) || !is_array($_POST["amounts"])){
				
				serviceDie("selezionare elementi");
			}
			
			if(empty($_POST["inventory"])){
				serviceDie("inventario non valido");
			}else{
			
				$dbConn->open();
			
				$inventoryId = intval($_POST["inventory"]);
				$inventory = new Inventory($inventoryId,"");
				
				if(!$inventory->exists($userid,$dbConn)){
					serviceDie("inventario inesistente");
				}
			
				$indices = formatArray("indices");
				$amounts = formatArray("amounts");
			
				$dbConn->query($inventory->productsInsertQuery($indices,$amounts));
				//echo $inventory->productsInsertQuery($indices,$amounts);
				
				
				$dbConn->close();
			}			
			
	    }
	}catch (Exception $e){	
		serviceDie($e);
	}
	
	function formatArray($key){
		
		$i=0;
		$array = [];
		
		foreach($_POST[$key] as $elem){
			$array[++$i]=intval($elem);
		}
		return $array;
	}
?>