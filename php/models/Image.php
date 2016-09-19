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
