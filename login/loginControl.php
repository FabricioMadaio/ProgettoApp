<?php 
 	/*load dbConn*/
	include '../php/DBConnection.php';
	include '../php/inputUtils.php';
	
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
				$user->passwordErr = errorString("Inserisci la password","pass");
			} 
			else 
			{
				$user->password = testInput($_POST["password"]);
				$passCheck=true;	
			}

			if (empty($_POST["username"])) 
			{
				$user->usernameErr = errorString("inserisci l'usename","username");
			} 
			else
			{
				$user->username = testInput($_POST["username"]);
				$usernameCheck=true;	 	
			}

			if($usernameCheck == true && $passCheck == true)
			{
				$user->userid = checkUserData($user->username,$user->password,$dbconn);
				if($user->userid>=0)
				{

					session_start();
					$_SESSION["username"] = $user->username;
					$_SESSION["password"] = $user->password;
					$_SESSION["userid"] = $user->userid;
					
					//to home
					header('Location:../');
				}

				else
				{
					$user->dbErr = errorString("Nessuna corrispondenza trovata nel database!","db");
				}
			}
		}
		$dbconn->close();	
		
	}catch (Exception $e) {
		$user->dbErr = errorString("Errore nel database","db");
	}
	
	//chiamo la view
	include "loginView.php";

	/*verifica se l'utente e la password sono presenti nel DB*/
	function checkUserData($username,$password,$dbconn)
	{
		$query ="SELECT username,password,idUtente FROM utenti";
		$result = $dbconn->query($query); 
      	if (mysqli_num_rows($result) > 0) {
   		    // output data of each row
    	while($row = mysqli_fetch_assoc($result)) 
    	  {
            if(strcmp ($row["username"] , $username) == 0 && strcmp ($row["password"] , $password) == 0  )
            {
               return $row["idUtente"];
            } 
	      }
	      return -1;
        }
   }
	
 ?>