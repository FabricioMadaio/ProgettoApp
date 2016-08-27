<?php
 //defiene data to coonect to the database
function openDbConnection()
{
	define('DB_USER', 'root');
	define('DB_PSW', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'my_companyinventory');

	 static $conn;

	 $conn = mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

	// Check connection
	if (!$conn) 
	  {
	    die("Connection failed: " . mysqli_connect_error());
	   }
	  else
	  {
	    echo "connection ok";
	    return conn;
	  }
}

function queryToDb($query)
   {
   	 $connection = opnenDbConnection();
   	 $result = mysqli_query($connection,$query);
   	 return result;
   }

 ?>