<?php
	// get variables
	$imgfile = $_GET['image'];
	$cropStartX = $_GET['cropStartX'];
	$cropStartY = $_GET['cropStartY'];
	$cropW = $_GET['cropWidth'];
	$cropH = $_GET['cropHeight'];

	// Create two images
	$origimg = imagecreatefromjpeg($imgfile);
	$cropimg = imagecreatetruecolor($cropW,$cropH);

	// Get the original size
	list($width, $height) = getimagesize($imgfile);

	// Crop
	imagecopyresized($cropimg, $origimg, 0, 0, $cropStartX, $cropStartY, $width, $height, $width, $height);

	// force download nes image
	header("Content-type: image/jpeg");
	header('Content-Disposition: attachment; filename="'.$imgfile.'"');
	imagejpeg($cropimg);

	// destroy the images
	imagedestroy($cropimg);
	imagedestroy($origimg);
?>