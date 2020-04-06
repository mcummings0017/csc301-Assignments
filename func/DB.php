<?php
class DB {
	public static function db_connect() {
		//Settings for db connection
		$settings=[
			'host'=>'localhost',
			'db'=>'cmlist',
			'user'=>'root',
			'pass'=>''
		];

		//Create db connection options 
		$opt=[
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES=>false
		];

		//Connect to the database
		return new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4', 
			$settings['user'], $settings['pass'], $opt);
	}

	public static function getUserRow($email) {
		$pdo=DB::db_connect();
		$r=$pdo->query('SELECT * FROM users WHERE email="'.$email.'"');
		$pdo=null;
		return $r;
	}
	
	public static function DB_ToArray($filename) {
	$json_string=file_get_contents($filename);
	$array=json_decode($json_string, true);
	return $array;
	}

	public static function DB_read($filename) {
		$handle=fopen($filename,'r');
		$temp='';
		while(!feof($handle)) $temp.=fgets($handle);
		fclose($handle);
		return $temp;
	}

	public static function DB_getArrayOfListings() {
		require_once('class/Listing.php');
		$pdo=DB::db_connect();
		$result=$pdo->query('SELECT * FROM listings');
		
		$newArray=array();
		while($record=$result->fetch()) {
			$listing=new Listing();
			$listing->ID=$record['ID'];
			$listing->name=$record['name'];
			$listing->type=$record['type'];
			$listing->address=$record['address'];
			$listing->picture=$record['picture'];
			$listing->price=$record['price'];
			$listing->description=$record['description'];
			array_push($newArray, $listing);
		}
		
		return $newArray;
	}
	
	public static function DB_getListing($id) {
		require_once('class/Listing.php');
		$pdo=DB::db_connect();
		$record=$pdo->query('SELECT * FROM listings WHERE ID='.$id);
		
		return $record;
	}
	
	public static function DB_createListing($record) {
		$record=$record->fetch();
		$listing=new Listing();
		$listing->ID=$record['ID'];
		$listing->name=$record['name'];
		$listing->type=$record['type'];
		$listing->address=$record['address'];
		$listing->picture=$record['picture'];
		$listing->price=$record['price'];
		$listing->description=$record['description'];
		return $listing;
	}
	
	public static function DB_deleteListing($id) {
		$pdo=DB::db_connect();
		$pdo->query('DELETE FROM listings WHERE ID='.$id);
		$pdo=null;
	}
	
	/*
	//Execute a query and retrieve information from the database
	$result=$pdo->query('SELECT * FROM users');

	//Print number of rows in query
	echo $result->rowCount();

	//Print results
	echo '<pre>';
	while($record=$result->fetch()){
		print_r($record);
		echo '<hr>';
	}

	//INSERT into db
	//$pdo->query('INSERT INTO users(email,accounttype) VALUES("u@u.com", "user")');
	//echo $pdo->lastInsertId();

	//MODIFY
	//$pdo->query('UPDATE users SET email="p@p.com" WHERE ID=1');

	//DELETE
	//$pdo->query('DELETE FROM users WHERE ID=1');

	*/
}
?>