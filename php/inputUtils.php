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

 ?>