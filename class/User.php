<?php
class User {
	public $email;
	public $accountType;
	
	public function __construct($email, $accountType) {
		$this->email=$email;
		$this->accountType=$accountType;
	}
}
?>