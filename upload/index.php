<?php
// extract post data
extract($_POST);
// define constants
$dir = __DIR__;
$origin = $_SERVER['HTTP_ORIGIN'];
$uri = $_SERVER['REQUEST_URI'];
// file URL & Path
$fileURL = "$origin$uri"."logos/$fileName";
$filePath = "$dir/logos/$fileName";

// file data
list($type, $data) = explode(';', $logo);
list(, $imgData)      = explode(',', $data);
$imgContent = base64_decode($imgData);
// file put with response
if(file_put_contents($filePath, $imgContent) > 0) {
	header('Content-Type: application/json');
	echo json_encode(
		array(
			'status' => true,
			'fileURL' => $fileURL,
		)
	);
} else {
	header('Content-Type: application/json');
	echo json_encode(
		array(
			'status' => false,
			'message' => 'File Uploading Failed',
		)
	);
}