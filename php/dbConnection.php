<?php
 //defiene data to coonect to the database
function openDbConnection()
{
	$DB_USER ='companyinventory';
	$DB_PSW  ='';
	$DB_HOST ='localhost';
	$DB_NAME ='my_companyinventory';

	 static $conn;

	 $conn = mysqli_connect($DB_HOST,$DB_USER,$DB_PSW,$DB_NAME);

	// Check connection
	if (!$conn) 
	  {
	    die("Connection failed: " . mysqli_connect_error());
	   }
	  else
	  {
	    return $conn;
	  }
}

function queryToDb($query)
   {
   	 $connection = openDbConnection();
   	 $result = mysqli_query($connection,$query);
   	 mysqli_close($connection);
   	 return $result;
   }

 ?>