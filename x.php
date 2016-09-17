<?php 

$x = "z";

$query="SELECT IdProdotto,nomeProdotto,descrizioneProdotto FROM prodotti,inventari,utenti WHERE inventari"."."."idUtente='$userId' AND prodotti"."."."idInventario = inventari"."."."idInventario AND nomeProdotto LIKE '%".$x."'";
echo "$query";
 ?>