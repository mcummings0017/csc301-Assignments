<?php
class Listing {
	public $ID;
	public $name;
	public $type;
	public $address;
	public $picture;
	public $price;
	public $description;
	
	
	
	public function createListing() {
		require_once('func/DB.php');
		$pdo=DB::db_connect();
		$q=$pdo->prepare('INSERT INTO listings(name,type,address,picture,price,description) VALUES(?,?,?,?,?,?)');
		$q->execute([$this->name, $this->type, $this->address, $this->picture, $this->price, $this->description]);
		$pdo=null;
	}
	
	public function modifyListing() {
		require_once('func/DB.php');
		$pdo=DB::db_connect();
		$q=$pdo->prepare('UPDATE listings SET name=?,type=?,address=?,picture=?,price=?,description=? WHERE ID=?');
		$q->execute([$this->name, $this->type, $this->address, $this->picture, $this->price, $this->description, $this->ID]);
		$pdo=null;
	}
}
?>