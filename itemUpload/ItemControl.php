<?php

	/*CONTROLLER MODULE*/
	
	include '../php/inputUtils.php';
	include '../php/DBConnection.php';

	include '../php/models/Image.php';
	include '../php/models/Item.php';
	
	
	/*file upload*/
	include 'imageUpload.php';
	
	/*init model*/
	$item = new Item("","","");
	$dbconn = new DBConnection();
	
	// settings
	$max_file_size = 1024*1024; // 1MB
	$valid_typs = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif');

	// thumbnail sizes
	$sizes = array(150 => 150);
	
	$response = '';
	
	try{
		/*open the connection*/
		$dbconn->open();
	
		/* manage post method */
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$response = "<li>- Inserire un nome</li>";
			} else {
				$item->name = testInput($_POST["name"]);
				// check if name only contains letters and whitespace
				if (!isAlphanumeric($item->name)) {
					$response = "<li>- Sono ammessi solo numeri e lettere per il nome</li>"; 
				}
				// check if product already exists
				if (!$item->nameAvailable($dbconn)) {
					$response = "<li>- Il nome inserito è gia stato usato</li>"; 
				}
			}
		  
			if (empty($_POST["description"])) {
				$item->description = "";
			} else {
				$item->description = testInput($_POST["description"]);
			}
		  
			if(isset($_FILES['image'])) {
				if( $_FILES['image']['size'] < $max_file_size ){
					
					// get file type
					$typ = $_FILES['image']['type'];

					
					if (in_array($typ, $valid_typs)) {
						/* resize image */
						foreach ($sizes as $w => $h) {
							$item->imageUrl = resize($w, $h);
						}
					} else {
					  $response .= '<li>- Immagine non supportata</li>';
					}
				} else{
				$response .= '<li>- Caricare una immagine con dimensioni inferiori a 200KB</li>';
				}
			}
		
			if(empty($response)){
				$response = $item->dbInsert(2,$dbconn);
			}
		}
		
		$dbconn->close();
		
	}catch (Exception $e) {
		$response = $e->getMessage();
	}
	
	if(empty($response)){
		$response = "<section class='infoBox'>Caricamento Completato!</section>";
		$response .= "<a class='myButton' onclick='javascript:toClientHome()'>Torna alla Home</a>";
	}else{
		$error = $response;
		$response ="<section class='infoBox' style='background:#f9d0d0;border-color:#f7a7a2;color:red;'>";
		$response .="<p id='errorResponse'>Errore</p><ul class='errorList'>".$error."</ul><br></section>";
	}
	
	echo $response;
	
?>