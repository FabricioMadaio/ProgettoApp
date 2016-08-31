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
			$filename = uniqid('', false);
			$search = glob($path.$filename);
			if (!$search || count($search)<=0) break;
		}

		/* read binary data from image file */
		$imgString = file_get_contents($_FILES['image']['tmp_name']);
		
		/* create image from string */
		$image = imagecreatefromstring($imgString);
		$tmp = imagecreatetruecolor($width, $height);
				$tmp = $image;
		/* crop and resize image*/
		imagecopyresampled(	$tmp, $image,
							0, 0,
							$x, 0,
							$width, $height,
							$w, $h);
		
		/* Save image */
		switch ($_FILES['image']['type']) {
			case 'image/jpeg':
				$filename.=".jpeg";
				imagejpeg($tmp, $path.$filename, 100);
			break;
			case 'image/jpg':
				$filename.=".jpg";
				imagejpeg($tmp, $path.$filename, 100);
			break;
			case 'image/png':
				$filename.=".png";
				imagepng($tmp, $path.$filename, 0);
			break;
			case 'image/gif':
				$filename.=".gif";
				imagegif($tmp, $path.$filename);
			break;
			default:
				exit;
			break;
		}
		
		/* cleanup memory */
		imagedestroy($image);
		imagedestroy($tmp);
		
		return $filename;
	}
?>