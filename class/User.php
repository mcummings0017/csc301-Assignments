<?php
class User {
	public $ID;
	public $email;
	public $password;
	public $name;
	public $accounttype;
	
	public function __construct($email, $password, $accounttype="user", $name="temp") {
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
}
?>