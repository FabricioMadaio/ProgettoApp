<?php

	/*CONTROLLER MODULE*/

	/*init model*/
	include 'Item.php';
	
	/*file upload*/
	include 'imageUpload.php';
	// settings
	$max_file_size = 1024*1024; // 1MB
	$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
	// thumbnail sizes
	$sizes = array(150 => 150);
	$msg = '';
	
	/* manage post method */

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["name"])) {
		$item->name = "Name is required";
	  } else {
		$item->name = test_input($_POST["name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		  $nameErr = "Only letters and white space allowed"; 
		}
	  }
	  
	  if (empty($_POST["description"])) {
		$item->description = "description is required";
	  } else {
		$item->description = test_input($_POST["description"]);
	  }
	  
	  if(isset($_FILES['image'])) {
			if( $_FILES['image']['size'] < $max_file_size ){
			// get file extension
			$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
			
			if (in_array($ext, $valid_exts)) {
			  /* resize image */
			  foreach ($sizes as $w => $h) {
				$files[] = resize($w, $h);
			  }
			  $msg = 'caricamento completato';

			} else {
			  $msg = 'Unsupported file';
			}
		  } else{
			$msg = 'Please upload image smaller than 200KB';
		  }
	  }
	  echo $msg;
	}
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	function check_username($username)
	{
		$conn = openDbConnection();
		$query ="SELECT username FROM utenti";
		$result = queryToDb($query);
		if(mysqli_num_rows($result) > 0)
        {
        	if (mysqli_num_rows($result) > 0) {
   		    // output data of each row
    	    while($row = mysqli_fetch_assoc($result)) {
            if($row["username"] == $username)
            {
               return true;
            } 
             return false;			
            }
	      }
        }
    }
?>