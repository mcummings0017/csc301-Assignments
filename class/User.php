<?php
class User {
	public $ID;
	public $email;
	public $password;
	public $name;
	public $accounttype;
	
	public function __construct($email="temp", $password="temp", $accounttype="user", $name="temp") {
		$this->email=$email;
		$this->password=$password;
		$this->accounttype=$accounttype;
		$this->name=$name;
	}
	
	public function createUser() {
		require_once('../func/DB.php');
		$pdo=DB::db_connect();
		$q=$pdo->prepare('INSERT INTO users(name,email,password,accounttype) VALUES(?,?,?,?)');
		$q->execute([$this->name, $this->email, $this->password, $this->accounttype]);
		$pdo=null;
	}
	
	public function modifyUser() {
		require_once('../func/DB.php');
		$pdo=DB::db_connect();
		$q=$pdo->prepare('UPDATE users SET email=?,password=?,name=?,accounttype=? WHERE ID=?');
		$q->execute([$this->email, $this->password, $this->name, $this->accounttype, $this->ID]);
		$pdo=null;
	}
}
?>