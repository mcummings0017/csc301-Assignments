<?php
$title='Signup';
require_once('../settings.php');
require_once($root.'/auth/auth_functions.php');
if(Auth::is_logged('user/uID')) {
	header('location: private.php');
}

if(count($_POST)>0){
	$error=Auth::signin($root.'/data/users.csv.php','user/uID','private.php');
	if(isset($error{0})) {
		echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	} else {
		echo '<div class="alert alert-success" role="alert">You made it!!!!!!!!!!!</div>';
	}
}

require_once($root.'/main/header.php');

?>

<title>Signin</title>

<form action="auth/signin.php" method="POST">
	E-mail
	<input type="email" name="email" required /><br />
	Password
	<input type="password" name="password" minlength="8" required /><br />
	<button type="submit">Sign In</button>

</form>
<?php require_once($root.'/main/footer.php'); ?>