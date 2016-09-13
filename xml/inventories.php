<?php
	/*load dbConn*/
	include '../php/DBConnection.php';
	$dbConn = new DBConnection();
	$dbConn->open();
	//check the session
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
    echo '<inventoryList>';

    $query="SELECT * FROM inventari WHERE idUtente='$userId'";
    $result =$dbConn->query($query);

    if(mysqli_num_rows($result) > 0)
    {
		    // output data of each row
	  while($row = mysqli_fetch_assoc($result))
      { 
      	echo "<inventory>";
      	echo "<id>".$row['idInventario']."</id>";
		echo "<name>".$row['nomeInventario']."</name>";
		echo "<color>".randomColor()."</color>";
      	echo "</inventory>";
      }
    }
	echo '</inventoryList>';
    $dbConn->close();

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