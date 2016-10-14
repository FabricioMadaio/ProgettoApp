<?php

	 function testInput($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	function isAlphanumeric($string){
		return preg_match("/^[A-Za-z0-9_. ]*$/",$string);
	}
	
	function isAlpha($string){
		return preg_match("/^[A-Za-z_. ]*$/",$string);
	}
	
	function errorString($err,$name){
		 return '<li class="error-li" name ="'.$name.'_e" style="display:block"><p>'.$err.'</p></li>';
	}
	
	/*sends the xml headers*/
	function sendXmlHeaders(){
		
		header('Content-type: text/xml');
		header('Pragma: public');
		header('Cache-control: private');
		header('Expires: -1');
		
		echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
	}
	
	/*error handler for xml services, ends script*/
	function serviceDie($e){
		echo "<error>".$e."</error>";
		die();
	}
	
	function checkUsername($username,$dbconn)
	{
		$query ="SELECT username FROM utenti";
		$result = $dbconn->query($query);
		if(mysqli_num_rows($result) > 0)
		{
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			if($row["username"] == $username)
			{
			   return true;
			} 
			 return false;			
			}
		  }
		}
	}
	
	function mailExists($email,$dbconn){
		
    	$row;
    	$query="SELECT email FROM utenti WHERE email = '$email'";
        $result = $dbconn->query($query);
        if(mysqli_num_rows($result) > 0)
        {
   		    // output data of each row
    	  while($row = mysqli_fetch_assoc($result))
	      { 
	       return true;
	      }
        }
		return false;
	}
	
	//verifica se il token di reset password è valido
	function tokenCheck($token,$dbconn){
		
		$invalidTokenMessage = errorString('Codice non valido, per favore usa il link che hai ricevuto tramite email.',"name");
	
		if (empty($token)){
			return $invalidTokenMessage;
		}
		//create the activation code
		$query = "SELECT resetToken, resetComplete FROM utenti WHERE resetToken = '$token'";
		
		$result = $dbconn->query($query);
		
		if(mysqli_num_rows($result) > 0)
		{
			// output data of each row
			while($row = mysqli_fetch_assoc($result))
			{ 
				if(!empty($row['resetToken'])){
					if($row['resetComplete'] == 'yes')
						return 'La tua password è gia stata cambiata!';
					else
						return "";
				}
			}
		}
		
		return $invalidTokenMessage;
	}

 ?>