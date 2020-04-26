<?php
$title='Signup';
require_once('../settings.php');
require_once($root.'/auth/auth_functions.php');
if(Auth::is_logged('user/uID')) {
	header('location: '.$http_root.'index.php');
}

if(count($_POST)>0){
	$error=Auth::signup($root.'/data/users.csv.php','signin.php');
	if(isset($error{0})) echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	else echo '<div class="alert alert-success" role="alert">You made it!!!!!!!!!!!</div>';
}

require_once($root.'/main/header.php');
require_once(ROOT.'/main/nav.php');
?>

<form action="auth/signup.php" method="POST">
	Name
	<input type="name" name="name" /><br />
	E-mail
	<input type="email" name="email" required /><br />
	Password
	<input type="password" name="password" minlength="8" required /><br />
	<button type="submit">Ceate account</button>
</form>
<?php require_once($root.'/main/footer.php'); ?>