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
		
	}
?>
