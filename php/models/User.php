<?php

	class User {
		
		private $name;
		private $email;
		private $bday;
		private $residence;
		private $password;
		private $username;
		private $lastname;
		private $userid;
		
		private $nameErr;
		private $emailErr;
		private $dateErr;
		private $residenceErr;
		private $passwordErr;
		private $usernameErr;
		private $lastnameErr;
		private $dbErr;
		
		// Assigning the values
		public function __construct() {
			$this->name = "";
			$this->email = "";
			$this->bday = "";
			$this->residence = "";
			$this->password = "";
			$this->username = "";
			$this->lastname = "";
			
			$this->nameErr = "";
			$this->emailErr = "";
			$this->bdayErr = "";
			$this->residenceErr = "";
			$this->passwordErr = "";
			$this->usernameErr = "";
			$this->lastnameErr = "";
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
		}
		
		public function hashPass(){
			return md5($this->password);
		}
	}
?>