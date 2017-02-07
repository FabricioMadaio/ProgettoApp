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
				
			    $username =$_SESSION["username"];
			    $password =$_SESSION["password"];
			    $userId = $_SESSION["userid"];
				
				$query=$ricerca="";
				$query="SELECT IdProdotto,nomeProdotto,immagine FROM prodotti JOIN immagini on prodotti.idImmagine=immagini.idImmagini WHERE prodotti.idUtente='$userId' ";
				
				if (!strcmp ( $_POST["ricerca"] , "") == 0 && !empty($_POST["ricerca"])) 
				{
					$ricerca = testInput($_POST['ricerca']);
					$query.=" AND (nomeProdotto LIKE '".$ricerca."%' OR barcode LIKE '%".$ricerca."%')";
				}
			
			    echo '<productList>';
			    $result =$dbConn->query($query);
                
                if(mysqli_num_rows($result) > 0)
			    {
				  // output data of each row
				  while($row = mysqli_fetch_assoc($result))
			      { 
			      	echo "<product>";
			      	echo "<id>".$row['IdProdotto']."</id>";
					echo "<name>".$row['nomeProdotto']."</name>";
					echo "<image>".$row["immagine"]."</image>";
			      	echo "</product>";
			      }
			    }
				echo '</productList>';
		    }
			$dbConn->close();
	    }
	    catch (Exception $e){	
			serviceDie($e);
		}
?>