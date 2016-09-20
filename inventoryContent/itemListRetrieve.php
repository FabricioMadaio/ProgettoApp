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
		
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// Send the xml headers
			header('Content-type: text/xml');
			header('Pragma: public');
			header('Cache-control: private');
			header('Expires: -1');
			
			echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
		
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
		echo "<error>".$e."</error>";
	}
?>