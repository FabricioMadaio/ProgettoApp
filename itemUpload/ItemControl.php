
<!-- CONTROLLER MODULE -->
<?php
	
	/*init model*/
	include 'initItem.php';
	
	/*file upload*/
	include 'imageUpload.php';
	// settings
	$max_file_size = 1024*200; // 200kb
	$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
	// thumbnail sizes
	$sizes = array(100 => 100, 150 => 150, 250 => 250);
	
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

			} else {
			  $msg = 'Unsupported file';
			}
		  } else{
			$msg = 'Please upload image smaller than 200KB';
		  }
	  }
	  
	}
	
	include "itemView.php";
?>