<?php
require_once(ROOT.'/func/DB.php');

class User {
	public $ID;
	public $email;
	public $password;
	public $name;
	public $accounttype;
	
	function __construct($record=null, $id=null) {
		if($record==null && $id==null) {
			return;
		}
		if(isset($id)) {
			$record=DB::DB_getUser($id);
			$record=$record->fetch();
		}
		$this->ID=$record['ID'];
		$this->email=$record['email'];
		$this->password=$record['password'];
		$this->accounttype=$record['accounttype'];
		$this->name=$record['name'];
	}
	
	public function createUser() {
		//require_once('../func/DB.php');
		$pdo=DB::db_connect();
		$q=$pdo->prepare('INSERT INTO users(name,email,password,accounttype) VALUES(?,?,?,?)');
		$q->execute([$this->name, $this->email, $this->password, $this->accounttype]);
		$pdo=null;
	}
	
	public function modifyUser() {
		//require_once('../func/DB.php');
		$pdo=DB::db_connect();
		$q=$pdo->prepare('UPDATE users SET email=?,password=?,name=?,accounttype=? WHERE ID=?');
		$q->execute([$this->email, $this->password, $this->name, $this->accounttype, $this->ID]);
		$pdo=null;
	}
}
?>