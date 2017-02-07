<?php

	class Inventory {
		
		private $id;
		private $name;
		
		// Assigning the values
		public function __construct($id, $name) {
		  $this->name = $name;
		  $this->id = $id;
		}
		
		public function __get($property) {
			if (property_exists($this, $property)) {
			  return $this->$property;
			}
		}

		public function __set($property, $value) {
			if (property_exists($this, $property)) {
			  $this->$property = $value;
			}

			return $this;
		}
		
		public function getName($dbConn){
			$query="SELECT * FROM inventari WHERE idInventario = '".$this->id."'";
			$result =$dbConn->query($query);
			
			if(mysqli_num_rows($result) != 1){
				/*access denied*/
				header('Location:../errorPage.html');
			}else{
				  while($row = mysqli_fetch_assoc($result))
				  { 
					$this->name  = $row['nomeInventario'];
				  }
			}	
		}
		
		/*check if inventoryid matches the user*/
		public function checkUserOwner($userid,$dbConn){
			
			$query="SELECT * FROM inventari WHERE idUtente='$userid' AND idInventario = '".$this->id."'";
			$result =$dbConn->query($query);
			
			if(mysqli_num_rows($result) != 1){
				/*access denied*/
				header('Location:../errorPage.html');
			}else{
				  while($row = mysqli_fetch_assoc($result))
				  { 
					$this->name  = $row['nomeInventario'];
				  }
			}	
		}
		
		/*aggiunge un singolo prodotto all'inventario */
		public function productInsertQuery($productId){
			$q="INSERT INTO inventariprodotti (idInventario,idProdotto, quantita) VALUES ";
			$q.=" ('".$this->id."','".$productId."','1')";
			return $q;
		}
		
		/*aggiunge un array di prodotti all'inventario*/
		public function productsInsertQuery($indices,$amount){
			
			$q="INSERT INTO inventariprodotti (idInventario,idProdotto, quantita) VALUES ";
			
			for($i=1;$i<=count($indices);$i++){
				
				$q.=" ('".$this->id."','".$indices[$i]."','".$amount[$i]."')";
				if($i!=count($indices))	$q.=",";
			}
			
			$q.=" ON DUPLICATE KEY UPDATE quantita = VALUES(quantita) + quantita";
			
			return $q;
		}
		
		public function exists($userID,$dbconn){
			
			$query="SELECT * FROM inventari WHERE idInventario = '$this->id' AND idUtente = '$userID'";
			$result = $dbconn->query($query);
			if(mysqli_num_rows($result) > 0)
			{
				return true;
			}
			return false;
		} 		
	}
?>
