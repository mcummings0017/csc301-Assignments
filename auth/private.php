<?php
$title="Private";
require_once('../settings.php');
require_once(ROOT.'/auth/auth_functions.php');
if(!Auth::is_logged('user/uID')) {
	header('location: signin.php');
}

require_once(ROOT.'/main/header.php');
require_once(ROOT.'/main/nav.php');
$user=Auth::getUser();
//redirect admin user to admin_page.php
if($user->accounttype == "admin" || $user->accounttype == "manager") {
	header('location: '.HTTP_ROOT.'admin/admin_page.php');
}
echo $user->ID.' '.$user->name.' '.$user->email.' '.$user->accounttype;

echo '<br />';
echo '<button onclick="document.location.href=\''.HTTP_ROOT.'user/user_index.php\'">My Listings Page</button>';
echo '<br />';
echo '<a class="nav-link" href="index.php" padding-right: 30px;>Home Page</a>';

require_once(ROOT.'/main/footer.php');
?>