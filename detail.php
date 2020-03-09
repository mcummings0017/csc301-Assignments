<?php
if(!isset($_GET['id'])){
	die('No id: Please provide a valid id number!  Go back to the <a href="index.php">Home page</a>');
}

require_once('functions.php');
$listings=jsonToArray('data.json');
$title='Details';
require_once('header.php');
require_once('nav.php');

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id']>=count($listings)){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
	
}
?>
	<div class="container">
		<h1><?= $listings[$_GET['id']]['name'] ?></h1>
		<img src="<?= $listings[$_GET['id']]['picture'] ?>" style="max-width:500px" />
		<p><span class="badge badge-dark">Address:</span> <?= $listings[$_GET['id']]['address'] ?></p>
		<p><span class="badge badge-dark">Price:</span> <?= $listings[$_GET['id']]['price'] ?></p>
		<p><span class="badge badge-dark">Description:</span> <span><?= $listings[$_GET['id']]['description'] ?></span></p>
	</div>
	<div class="container">
	</div>
<?php
require_once('footer.php');
?>

