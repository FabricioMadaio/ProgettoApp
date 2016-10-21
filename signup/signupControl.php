
<!-- CONTROLLER MODULE -->
<?php

	/*load dbConn*/
	include '../php/config.php';
	include '../php/DBConnection.php';
	include '../php/inputUtils.php';
	include '../php/phpmailer/mail.php';
	
	/*load model*/
	include 'initSignup.php';

	$noErrors = true;
	$hashedPass = "";
	
	$dbconn = new DBConnection();
	
	try{
		/*open the connection*/
		$dbconn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			if (empty($_POST["nome"])){
			
				$user->nameErr = errorString("Name is required","nome");
				$noErrors = false;
			
			}else{
				
				$user->name = testInput($_POST["nome"]);
				// check if name only contains letters and whitespace
				if (!isAlpha($user->name)){
					$user->nameErr = errorString("Only letters and white space allowed in name","nome");
					$noErrors = false;
				}
			}

			if (empty($_POST["cognome"])){
				$user->lastnameErr = errorString("Lastname is required","nome");
				$noErrors = false;
			}
			else 
			{
				$user->lastname = testInput($_POST["cognome"]);
				// check if name only contains letters and whitespace
				if (!isAlpha($user->lastname)){
					$user->lastnameErr = errorString("Only letters and white space  allowed in lastname","nome"); 
					$noErrors = false;
				}
			}
			
			if (empty($_POST["email"])){
				$user->emailErr = errorString("Email is required","nome");
				$noErrors = false;
			}
			else 
			{
				$user->email = testInput($_POST["email"]);
				
				// check if mail is well formatted
				if (mailExists($user->email,$dbconn)) {
					$user->emailErr = errorString("Email provided already Exists","nome"); 
					$noErrors = false;
				}
			}

			if (empty($_POST["password"])){
				$user->passwordErr = errorString("Password is required","nome");
				$noErrors = false;
			
			}else{
				$user->password = testInput($_POST["password"]);
				if (!isAlphanumeric($user->password)){
					$user->passwordErr = errorString("Only letters,white space and number allowed in password","nome"); 
					$noErrors = false;
				
				}else{
					//md5 hashing
					$hashedPass = $user->hashPass();
				}
			}

			if (empty($_POST["username"])){
				$user->usernameErr = errorString("username is required","nome");
				$noErrors = false;
			}else{
				$user->username = testInput($_POST["username"]);
				if(!isAlphanumeric($user->username)){
					$user->usernameErr = errorString("Invalid username","nome"); 
					$noErrors = false;
				}
				
				if(checkUsername($user->username,$dbconn)){
					$user->usernameErr = errorString("username already exists","nome");
					$noErrors = false;
				}

			}

			if (empty($_POST["bday"])){
				$user->bdayErr = errorString("Date is required","nome");
				$noErrors = false;
			}else{
				$user->bday = testInput($_POST["bday"]);
			}

			if (empty($_POST["residenza"])){
				
				$user->residenceErr = errorString("residence is required","nome");
				$noErrors = false;
			}else{
				$user->residence = testInput($_POST["residenza"]);
				// check if name only contains letters and whitespace
				if (!isAlphanumeric($user->residence)) 
				{
					$user->residenceErr = errorString("Only letters and white space allowed in residence","nome"); 
					$noErrors = false;
				}
			}

			if($noErrors==true)
			{
				//create the activation code
				$activasion = md5(uniqid(rand(),true));
		
				$lastId = getLastId($dbconn);
				$query = "INSERT INTO utenti (idUtente, username, password, email, nome, cognome, dataDiNascita, residenza,active)";
				$query .= "VALUES ('$lastId', '$user->username', '$hashedPass','$user->email','$user->name', '$user->lastname', '$user->bday', '$user->residence','$activasion')";
				
				if(!$dbconn->query($query))
				{
					header('Location:../registrationErrorPage.html');
				}
				else
				{
					$user->userid = $lastId;
					//then send mail
					sendActivationMail($activasion,$user);
					
					header('Location:../registrationSuccessfulPage.html');
				}
				
			}
		}  
		$dbconn->close();	
		
	}catch (Exception $e) {
		header('Location:../registrationErrorPage.html');
	}
	
	include "signupView.php";
	
	function sendActivationMail($activasion,$user){
		
		$url = ROOT."signup/";
		$id = $user->userid;
		$to = $user->email;
		$subject = "Company Inventory";
		$body = "<p>Ciao $user->name,</p>
		<p>Grazie per esserti registrato a Company Inventory.<br>
		Per attivare il tuo account clicca qui: <a href='".$url."activate.php?x=$id&y=$activasion'>".$url."activate.php?x=$id&y=$activasion</a></p>
		<p> I tuoi dati di accesso</p>
		<p>
			Username: $user->username<br>
			Password: $user->password
		</p>		
		<p>Grazie,<br>
		Staff Company Inventory</p>";

		$mail = new Mail();
		$mail->setFrom(SITEEMAIL,"Company Inventory");
		$mail->addAddress($to);
		$mail->subject($subject);
		$mail->body($body);
		$mail->send();
	}
  	
    function getLastId($dbconn)
    {
    	$lastId;
    	$row;
    	$query="SELECT idUtente FROM utenti ORDER BY idUtente DESC LIMIT 1";
        $result = $dbconn->query($query);
        if(mysqli_num_rows($result) > 0)
        {
   		    // output data of each row
    	  while($row = mysqli_fetch_assoc($result))
	      { 
	      	$lastId = $row['idUtente'] +1;
	       return $lastId;
	      }
        }

    }

?>