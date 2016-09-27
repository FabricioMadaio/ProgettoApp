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
			
		$dbConn->open();
		
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			// Send the xml headers
			header('Content-type: text/xml');
			header('Pragma: public');
			header('Cache-control: private');
			header('Expires: -1');
			
			echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
			
			if (!empty($_POST["idInventory"])){
				$idInventario = $_POST['idInventory'];
			}else{
				$error=true;
			}
			
			if(checkUsername($username,$dbConn)){
				$error=true;
			}
		
			$query="SELECT prodotti.*, immagini.immagine ,inventariprodotti.quantita
					FROM inventariprodotti JOIN prodotti 
						ON (inventariprodotti.idProdotto = prodotti.idProdotto)
						JOIN immagini
						ON (prodotti.idImmagine	= immagini.idImmagini)
					WHERE idInventario='$idInventario'";
			
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
				echo "<name>".$row['nomeProdotto']."</name>";
				echo "<img>".$row['immagine']."</img>";
				echo "<amount>".$row['quantita']."</amount>";
				echo "</item>";
			  }
			}else{
				$error=true;
			}
			echo '</itemList>';
		}
		
		$dbConn->close();
			
	}catch (Exception $e){
		echo "<error>".$e."</error>";
	}
?>