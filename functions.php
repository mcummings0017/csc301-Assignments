<?php
function jsonToArray($filename) {
	$json_string=file_get_contents($filename);
	$array=json_decode($json_string, true);
	return $array;
}

function read($filename) {
	$handle=fopen($filename,'r');
	$temp='';
	while(!feof($handle)) $temp.=fgets($handle);
	fclose($handle);
	return $temp;
}

require_once('class/Listing.php');

function getArrayOfListings($filename) {
	$array=jsonToArray($filename);
	$newArray=array();

	for($i=0;$i<count($array);$i++){
		$listing=new Listing();
		$listing->name=$array[$i]['name'];
		$listing->address=$array[$i]['address'];
		$listing->picture=$array[$i]['picture'];
		$listing->price=$array[$i]['price'];
		$listing->description=$array[$i]['description'];
		array_push($newArray, $listing);
	}
	return $newArray;
}
?>