<?php
	
	/*load dbConn*/
	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	
	$dbConn = new DBConnection();
	
	$username =$_SESSION["username"];
    $password =$_SESSION["password"];
    $userid = $_SESSION["userid"];
	
	try{
			
		$dbConn->open();
		
		// Send the xml headers
		header('Content-type: text/xml');
		header('Pragma: public');
		header('Cache-control: private');
		header('Expires: -1');
		
		echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
		echo '<inventoryList>';

		$query="SELECT * FROM inventari WHERE idUtente='$userid'";
		$result =$dbConn->query($query);

		if(mysqli_num_rows($result) > 0)
		{
				// output data of each row
		  while($row = mysqli_fetch_assoc($result))
		  { 
			echo "<inventory>";
			echo "<id>".$row['idInventario']."</id>";
			echo "<name>".$row['nomeInventario']."</name>";
			echo "<color>".randomColor($row['idInventario'])."</color>";
			echo "</inventory>";
		  }
		}
		echo '</inventoryList>';
		$dbConn->close();
		
	}catch (Exception $e){
		echo errorString($e,"name");
	}

	function randomColor($seed)
	{
		//setto come seme l'id inventario, cosi i colori sono statici
		srand($seed);
		
		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
	    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	    return $color;
	}
?>