<?php
$title="Private";
require_once('auth_functions.php');
if(!Auth::is_logged('user/uID')) {
	header('location: signin.php');
}

require_once('header.php');
//print_r($_SESSION['email']);
$user=Auth::getUser();
echo $user->email.' '.$user->accountType;

echo '<br />';
echo '<a class="nav-link" href="index.php" padding-right: 30px;>Home Page</a>';

require_once('footer.php');
?>