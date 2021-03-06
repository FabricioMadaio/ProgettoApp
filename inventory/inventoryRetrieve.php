<?php
	
	/*load dbConn*/
	include '../php/config.php';
	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	
	$dbConn = new DBConnection();
	
	$username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $userid = $_SESSION["userid"];
	
	try{

		// Send the xml headers
		sendXmlHeaders();
		
		$dbConn->open();
		
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$query="SELECT * FROM inventari WHERE idUtente='$userid'";
			
			if (!empty($_POST["search"])){
				$query.=" AND nomeInventario LIKE '".testInput($_POST['search'])."%'";
			}
				
			
			$result =$dbConn->query($query);

			echo '<inventoryList>';
			
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
		}
		
		$dbConn->close();
			
	}catch (Exception $e){
		serviceDie($e);
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