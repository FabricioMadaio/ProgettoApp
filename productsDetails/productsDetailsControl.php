<?php

	include '../php/DBConnection.php';
	include '../php/sessionControl.php';
	include '../php/inputUtils.php';
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
			    

				$query=$productId="";

				if(empty($_GET["id"])) 
				{
					header('Location:../errorePage.html');
				}
				else
				{
				 $item->id = testInput($_GET['id']);
				 
				 $query="SELECT nomeProdotto,immagine,descrizioneProdotto FROM prodotti,immagini WHERE  idProdotto='$item->id' AND  prodotti"."."."idImmagine =
				       immagini"."."."idImmagini AND prodotti.idUtente='$userId'"; 
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
			    }else{
					/*page miss*/
					header('Location:../errorePage.html');
				}
		    }
			    $dbConn->close();
			   include "productsDetailsView.php";
	    }
	    catch (Exception $e) 
	    {
			header('Location:../errorePage.html');
	    }
?>