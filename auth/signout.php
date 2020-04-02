<?php
require_once('../settings.php');
require_once($root.'/auth/auth_functions.php');

if(Auth::is_logged('user/uID')) {
	Auth::signout($http_root.'index.php');
} else {
	header('location:signin.php');
}

require_once($root.'/auth/header.php');
echo 'You just signed out';

require_once($root.'/auth/footer.php');
?>