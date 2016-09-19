<?php 

	class UserData{
		
		private $username;
		private $password;
		
		private $usernameErr;
		private $passwordErr;
		
		private $dbErr;
		
		// Assigning the values
		public function __construct() {
		  $this->username = "";
		  $this->password = "";
		  $this->usernameErr = "";
		  $this->passwordErr = "";
		  $this->dbErr = "";
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