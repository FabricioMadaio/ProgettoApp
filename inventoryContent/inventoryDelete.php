<?php 
 	include '../php/DBConnection.php';
	include '../php/sessionControl.php';

	$dbconn = new DBConnection();
	$inventoryIdError = $inventoryId ="";

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

				if (empty($productIdError)) 
				{
					$queryToInventory = "DELETE FROM inventari WHERE idInventario ='$inventoryId'";
					$resultToInventory = $dbconn->query($queryToInventory);

					if(!empty($resultToInventory))
					{
						$queryToProductInventory="DELETE FROM inventariprodotti WHERE idInventario ='$inventoryId'";
						$resultToProductInventory = $dbconn->query($queryToProductInventory);

							if (!empty($resultToProductInventory)) 
							{
								echo "cancellazioneRiuscita";
							}
						    else
						    {
							 echo "$inventoryIdError";
						    }
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