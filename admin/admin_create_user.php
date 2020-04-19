<?php
$title='Admin Create User';
require_once('../settings.php');
require_once(ROOT.'/auth/auth_functions.php');

$user = Auth::getUser();
if($user->accounttype != "admin") {
	header('location: '.HTTP_ROOT.'auth/private.php');
}

if(count($_POST)>0){
	$error=Auth::signup('old json','admin_page.php');
	if(isset($error{0})) echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	else echo '<div class="alert alert-success" role="alert">You made it!!!!!!!!!!!</div>';
}

require_once(ROOT.'/main/header.php');

?>

<form action="admin/admin_create_user.php" method="POST">
	Name
	<input type="name" name="name" /><br />
	E-mail
	<input type="email" name="email" required /><br />
	Password
	<input type="password" name="password" minlength="8" required /><br />
	<button type="submit">Ceate account</button>
</form>
<?php require_once(ROOT.'/main/footer.php'); ?>