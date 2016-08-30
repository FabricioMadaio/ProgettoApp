<?php

	class Image {
		
		private $id;
		private $url;
		
		// Assigning the values
		public function __construct($id, $url) {
		  $this->id = $id;
		  $this->url = $url;
		}
	
		public function dbInsert($conn){			
		
			$id = ($this->id==null)?"NULL":$this->id;
			
			$query="INSERT INTO immagini (idImmagini, immagine) VALUES (".$id.",'".$this->url."')";
			queryToDb($query,$conn);
			return mysqli_insert_id($conn);
		}
		
		static public function getIdFromUrl($url,$conn){
			
			$query="SELECT * FROM immagini WHERE immagine = '".$url."'";
			$result = queryToDb($query,$conn);
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
