<?php 

	/*INVENTORY RETRIEVE*/

	/*load dbConn*/
	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	
    $dbconn = new DBConnection();
	
	$inventoryErr = "";
	
    $username = $_SESSION["username"];
	$userid = $_SESSION["userid"];
    $password = $_SESSION["password"];
	
	try{
		
		/*open the connection*/
		$dbconn->open();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["inventoryName"])){
					$inventoryErr = "Il nome dell'inventario è richiesto";
			}else{
				
				$inventoryName = testInput($_POST["inventoryName"]);
				if(!isAlphanumeric($inventoryName)){
					
					 $inventoryErr = "Nome inventario non valido (solo lettere e numeri)"; 
					 
				}else{
					if(check_inventoryName($inventoryName,$dbconn)){
						$inventoryErr="Il nome dell'inventario gia esiste";
					}
				}

			}
				
			if(empty($inventoryErr)){
				$lastid = getLastId($dbconn);
				$query ="INSERT INTO inventari (idInventario, idUtente, nomeInventario, quantitaProdotto) VALUES ('$lastid', '$userid', '$inventoryName', '1')";
				$result = $dbconn->query($query);
				echo 'inserimentoRiuscito';
			}else{
				echo $inventoryErr;
			}
		}

		$dbconn->close();
		
	}catch (Exception $e){
		echo errorString($e,"name");
	}
	
	function getLastId($dbconn){
		
    	$lastId;
    	$row;
    	$query="SELECT idInventario FROM inventari ORDER BY idInventario DESC LIMIT 1";
        $result = $dbconn->query($query);
        if(mysqli_num_rows($result) > 0){
   		    // output data of each row
    	  while($row = mysqli_fetch_assoc($result)){ 
	      	$lastId = $row['idInventario'] +1;
	       return $lastId;
	      }
        }

    }

	function check_inventoryName($inventoryName,$dbconn){
		
		$query ="SELECT nomeInventario FROM inventari";
		$result = $dbconn->query($query);
		
        
      	if (mysqli_num_rows($result) > 0) {
   		    // output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				if(strcmp ($row["nomeInventario"] , $inventoryName) == 0){
				   return true;
				} 
			}
			return false;
		}
   }

 ?>