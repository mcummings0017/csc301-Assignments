<?php
session_start();
$email=$_SESSION["email"];
session_unset();
session_destroy();
die($email.' Successfully signed out!  Go back to the <a href="index.php">Home page</a>');
?>