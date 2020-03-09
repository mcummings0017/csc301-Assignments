<?php
$title='Signup';
require_once('auth_functions.php');
if(is_logged('user/uID')) {
	header('location: index.php');
}

if(count($_POST)>0){
	$error=signup('data/users.csv.php','signin.php');
	if(isset($error{0})) echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	else echo '<div class="alert alert-success" role="alert">You made it!!!!!!!!!!!</div>';
}

require_once('header.php');

?>

<form action="signup.php" method="POST">
	E-mail
	<input type="email" name="email" required /><br />
	Password
	<input type="password" name="password" minlength="8" required /><br />
	<button type="submit">Ceate account</button>
</form>
<?php require_once('footer.php'); ?>