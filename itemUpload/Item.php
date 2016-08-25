<?php

	class Item {
		
		public $name;
		public $description;
		public $image;
		public $imageUrl;
		
		// Assigning the values
		public function __construct($name, $description, $imageUrl) {
		  $this->name = $name;
		  $this->description = $description;
		  $this->imageUrl = $imageUrl;
		}
	}
	
	$item = new Item("","","");
	
?>