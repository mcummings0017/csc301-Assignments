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

$id=$_GET['id'];
$record=DB::DB_getUser($id);

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $record->rowCount()==0){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
}

$record=$record->fetch();
$newUser=new User($record);

if(is_numeric($id) && $id>=0) {
	if(!empty($_POST["email"])
		&& !empty($_POST["name"])
		&& !empty($_POST["accounttype"])) {
			$error=Auth::validateEmail();
			if(isset($error{0})) {
				echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
			} else {
				require_once(ROOT.'/class/User.php');
				$newUser->ID=$id;
				$newUser->email=$_POST["email"];
				$newUser->accounttype=$_POST["accounttype"];
				$newUser->name=$_POST["name"];
				
				$newUser->modifyUser();
				
				//echo "Listing updated for ".$_POST["name"];
				die("User updated for ".$_POST["name"].'!  Go back to the <a href="admin_page.php">Admin Page</a>');
			}
	} else {
		echo "Please fill out all information below!";
	}
}

?>
<!doctype html>
<html lang="en">
  <head>
  <title>Edit User</title>
  </head>
  <body>
		
		<form action="<?= 'admin_edit_user.php?id='.$id ?>" method="post">
		<p><label for="name">Name: </label>
		<input type="text" name="name" id="inputName" value="<?= $newUser->name ?>" required>
		</p>
		<p><label for="email">Email: </label>
		<input type="text" name="email" id="inputEmail" value="<?= $newUser->email ?>" required>
		</p>
		<p><label for="accounttype">Account Type: </label>
		<input type="text" name="accounttype" id="inputAccountType" value="<?= $newUser->accounttype ?>" required>
		</p>
		<input type="submit" value="Submit">
		<input type="reset" value="Reset">
		</form>
  
  
  
  </body>
 
</html>