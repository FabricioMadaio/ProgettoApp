<?php  
/*load dbConn*/
	include '../php/DBConnection.php';

	if(!isset($_SESSION)){
    session_start();
    } 

    $dbconn = new DBConnection();
	
	if(!isset($_SESSION["username"]))
    {
    	header('Location:../login/');
    }

    $username =$_SESSION["username"];
    $password =$_SESSION["password"];
    $inventoryNameCheck = false;
	try
	{
		/*open the connection*/
		$dbconn->open();
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{


		    }

		$dbconn->close();
		//include "inventoryView.php"	;
	}
	catch (Exception $e) 
		{
			header('Location:../registrationErrorePage.html');
		}
?>