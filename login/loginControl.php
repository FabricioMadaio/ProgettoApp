<?php 
 	/*load dbConn*/
	include '../php/DBConnection.php';
	/*init model*/
	include 'initLogin.php';


	$passCheck=$usernameCheck=false;
	$dbconn = new DBConnection();
	
	try{
		/*open the connection*/
		$dbconn->open();

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			if (empty($_POST["password"])) 
			{
				$passwordErr = "Inserisci la password";
			} 
			else 
			{
				$password = test_input($_POST["password"]);
				$passCheck=true;	
			}

			if (empty($_POST["username"])) 
			{
				$usernameErr = "inserisci l'usename";
			} 
			else
			{
				$username = test_input($_POST["username"]);
				$usernameCheck=true;	 	
			}

			if($usernameCheck == true && $passCheck == true)
			{
				if(checkUserData($username,$password,$dbconn))
				{

					session_start();
					$_SESSION["username"] = $username;
					$_SESSION["password"] = $password;
					echo "string";
					header('Location:../index.php');
				}

				else
				{
					$dbErr ="Nessuna corrispondenza trovata nel database!";
				}
			}
		}
		$dbconn->close();	
		
	}catch (Exception $e) {
		$dbErr ="errore nel database";
	}

	include "loginView.php";

    function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	function checkUserData($username,$password,$dbconn)
	{
		$query ="SELECT username,password FROM utenti";
		$result = $dbconn->query($query); 
      	if (mysqli_num_rows($result) > 0) {
   		    // output data of each row
    	while($row = mysqli_fetch_assoc($result)) 
    	  {
            if(strcmp ($row["username"] , $username) == 0 && strcmp ($row["password"] , $password) == 0  )
            {
               return true;
            } 
	      }
	      return false;
        }
   }
	
 ?>