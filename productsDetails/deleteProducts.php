<?php 
 	include '../php/DBConnection.php';
	include '../php/sessionControl.php';

	$dbconn = new DBConnection();
	$productIdError = $productId ="";

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
					$queryToProduct = "DELETE FROM prodotti WHERE idProdotto ='$productId'";
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