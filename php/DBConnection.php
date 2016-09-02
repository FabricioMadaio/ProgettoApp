<?php
 //define data to connect to the database
	class DBConnection {
		
		public static $DB_USER ='root';
		public static $DB_PSW  ='';
		public static $DB_HOST ='localhost';
		public static $DB_NAME ='my_companyinventory';
		
		private $conn;
		
		public function __construct() {
			$conn = null;
		}
	
		public function open(){
	
			error_reporting(E_ALL ^ E_WARNING);
			$this->conn = mysqli_connect(self::$DB_HOST,self::$DB_USER,self::$DB_PSW,self::$DB_NAME);

			// Check connection
			if (!$this->conn){
				throw new Exception("Connection failed: " . mysqli_connect_error());
			}else{
				return $this->conn;
			}
		}
		
		public function getConnection(){
			return $this->conn;
		}
		
		public function close(){
			mysqli_close($this->conn);
		}
		
		public function query($query){
			
			$result = mysqli_query($this->conn,$query);
	
			if (!$result){
				throw new Exception("Error description: " . mysqli_error($this->conn));
			}
			
			return $result;
		}

	}

 ?>