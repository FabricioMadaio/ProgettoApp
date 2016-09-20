<?php
	/*load dbConn*/
	include '../php/DBConnection.php';
	/*load session controll*/
	include '../php/sessionControl.php';
	/*load item class*/
	include '../php/models/Item.php';
	$dbConn = new DBConnection();
	$item = new Item("","","");

    try
    {  
    	$dbConn->open();
		if ($_SERVER["REQUEST_METHOD"] == "GET") 
		{
			    $username =$_SESSION["username"];
			    $password =$_SESSION["password"];
			    $userId = getUserid($dbConn,$username,$password);

				$query=$productId="";

				if(empty($_GET["id"])) 
				{
					header('Location:../errorePage.html');
				}
				else
				{
				 $productId = test_input($_GET['id']);
				 $query="SELECT nomeProdotto,immagine,descrizioneProdotto FROM prodotti,immagini WHERE  idProdotto='$productId ' AND  prodotti"."."."idImmagine =
				       immagini"."."."idImmagini"; 
				}
			
			    $result =$dbConn->query($query);

                if(mysqli_num_rows($result) > 0)
			    {
					    // output data of each row
				  while($row = mysqli_fetch_assoc($result))
			      { 
			      	
					$item->name = $row['nomeProdotto'];
					$item->description = $row['descrizioneProdotto'];
					$item->imageUrl = $row["immagine"];
			      	
			      } 
			    }
		    }
			    $dbConn->close();
			    include "productsDetailsView.php";
	    }
	    catch (Exception $e) 
	    {
        echo "$e";
		//header('Location:../errorePage.html');

	    }

     function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
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
?>