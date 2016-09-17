<?php
	/*load dbConn*/
	include '../php/DBConnection.php';
	$dbConn = new DBConnection();

    try
    {
    	$dbConn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
				
				//check the session
				$ricerca = test_input($_POST['ricerca']);
				//$x = mysqli_real_escape_string($dbConn,$ricerca);
			    //take this data for have the id of the user
			    session_start();
			    $username =$_SESSION["username"];
			    $password =$_SESSION["password"];
			    $userId = getUserid($dbConn,$username,$password);
				// Send the headers
				header('Content-type: text/xml');
				header('Pragma: public');
				header('Cache-control: private');
				header('Expires: -1');
				echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
			    echo '<productList>';

			    $query="SELECT IdProdotto,nomeProdotto,descrizioneProdotto FROM prodotti,inventari,utenti WHERE inventari"."."."idUtente='$userId' AND prodotti"."."."idInventario = inventari"."."."idInventario AND nomeProdotto LIKE '%".$ricerca."'";
			    $result =$dbConn->query($query);

                if(mysqli_num_rows($result) > 0)
			    {
					    // output data of each row
				  while($row = mysqli_fetch_assoc($result))
			      { 
			      	echo "<product>";
			      	echo "<id>".$row['IdProdotto']."</id>";
					echo "<name>".$row['nomeProdotto']."</name>";
					echo "<color>".randomColor()."</color>";
			      	echo "</product>";
			      }
			    }
				echo '</productList>';
		    }
			    $dbConn->close();
	    }
	    catch (Exception $e) 
	    {

		header('Location:../errorePage.html');

	    }

     function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	function randomColor()
	{
		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	    return $color;
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