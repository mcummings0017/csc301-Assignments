<?php
require_once('../settings.php');
require_once(ROOT.'/func/DB.php');
require_once(ROOT.'/auth/auth_functions.php');

if(!Auth::is_logged('user/uID')) {
	header('location: '.HTTP_ROOT.'auth/signin.php');
}

$user = Auth::getUser();
if($user->accounttype != "admin" && $user->accounttype != "manager") {
	header('location: '.HTTP_ROOT.'auth/private.php');
}

if(!empty($_POST["id"])) {
	DB::DB_deleteListing($_POST["id"]);
	echo "Listing ".$_POST["name"]." was deleted!";
	echo "<br />";
	die('Listing Deleted!  Go back to the <a href="'.HTTP_ROOT.'admin/admin_index.php">Home page</a>');
}

if (!isset($_GET['id'])){
	die('No id: Please provide a valid id number!  Go back to the <a href="'.HTTP_ROOT.'admin/admin_index.php">Home page</a>');
}

$id=$_GET['id'];

$record=DB::DB_getListing($id);

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $record->rowCount()==0){
	die('Invalid: go back to the <a href="'.HTTP_ROOT.'admin/admin_index.php">Home page</a>');
}

require_once(ROOT.'/class/Listing.php');
$record=$record->fetch();
$listing=new Listing($record);
?>

<!doctype html>
<html lang="en">
  <head>
  <title>Delete Listing</title>
  </head>
  <body>
		
		<form action="admin_delete_listing.php" method="post">
		<p><h1 for="name">Are you sure you want to delete the listing? </h1> </p>
		<input type="hidden" name="id" value="<?= $id ?>">
		<input type="hidden" name="name" value="<?= $listing->name ?>">
		<div class="container">
			<h1><?= $listing->name ?></h1>
			<img src="<?= HTTP_ROOT.$listing->picture ?>" style="max-width:500px" />
			<p><span class="badge badge-dark">Type:</span> <?= $listing->type ?></p>
			<p><span class="badge badge-dark">Address:</span> <?= $listing->address ?></p>
			<p><span class="badge badge-dark">Price:</span> <?= $listing->price ?></p>
			<p><span class="badge badge-dark">Description:</span> <span><?= $listing->description ?></span></p>
		</div>
		<input type="submit" value="Delete">
		</form>
  
  
  </body>
 
</html>