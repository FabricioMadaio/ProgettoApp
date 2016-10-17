<?php 

	include '../php/config.php';
 	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	
	include '../php/models/Image.php';

	$dbconn = new DBConnection();
	$productIdError = $productId ="";
	
	$userid = $_SESSION["userid"];

	try{
		
		/*open the connection*/
		$dbconn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		 {
				if (empty($_POST["productId"]))
					{
	              	 $productIdError="Errore! per favore riprova";
					}
				else
					{
						$productId = $_POST["productId"];
					}

				if (empty($productIdError)) 
				{
					
					$img = new Image(null,null);
					$img->getFromProduct($productId,$userid,$dbconn);
					$img->dbDrop($dbconn);
					
					$queryToProduct = "DELETE FROM prodotti WHERE idProdotto ='$productId' AND idUtente = '$userid'";
					$resultToProduct = $dbconn->query($queryToProduct);

					if(!empty($resultToProduct))
					{
						$queryToProductInventory="DELETE FROM inventariprodotti WHERE idProdotto ='$productId'";
						$resultToProductInventory = $dbconn->query($queryToProductInventory);

							if (!empty($resultToProductInventory)) 
							{
								echo "cancellazioneRiuscita";
							}
						    else
						    {
							 echo "$productIdError";
						    }
					}
					else
					{
						echo "$productIdError";
					}
			    }
			}

		
	    $dbconn->close();
		
	}
	catch (Exception $e)
	{
		echo errorString($e,"name");
	}

 ?>