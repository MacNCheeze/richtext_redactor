<?php
 
$root = Symphony::Configuration()->get('filepath','redactor');
General::realiseDirectory($root);
 
$tmpname = $_FILES['file']['name'];
$tmpfile = $_FILES['file']['tmp_name'];
$extension = substr($tmpname, strrpos($tmpname,'.'));

$filename = md5(date('YmdHis')) . $extension;
$file = $root . '/' . $filename;
copy($tmpfile, $file);

$array = array(
    'filename' => $tmpname,
	'filelink' => URL . '/symphony/extension/richtext_redactor/getfile/?name=' . $filename
);
	
echo stripslashes(json_encode($array));    

die();
 
?>