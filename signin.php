<?php

if(count($_POST)>0) {
	if(!isset($_POST['email']{0}) || !isset($_POST['password']{0})) die('You need to enter a valid email
	and password');
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) die('Please enter a valid emial address');
	$_POST['email']=strtolower($_POST['email']);
	
	$_POST['password']=trim($_POST['password']);
	if(strlen($_POST['password'])<8) die('Please, enter a password that is at least 8 characters long.');
	
	if(!file_exists('database.csv')) {
		$h=fopen('database.csv','w');
		fwrite($h,'');
		fclose($h);
	}
	$h=fopen('database.csv','r');
	while(!feof($h)) {
		$line=fgets($h);
		if(strstr($line, $_POST['email'])) {
			$line=explode(';',$line);
			if(!password_verify($_POST['password'],trim($line[1]))) {
				die('The password you entered is not correct');
			} else {
				session_start();
				$_SESSION["email"]=$line[0];
				echo $_SESSION["email"];
				include("index.php");
				die();
			}
			echo die('Welcome to our website.');
		}
	}
	fclose($h);
}

?>


<form action="signin.php" method="POST">
	E-mail
	<input type="email" name="email" required /><br />
	Password
	<input type="password" name="password" required /><br />
	<button type="submit">Sign In</button>

</form>