<?php
	/*load dbConn*/
	include '../php/config.php';
	include '../php/DBConnection.php';
	include '../php/inputUtils.php';
	include '../php/phpmailer/mail.php';

	$dbconn = new DBConnection();
	
	$id = "";
	$active = "";
	
	try{
		/*open the connection*/
		$dbconn->open();
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			if (!empty($_GET["x"]))
				$id = testInput($_GET["x"]);
			
			if (!empty($_GET["y"]))
				$active = testInput($_GET["y"]);
						
			if(is_numeric($id) && !empty($active)){
					
				$query = "UPDATE utenti SET active = 'yes' WHERE idUtente = '$id' AND active = '$active'";
			
				if($dbconn->query($query)){	
					header('Location:../activationSuccess.html');
				}
			}
		}
		header('Location:../activationError.html');
		
		$dbconn->close();	
		
	}catch (Exception $e) {
		header('Location:../errorPage.html');
	}

?>