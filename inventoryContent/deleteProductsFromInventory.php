<?php 
 	include '../php/DBConnection.php';
	include '../php/sessionControl.php';

	$dbconn = new DBConnection();
	$inventoryIdError = $inventoryId ="";
	$productIdError = $productId ="";


	try{
		
		/*open the connection*/
		$dbconn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
    	 {
				if (empty($_POST["inventoryId"]))
					{
	              	 $inventoryIdError="Errore! per favore riprova";
					}
				else
					{
						$inventoryId = $_POST["inventoryId"];
					}

				if (empty($_POST["productId"]))
					{
	              	 $productIdError="Errore! per favore riprova";
					}
				else
					{
						$productId = $_POST["productId"];
					}



				if (empty($productIdError) && empty($inventoryIdError) ) 
				{
					$query = "DELETE FROM inventariprodotti WHERE idInventario ='$inventoryId' AND idProdotto='$productId'";
					$result = $dbconn->query($query);

					if(!empty($result))
					{
						echo "cancellazioneRiuscita";		
					}
					else
					{
						echo "$inventoryIdError";
					}
			    }
			}

		
	    $dbconn->close();
		
	}
	catch (Exception $e)
	{
		echo $e;
	}

 ?>