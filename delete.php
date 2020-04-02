<?php
require_once('settings.php');
require_once($root.'/func/JSONutility.php');
$filename='data/data.json';
if(!empty($_POST["id"])) {
	deleteJSON($filename,$_POST["id"]);
	echo "Listing ".$_POST["name"]." was deleted!";
	echo "<br />";
	die('Listing Deleted!  Go back to the <a href="index.php">Home page</a>');
}
if (!isset($_GET['id'])){
	die('No id: Please provide a valid id number!  Go back to the <a href="index.php">Home page</a>');
}
$id=$_GET['id'];
$listings=jsonToArray($filename);

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id']>=count($listings)){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
	
}
?>

<!doctype html>
<html lang="en">
  <head>
  <title>Delete Listing</title>
  </head>
  <body>
		
		<form action="delete.php" method="post">
		<p><h1 for="name">Are you sure you want to delete the listing? </h1> </p>
		<input type="hidden" name="id" value="<?= $id ?>">
		<input type="hidden" name="name" value="<?= $listings[$_GET['id']]['name'] ?>">
		<div class="container">
			<h1><?= $listings[$_GET['id']]['name'] ?></h1>
			<img src="<?= $listings[$_GET['id']]['picture'] ?>" style="max-width:500px" />
			<p><span class="badge badge-dark">Address:</span> <?= $listings[$_GET['id']]['address'] ?></p>
			<p><span class="badge badge-dark">Price:</span> <?= $listings[$_GET['id']]['price'] ?></p>
			<p><span class="badge badge-dark">Description:</span> <span><?= $listings[$_GET['id']]['description'] ?></span></p>
		</div>
		<input type="submit" value="Delete">
		</form>
  
  
  </body>
 
</html>