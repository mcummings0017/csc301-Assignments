<?php
$title="Admin Page";
require_once('../settings.php');
require_once(ROOT.'/auth/auth_functions.php');
if(!Auth::is_logged('user/uID')) {
	header('location: '.HTTP_ROOT.'auth/signin.php');
}

$user = Auth::getUser();
if($user->accounttype != "admin") {
	header('location: '.HTTP_ROOT.'auth/private.php');
}

require_once(ROOT.'/main/header.php');

//echo '<button onclick="document.location.href=\'auth/admin_index.php\'">Listing Page</button>';
//echo '<br />';
echo '<button onclick="document.location.href=\''.HTTP_ROOT.'admin/admin_create_user.php\'">Create User Page</button>';
echo '<br />';
echo '<button onclick="document.location.href=\''.HTTP_ROOT.'admin/admin_users.php\'">Edit Users Page</button>';
echo '<br />';
echo '<button onclick="document.location.href=\''.HTTP_ROOT.'admin/admin_index.php\'">Edit Listings Page</button>';
echo '<br />';
echo '<a class="nav-link" href="index.php" padding-right: 30px;>Home Page</a>';

require_once(ROOT.'/main/footer.php');
?>