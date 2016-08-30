<?php
 //defiene data to coonect to the database
function openDbConnection(){
	
	$DB_USER ='companyinventory';
	$DB_PSW  ='';
	$DB_HOST ='localhost';
	$DB_NAME ='my_companyinventory';

	static $conn;

	error_reporting(E_ALL ^ E_WARNING);
	$conn = mysqli_connect($DB_HOST,$DB_USER,$DB_PSW,$DB_NAME);

	// Check connection
	if (!$conn){
		throw new Exception("Connection failed: " . mysqli_connect_error());
	}else{
		return $conn;
	}
}

function queryToDb($query,$conn){
	
	$result = mysqli_query($conn,$query);
	
	if (!$result){
		throw new Exception("Error description: " . mysqli_error($conn));
	}
	
	return $result;
}

 ?>