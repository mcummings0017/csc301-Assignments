<?php
class Listing {
	public $ID;
	public $user_ID;
	public $name;
	public $type;
	public $address;
	public $picture;
	public $price;
	public $description;
	
	function __construct($record=null, $id=null) {
		if($record==null && $id==null) {
			return;
		}
		if(isset($id)) {
			$record=DB::DB_getListing($id);
			$record=$record->fetch();
		}
		$this->ID=$record['ID'];
		$this->user_ID=$record['user_ID'];
		$this->name=$record['name'];
		$this->type=$record['type'];
		$this->address=$record['address'];
		$this->picture=$record['picture'];
		$this->price=$record['price'];
		$this->description=$record['description'];
	}
	
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