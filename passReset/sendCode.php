
<!-- CONTROLLER MODULE -->
<?php

	/*load dbConn*/
	include '../php/config.php';
	include '../php/DBConnection.php';
	include '../php/inputUtils.php';
	include '../php/phpmailer/mail.php';
	
	$emailErr = "";
	$email = "";
	
	$dbconn = new DBConnection();
	
	try{
		/*open the connection*/
		$dbconn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			
			if (empty($_POST["email"])){
				$emailErr = errorString("Email is required","nome");
			}
			else 
			{
				$email = testInput($_POST["email"]);
				
				// check if mail is well formatted
				if (!mailExists($email,$dbconn)) {
					$emailErr = errorString("Email provided not exists","nome"); 
				}
			}

			if(empty($emailErr))
			{
				//create the activation code
				$code = md5(uniqid(rand(),true));
		
				$query = "UPDATE utenti SET resetToken = '$code', resetComplete='No' ";
				$query .= "WHERE email = '$email'";
				
				if(!$dbconn->query($query))
				{
					header('Location:../errorPage.html');
				}
				else
				{
					//then send mail
					sendResetPassMail($code,$email);
					
					header('Location:../resetPassSended.html');
				}
				
			}
		}  
		$dbconn->close();	
		
	}catch (Exception $e) {
		header('Location:../errorPage.html');
	}
	
	include "mailError.php";
	
	
	function sendResetPassMail($code,$email){
		
		$url = ROOT."passReset/";
		$to = $email;
		$subject = "Company Inventory - Password reset";
		$body = "<p>La funzione di recupero della password è stata attivata per il tuo account.</p>
		<p>Per cambiare la tua password clicca qui: <a href='".$url."index.php?token=$code'>".$url."index.php?token=$code</a></p>
			
		Staff Company Inventory</p>";

		$mail = new Mail();
		$mail->setFrom(SITEEMAIL,"Company Inventory");
		$mail->addAddress($to);
		$mail->subject($subject);
		$mail->body($body);
		$mail->send();
	}
  	

?>