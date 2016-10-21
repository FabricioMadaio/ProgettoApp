<?php

	class Image {
		
		private $id;
		private $url;
		
		// Assigning the values
		public function __construct($id, $url) {
		  $this->id = $id;
		  $this->url = $url;
		}
	
		public function dbInsert($dbconn){			
		
			$id = ($this->id==null)?"NULL":$this->id;
			
			$query="INSERT INTO immagini (idImmagini, immagine) VALUES (".$id.",'".$this->url."')";
			$dbconn->query($query);
			return mysqli_insert_id($dbconn->getConnection());
		}
		
		public function dbDrop($dbconn){
			
			if($this->id == null) return;
			if($this->id<0) return;
			
			$query="DELETE FROM immagini WHERE idImmagini ='$this->id'";
			
			$result = $dbconn->query($query);
			if(!empty($result))
			{				
				unlink(UPLOAD_FOLDER.'/uploads/150x150/'.$this->url);
				unlink(UPLOAD_FOLDER.'/uploads/20x20/'.$this->url);
			}
			
		}
		
		public function getFromProduct($productId,$userid,$dbconn){
			
			$query="SELECT immagini.* FROM
				prodotti JOIN immagini
					ON (prodotti.idImmagine = immagini.idImmagini) 
				WHERE idProdotto ='$productId' AND idUtente = '$userid'";
			
			$result = $dbconn->query($query);
			if(mysqli_num_rows($result) > 0)
			{
				// output data of each row
			  while($row = mysqli_fetch_assoc($result))
			  { 
				$this->id = $row['idImmagini'];
				$this->url = $row['immagine'];
			  }
			}
		}
		
		static public function getIdFromUrl($url,$dbconn){
			
			$query="SELECT * FROM immagini WHERE immagine = '".$url."'";
			$result = $dbconn->query($query);
			if(mysqli_num_rows($result) > 0)
			{
				// output data of each row
			  while($row = mysqli_fetch_assoc($result))
			  { 
				return $row['idImmagini'];
			  }
			}
			return -1;
		}
		
	}
	
?>
