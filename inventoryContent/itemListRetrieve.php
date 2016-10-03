<?php

	/*load dbConn*/
	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	
	$dbConn = new DBConnection();
	
	$username =$_SESSION["username"];
    $password =$_SESSION["password"];
    $userid = $_SESSION["userid"];
	
	$idInventario = 0;
	$error = false;
	
	try{
		
		// Send the xml headers
		sendXmlHeaders();
		
		$dbConn->open();
		
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			if (!empty($_POST["idInventory"])){
				$idInventario = $_POST['idInventory'];
			}else{
				serviceDie("idInventory empty");
			}
		
			$query="SELECT prodotti.*, immagini.immagine ,inventariprodotti.quantita
					FROM inventariprodotti JOIN prodotti 
						ON (inventariprodotti.idProdotto = prodotti.idProdotto)
						JOIN immagini
						ON (prodotti.idImmagine	= immagini.idImmagini)
					WHERE idInventario='$idInventario' AND prodotti.idUtente='$userid'";
			
			if (!empty($_POST["search"])){
				$query.=" AND nomeProdotto LIKE '".testInput($_POST['search'])."%'";
			}
				
			
			$result =$dbConn->query($query);

			echo '<itemList>';
			
			if(mysqli_num_rows($result) > 0)
			{
					// output data of each row
			  while($row = mysqli_fetch_assoc($result))
			  { 
				echo "<item>";
				echo "<idProdotto>".$row['idProdotto']."</idProdotto>";
				echo "<idInventario>".$idInventario."</idInventario>";
				echo "<name>".$row['nomeProdotto']."</name>";
				echo "<img>".$row['immagine']."</img>";
				echo "<amount>".$row['quantita']."</amount>";
				echo "</item>";
			  }
			}
			echo '</itemList>';
		}
		
		$dbConn->close();
			
	}catch (Exception $e){
		echo serviceDie($e);
	}
?>