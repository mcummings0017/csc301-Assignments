<?php
if(!isset($_GET['id'])){
	die('No id: Please provide a valid id number!  Go back to the <a href="index.php">Home page</a>');
}

require_once('settings.php');
require_once($root.'/func/DB.php');

//$newListings=getArrayOfListings($root.'/data/data.json');
$record=DB::DB_getListing($_GET['id']);
$title='Details';
require_once($root.'/main/header.php');
require_once($root.'/main/nav.php');

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $record->rowCount()==0){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
	
}

$listing=DB::DB_createListing($record);
?>
	<div class="container">
		<h1><?= $listing->name ?></h1>
		<img src="<?= $listing->picture ?>" style="max-width:500px" />
		<p><span class="badge badge-dark">Type:</span> <?= $listing->type ?></p>
		<p><span class="badge badge-dark">Address:</span> <?= $listing->address ?></p>
		<p><span class="badge badge-dark">Price:</span> <?= $listing->price ?></p>
		<p><span class="badge badge-dark">Description:</span> <span><?= $listing->description ?></span></p>
	</div>
	<div class="container">
	</div>
<?php
require_once($root.'/main/footer.php');
?>

