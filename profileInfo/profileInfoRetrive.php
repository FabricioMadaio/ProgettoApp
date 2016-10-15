<?php

	include '../php/config.php';
	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	
	$dbConn = new DBConnection();

    try
    {
		
		// Send the headers XML service
		sendXmlHeaders();
		
    	$dbConn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
				
			   
			    $userId = $_SESSION["userid"];
				
				$query="";
				$query="SELECT * FROM utenti WHERE idUtente='$userId' ";
				
			
			    echo '<userInfo>';
			    $result =$dbConn->query($query);
                
                if(mysqli_num_rows($result) > 0)
			    {
				  // output data of each row
				  while($row = mysqli_fetch_assoc($result))
			      { 
			      	echo "<user>";
					echo "<name>".$row['nome']."</name>";
					echo "<secondName>".$row['cognome']."</secondName>";
					echo "<username>".$row['username']."</username>";
					echo "<bDay>".$row['dataDiNascita']."</bDay>";
					echo "<email>".$row['email']."</email>";
					echo "<residenza>".$row['residenza']."</residenza>";
			      	echo "</user>";
			      }
			    }
				echo '</userInfo>';
		    }
			$dbConn->close();
	    }
	    catch (Exception $e){	
			serviceDie($e);
		}
?>