<?php
require_once('settings.php');
require_once($root.'/func/DB.php');
//$filename='data/data.json';
$id=$_GET['id'];
//$listings=jsonToArray($filename);
$record=DB::DB_getListing($id);

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $record->rowCount()==0){
	die('Invalid: go back to the <a href="index.php">Home page</a>');
}

if(is_numeric($id) && $id>=0) {
	if(!empty($_POST["name"])
		&& !empty($_POST["type"])
		&& !empty($_POST["address"])
		&& !empty($_POST["picture"])
		&& !empty($_POST["price"])
		&& !empty($_POST["description"])) {
			/*$data=array(
				"name"  => $_POST["name"],
				"address" => $_POST["address"],
				"picture" => $_POST["picture"],
				"price" => floatval($_POST["price"]),
				"description" => $_POST["description"]
			);
			modifyJSON($filename,$id,$data);
			*/
			require_once($root.'/class/Listing.php');
			$newListing=new Listing();
			$newListing->ID=$id;
			$newListing->name=$_POST["name"];
			$newListing->type=$_POST["type"];
			$newListing->address=$_POST["address"];
			$newListing->picture=$_POST["picture"];
			$newListing->price=floatval($_POST["price"]);
			$newListing->description=$_POST["description"];
			
			$newListing->modifyListing();
			
			//echo "Listing updated for ".$_POST["name"];
			die("Listing updated for ".$_POST["name"].'!  Go back to the <a href="index.php">Home page</a>');
	} else {
		echo "Please fill out all information below!";
	}
}

require_once($root.'/class/Listing.php');
$record=$record->fetch();
$listing=new Listing($record);

function checkType($type) {
	print_r($listing->type);
	if($listing->type==$type) {
		return true;
	}
	return false;
}


?>
<!doctype html>
<html lang="en">
  <head>
  <title>Edit Listing</title>
  </head>
  <body>
		
		<form action="<?= 'edit.php?id='.$id ?>" method="post">
		<p><label for="name">Name: </label>
		<input type="text" name="name" id="inputName" value="<?= $listing->name ?>" required>
		</p>
		 <p><label for="type">Type: </label>
		  <select name="type" id="inputType" required>
			<option value="Car" <?=$listing->type == 'Car' ? ' selected="selected"' : '';?>>Car</option>
			<option value="Truck" <?=$listing->type == 'Truck' ? ' selected="selected"' : '';?>>Truck</option>
			<option value="SUV" <?=$listing->type == 'SUV' ? ' selected="selected"' : '';?>>SUV</option>
			<option value="Sport" <?=$listing->type == 'Sport' ? ' selected="selected"' : '';?>>Sport</option>
		  </select>
		</p>
		<p><label for="address">Address: </label>
		<input type="text" name="address" id="inputAddress" value="<?= $listing->address ?>" required>
		</p>
		<p><label for="picture">Picture: </label>
		<input type="text" name="picture" id="inputPicture" value="<?= $listing->picture ?>" readonly>
		</p>
		<p><label for="price">Price: </label>
		<input type="number" name="price" id="inputPrice" value="<?= $listing->price ?>" required>
		</p>
		<p><label for="description">Description: </label>
		<input type="text" name="description" id="inputDescription" value="<?= $listing->description ?>" required>
		</p>
		<input type="submit" value="Submit">
		<input type="reset" value="Reset">
		</form>
  
  
  
  </body>
 
</html>