
<!-- CONTROLLER MODULE -->
<?php

	/*load dbConn*/
	include '../php/config.php';
	include '../php/DBConnection.php';
	include '../php/inputUtils.php';
	include '../php/phpmailer/mail.php';
	
	include '../php/models/User.php';
	
	$passwordErr = "";
	$tokenErr = "";
	$token = "";
	
	$dbconn = new DBConnection();
	$user = new User();
	
	try{
		/*open the connection*/
		$dbconn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			
			if (empty($_POST["token"])){
				$tokenErr = errorString("Codice non valido","name");
			}else{
				$token = testInput($_POST["token"]);
				$tokenErr = tokenCheck($token,$dbconn);
			}
			
			if (empty($_POST["password"])){
				$passwordErr = errorString("Password is required","nome");
			}else{
				$user->password = testInput($_POST["password"]);
				if (!isAlphanumeric($user->password)){
					$passwordErr = errorString("Only letters,white space and number allowed in password","nome"); 
				}
			}
			
			if(empty($tokenErr) && empty($passwordErr)){
				//md5 hashing
				$hashedPass = $user->hashPass();	
				$query = "UPDATE utenti SET password = '$hashedPass', resetComplete = 'Yes'  WHERE resetToken = '$token'";
		
				if($dbconn->query($query))
				{
					header('Location:../passResetSuccess.html');
				}else{
					header('Location:../passResetFailed.html');
				}
			}
			
		} else{
			header('Location:../passResetFailed.html');
		} 
		$dbconn->close();	
		
		include "resetView.php";
		
	}catch (Exception $e) {
		echo $e;
		//header('Location:../errorPage.html');
	}
	
?>