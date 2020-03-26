<?php
require_once('auth_functions.php');

if(Auth::is_logged('user/uID')) {
	Auth::signout('index.php');
} else {
	header('location:signin.php');
}

require_once('header.php');
echo 'You just signed out';

require_once('footer.php');
?>