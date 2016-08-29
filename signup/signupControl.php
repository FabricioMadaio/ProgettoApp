
<!-- CONTROLLER MODULE -->
<?php

	/*load dbConn*/
	include '../php/dbConnection.php';
	/*init model*/
	include 'initSignup.php';

	$nameCheck = $lastnameCheck = $usernameCheck = $passCheck = $residenceCheck =false;
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if (empty($_POST["nome"])) 
		{
			$nameErr = "Name is required";
		} 
		else 
		{
			$name = test_input($_POST["nome"]);
		// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
			{
			$nameErr = "Only letters and white space allowed in name"; 
			}
			else
			{
			$nameCheck = true;
			}
		}

		if (empty($_POST["cognome"])) 
		{
			$lastnameErr = "Lastname is required";
		}
		else 
		{
			$lastname = test_input($_POST["cognome"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z]*$/",$lastname)) 
			{
				$lastnameErr = "Only letters and white space  allowed  in lastname"; 
			}
			else
			{
				$lastnameCheck=true;
			}
		}

	if (empty($_POST["password"])) 
	{
		$passwordErr = "Password is required";
	} 
	else 
	{
		$password = test_input($_POST["password"]);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/",$password)) 
		{
			$passwordErr = "Only letters,white space and number allowed  in password"; 
		}
		else
		{
	 	   $passCheck=true;
     	}
	}

	if (empty($_POST["username"])) 
	{
	$usernameErr = "username is required";
	} 
	else
    {
		$username = test_input($_POST["username"]);
		if(!preg_match("/^[a-zA-Z0-9]*$/",$username)) 
	  	{
	   	 $usernameErr = "Invalid username"; 
	  	}
			if(check_username($username))
	 		{
	 			$usernameErr="username already exists";
		 	}
		 	else
		 	{
		 		$usernameCheck=true;
		 	}

	}

        if (empty($_POST["bday"])) 
		{
			$dateErr = "Date is required";
		}
		else 
		{
			$date = test_input($_POST["bday"]);
			// check if name only contains letters and whitespace
			$dateCheck=true;
			
		}

		if (empty($_POST["residenza"])) 
		{
			$residenceErr = "residence is required";
		}
		else 
		{
			$residence = test_input($_POST["residenza"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$residence)) 
			{
				$residenceErr = "Only letters and white space allowed in residence"; 
			}
			else
			{
				$residenceCheck=true;
			}
		}

		if($nameCheck==true && $lastnameCheck==true && $usernameCheck==true && $passCheck==true && $residenceCheck==true && $dateCheck ==true)
        {
        	echo "sono qui";
        	$lastId = getLastId();
        	$query = "INSERT INTO utenti (idUtente, username, password,nome,cognome,dataDiNascita,residenza) VALUES ('$lastId', '$username', '$password', '$name', '$lastname', '$date', '$residence')";
        	if(!queryToDb($query))
        	{
               header('Location:../registrationErrorePage.html');
        	}
            else
            {
  				header('Location:../registrationSuccesifulPage.html');
            }
        	
        }
    }  

	include "signupView.php";
  

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	
    function getLastId()
    {
    	$lastId;
    	$row;
    	$query="SELECT idUtente FROM utenti ORDER BY idUtente DESC LIMIT 1";
        $result = queryToDb($query);
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

	function check_username($username)
	{
		
		$query ="SELECT username FROM utenti";
		$result = queryToDb($query);
		
        
      	if (mysqli_num_rows($result) > 0) {
   		    // output data of each row
    	while($row = mysqli_fetch_assoc($result)) {
            if(strcmp ($row["username"] , $username) == 0)
            {
               return true;
            } 
	      }
	      return false;
        }
   }
?>