<?php

	class Item {
		
		private $name;
		private $description;
		private $image;
		private $imageUrl;
		
		public static $defaultImageId = -1;
		
		// Assigning the values
		public function __construct($name, $description, $imageUrl) {
		  $this->name = $name;
		  $this->description = $description;
		  $this->imageUrl = $imageUrl;
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
		
		private function getInventoryInsertQuery($inventID,$productId){
			$q="INSERT INTO inventariprodotti (idInventario,idProdotto, quantita)";
			$q.=" VALUES ('".$inventID."','".$productId."','1')";
			return $q;
		}
				
		private function getInsertQuery($imageID,$userID){
			$q="INSERT INTO prodotti (idProdotto, idImmagine,idUtente,nomeProdotto, descrizioneProdotto)";
			$q.=" VALUES (NULL, '".$imageID."','".$userID."','".$this->name."','".$this->description."')";
			return $q;
		}
		
		/* restituisce l'id del immagine. Se non è stata caricata la inserisce nel db */
		private function retrieveImageId($dbconn){
			
			if(!empty($this->imageUrl)){
				
					$img = new Image(null,$this->imageUrl);
					return $img->dbInsert($dbconn);
			}
			return -1;
		}
		
		public function nameAvailable($dbconn){
			
			$query="SELECT * FROM prodotti WHERE nomeProdotto = '".$this->name."'";
			$result = $dbconn->query($query);
			if(mysqli_num_rows($result) > 0)
			{
				return false;
			}
			return true;
		}
		
		public function dbInsert($inventID,$userID,$dbconn){
			
			$imageID = $this->retrieveImageId($dbconn);
			$dbconn->query($this->getInsertQuery($imageID,$userID));
			
			$productId = mysqli_insert_id($dbconn->getConnection());
			$dbconn->query($this->getInventoryInsertQuery($inventID,$productId));
		}
		
	}
?>
