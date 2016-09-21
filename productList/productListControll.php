<?php  
/*load dbConn*/
	include '../php/DBConnection.php';

		
   /*load session controll*/
	include '../php/sessionControl.php';
	 

    $dbconn = new DBConnection();
	


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