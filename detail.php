<?php
if(!isset($_GET['id'])){
	die('No id: Please provide a valid id number!  Go back to the <a href="index.php">Home page</a>');
}

require_once('functions.php');
//$listings=jsonToArray('data.json');
$newListings=getArrayOfListings('data.json');
$title='Details';
require_once('header.php');
require_once('nav.php');

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id']>=count($newListings)){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
	
}
?>
	<div class="container">
		<h1><?= $newListings[$_GET['id']]->name ?></h1>
		<img src="<?= $newListings[$_GET['id']]->picture ?>" style="max-width:500px" />
		<p><span class="badge badge-dark">Address:</span> <?= $newListings[$_GET['id']]->address ?></p>
		<p><span class="badge badge-dark">Price:</span> <?= $newListings[$_GET['id']]->price ?></p>
		<p><span class="badge badge-dark">Description:</span> <span><?= $newListings[$_GET['id']]->description ?></span></p>
	</div>
	<div class="container">
	</div>
<?php
require_once('footer.php');
?>

