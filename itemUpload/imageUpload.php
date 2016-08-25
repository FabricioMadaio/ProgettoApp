<?php
	/**
	* Image resize
	* @param int $width
	* @param int $height
	*/
	function resize($width, $height){

		/* Get original image x y*/
		list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
		
		/* calculate new image size with ratio */
		$ratio = max($width/$w, $height/$h);
		$h = ceil($height / $ratio);
		$x = ($w - $width / $ratio) / 2;
		$w = ceil($width / $ratio);

		/* file upload folder*/
		$root = "/membri/companyinventory";
		$path = $root.'/uploads/';

		/* new random file name */
		while (true) {
			$filename = uniqid('image', true);
			$search = glob($path.$filename);
			if (!$search || count($search)<=0) break;
		}
		$path = $path.$filename;

		/* read binary data from image file */
		$imgString = file_get_contents($_FILES['image']['tmp_name']);
		
		/* create image from string */
		$image = imagecreatefromstring($imgString);
		$tmp = imagecreatetruecolor($width, $height);
		
		/* crop and resize image*/
		imagecopyresampled(	$tmp, $image,
							0, 0,
							$x, 0,
							$width, $height,
							$w, $h);
		
		/* Save image */
		switch ($_FILES['image']['type']) {
			case 'image/jpeg':
				imagejpeg($tmp, $path.".jpeg", 100);
			break;
			case 'image/png':
				imagepng($tmp, $path.".png", 0);
			break;
			case 'image/gif':
				imagegif($tmp, $path.".gif");
			break;
			default:
				exit;
			break;
		}
		
		/* cleanup memory */
		imagedestroy($image);
		imagedestroy($tmp);
		
		return $path;
	}
?>