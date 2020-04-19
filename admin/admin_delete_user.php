<?php
require_once('../settings.php');
require_once(ROOT.'/func/DB.php');
require_once(ROOT.'/auth/auth_functions.php');

if(!Auth::is_logged('user/uID')) {
	header('location: '.HTTP_ROOT.'auth/signin.php');
}

$user = Auth::getUser();
if($user->accounttype != "admin") {
	header('location: '.HTTP_ROOT.'auth/private.php');
}

if(!empty($_POST["id"])) {
	DB::DB_deleteUser($_POST["id"]);
	echo "User ".$_POST["name"]." was deleted!";
	echo "<br />";
	die('Listing Deleted!  Go back to the <a href="admin_page.php">Admin Page</a>');
}

$id=$_GET['id'];
$record=DB::DB_getUser($id);

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $record->rowCount()==0){
	die('Invalid: go back to the <a href="admin_page.php">Admin page</a>');
}

$record=$record->fetch();
$newUser=new User($record);
$newUser->ID=$id;

if (!isset($_GET['id'])){
	die('No id: Please provide a valid id number!  Go back to the <a href="admin_page.php">Admin Page</a>');
}

?>

<!doctype html>
<html lang="en">
  <head>
  <title>Delete User</title>
  </head>
  <body>
		
		<form action="admin_delete_user.php" method="post">
		<p><h1 for="name">Are you sure you want to delete this user? </h1> </p>
		<input type="hidden" name="id" value="<?= $id ?>">
		<input type="hidden" name="name" value="<?= $newUser->name ?>">
		<div class="container">
			<p><span class="badge badge-dark">Name:<?= $newUser->name ?></p>
			<p><span class="badge badge-dark">ID:</span> <?= $newUser->ID ?></p>
			<p><span class="badge badge-dark">Email:</span> <?= $newUser->email ?></p>
			<p><span class="badge badge-dark">Account Type:</span> <?= $newUser->accounttype ?></p>
		</div>
		<input type="submit" value="Delete">
		</form>
  
  
  </body>
 
</html>