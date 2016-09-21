<?php 
  			$query="SELECT nomeProdotto,idProdotto,immagine FROM prodotti JOIN inventari on prodotti.idInventario = inventari.idInventario JOIN immagini ON 
				               prodotti.idImmagine= immagini.idImmagini WHERE inventari.idUtente='$userId'";
               echo "$query";
 ?>