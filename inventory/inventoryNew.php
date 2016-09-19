<?php 

	/*INVENTORY RETRIEVE*/

	/*load dbConn*/
	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
	
    $dbconn = new DBConnection();
	
	$inventoryName =$inventoryNameErr = "";
	
    $username =$_SESSION["username"];
    $password =$_SESSION["password"];
    $inventoryNameCheck = false;
	
	try
	{
		/*open the connection*/
		$dbconn->open();
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
		        if (empty($_POST["inventoryName"])) 
					{
						$inventoryNameErr = "Il nome dell'inventario è richiesto";
					} 
					else
					{
						$inventoryName = test_input($_POST["inventoryName"]);
						if(!preg_match("/^[a-zA-Z0-9]*$/",$inventoryName)) 
						{
							 $inventoryNameErr = "Nome inventario invalido(solo lettere e numeri)"; 
						}
						else
						{
							if(check_inventoryName($inventoryName,$dbconn))
							{
								$inventoryNameErr="il nome dell'inventario gia esiste";
							}
						    else
						    {
							 $inventoryNameCheck=true;
						    }
						}

				    }

				if($inventoryNameCheck == true)
				{
					$lastId = getLastId($dbconn);
					$userId = getUserid($dbconn,$username,$password);
					$query ="INSERT INTO inventari (idInventario, idUtente, nomeInventario, quantitaProdotto) VALUES ('$lastId', '$userId', '$inventoryName', '1')";
					$result = $dbconn->query($query);
				}
				
				if(!empty($inventoryNameErr)){
					echo '<li class="error-li" name ="nome_e" style="display:block"><p>'.$inventoryNameErr.'</p></li></ol>';
				}else{
					echo 'inserimentoRiuscito';
				}

		  }

		$dbconn->close();
	}
	catch (Exception $e) 
		{
			header('Location:../registrationErrorePage.html');
		}

    function getUserid($dbconn,$username,$password)
    {
      $query="SELECT idUtente FROM utenti WHERE password ='$password' AND username ='$username'";
       $result = $dbconn->query($query);
        if(mysqli_num_rows($result) > 0)
        {
   		    // output data of each row
    	  while($row = mysqli_fetch_assoc($result))
	      { 
	      	$userId = $row['idUtente'];
	       return $userId;
	      }
	    }
    }
	
	function getLastId($dbconn)
    {
    	$lastId;
    	$row;
    	$query="SELECT idInventario FROM inventari ORDER BY idInventario DESC LIMIT 1";
        $result = $dbconn->query($query);
        if(mysqli_num_rows($result) > 0)
        {
   		    // output data of each row
    	  while($row = mysqli_fetch_assoc($result))
	      { 
	      	$lastId = $row['idInventario'] +1;
	       return $lastId;
	      }
        }

    }

	function check_inventoryName($inventoryName,$dbconn)
	{
		
		$query ="SELECT nomeInventario FROM inventari";
		$result = $dbconn->query($query);
		
        
      	if (mysqli_num_rows($result) > 0) {
   		    // output data of each row
    	while($row = mysqli_fetch_assoc($result)) {
            if(strcmp ($row["nomeInventario"] , $inventoryName) == 0)
            {
               return true;
            } 
	      }
	      return false;
        }
   }

 ?>