<?php
	/*load dbConn*/
	include '../php/DBConnection.php';
	/*load session controll*/
	include '../php/sessionControl.php';
	$dbConn = new DBConnection();

    try
    {
    	$dbConn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			    $username =$_SESSION["username"];
			    $password =$_SESSION["password"];
			    $userId = getUserid($dbConn,$username,$password);

				$query=$ricerca="";
                $query="SELECT nomeProdotto,IdProdotto,immagine FROM prodotti JOIN inventari on prodotti.idInventario = inventari.idInventario JOIN immagini ON 
				               prodotti.idImmagine= immagini.idImmagini WHERE inventari.idUtente='$userId'";
                /*"."."."*/
				if (!strcmp ( $_POST["ricerca"] , "") == 0 && !empty($_POST["ricerca"])) 
				{
					$ricerca = test_input($_POST['ricerca']);
					$query.=" AND nomeProdotto LIKE '%".$ricerca."'";

				}
			

				// Send the headers
				header('Content-type: text/xml');
				header('Pragma: public');
				header('Cache-control: private');
				header('Expires: -1');
				echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
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
	    catch (Exception $e) 
	    {

		//header('Location:../errorePage.html');

	    }

     function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	function getUserid($dbconn,$username,$password)
    {
      $query="SELECT idUtente FROM utenti WHERE password ='$password' AND username ='$username'";
       $result = $dbconn->query($query);
        if(mysqli_num_rows($result) > 0)
        {
   		    // output data of each row
    	  while($row = mysqli_fetch_assoc($result))
	      { 
	      	$userId = $row['idUtente'];
	       return $userId;
	      }
	    }
    }
?>