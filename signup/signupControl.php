
<!-- CONTROLLER MODULE -->
<?php

	/*load dbConn*/
	include 'dbConnection.php';
	/*init model*/
	include 'initSignup.php';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["nome"])) {
	$nameErr = "Name is required";
	} else {
	$name = test_input($_POST["nome"]);
	// check if name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	$nameErr = "Only letters and white space allowed in name"; 
	}
	}
	if (empty($_POST["cognome"])) {
	$nameErr = "Lastname is required";
	} else 
	$lastname = test_input($_POST["cognome"]);
	// check if name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
	$lastnameErr = "Only letters and white space allowed in lastname"; 
	}

	if (empty($_POST["password"])) {
	$nameErr = "Password is required";
	} else {
	$lastname = test_input($_POST["password"]);
	}

	if (empty($_POST["username"])) {
	$usernameErr = "";
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

	}
}

	if (empty($_POST["comment"])) { 
	$comment = "";
	} else
	 {
	$comment = test_input($_POST["comment"]);
	}

	if (empty($_POST["gender"])) {
	$genderErr = "Gender is required";
	} else {
	$gender = test_input($_POST["gender"]);
	}
	
	include "signupView.php";


	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


	function check_username($username)
	{
		$conn = openDbConnection();
		$query ="SELECT username FROM utenti";
		$result = queryToDb($query);
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