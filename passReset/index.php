
<?php

	/*load dbConn*/
	include '../php/config.php';
	include '../php/DBConnection.php';
	include '../php/inputUtils.php';
	
	$tokenErr = "";
	$token = "";
	
	$passwordErr ="";
	
	$dbconn = new DBConnection();
	
	try{
		/*open the connection*/
		$dbconn->open();
		
		if ($_SERVER["REQUEST_METHOD"] == "GET") 
		{
			if(!empty($_GET["token"])){
				$token = testInput($_GET["token"]);
				$tokenErr = tokenCheck($token,$dbconn);
			}else{
				$tokenErr = errorString("Codice non valido","name");
			}
		}  
		$dbconn->close();	
		
	}catch (Exception $e) {
		header('Location:../errorPage.html');
	}
	
	include "resetView.php";

?>