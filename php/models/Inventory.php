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
	}
?>
