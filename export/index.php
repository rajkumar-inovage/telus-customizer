<?php
error_reporting(E_ALL);
if (!extension_loaded('zip')) {
    dl('zip.so');
}

$mail_content = file_get_contents($_POST['mail']);

preg_match_all('/<img[^>]+>/i',$mail_content, $result); 

$source = explode('?', $_POST['mail']);

$files = array('index.html'=> isset($source[1])?$source[0].'index.php?'.$source[1]:$source[0].'index.php');

foreach( $result[0] as $i => $img_tag){
    $doc = new DOMDocument();
	$doc->loadHTML($img_tag);
	$xpath = new DOMXPath($doc);
	$image = $xpath->evaluate("string(//img/@src)");
	if(strpos($image, "http") > -1){
		$name = substr($image, strrpos($image, "/")+1);
		$files[$name] = $image;
	}else{
		$files[$image] = $source[0].$image;
	}
}

$zipname = time().'.zip';
$zip = new ZipArchive();
if ($zip->open($zipname, ZIPARCHIVE::CREATE)) {
	foreach ($files as $name => $file) {
		if($name == 'index.html'){
			$dom = new DOMDocument();
			@$dom->loadHTML(file_get_contents($file));
			$images = $dom->getElementsByTagName('img');
			foreach ($images as $image) {
				$old_src = $image->getAttribute('src');
				$srcExplode = explode('/', $old_src);
				$new_src = array_pop($srcExplode);
				$image->setAttribute('src', $new_src);
			}
			$file = $dom->saveHTML();
			$zip->addFromString($name, $file);
		}else{
			$zip->addFromString($name, file_get_contents($file));
		}
	}
}
if ($zip->status == 0){
	header('Content-Type: application/json');
	echo json_encode(
		array(
			'status' => true,
			'fileName' => $zipname,
			'filesCount' => $zip->numFiles
		)
	);
	$zip->close();
	unset($zip);
}