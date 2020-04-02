<?php
require_once('settings.php');
require_once($root.'/func/JSONutility.php');
$filename='data/data.json';
$id=$_GET['id'];
$listings=jsonToArray($filename);

if(is_numeric($id) && $id>=0 && $id<count($listings)) {
	if(!empty($_POST["name"]) 
		&& !empty($_POST["address"])
		&& !empty($_POST["picture"])
		&& !empty($_POST["price"])
		&& !empty($_POST["description"])) {
			$data=array(
				"name"  => $_POST["name"],
				"address" => $_POST["address"],
				"picture" => $_POST["picture"],
				"price" => floatval($_POST["price"]),
				"description" => $_POST["description"]
			);
			modifyJSON($filename,$id,$data);
			
			//echo "Listing updated for ".$_POST["name"];
			die("Listing updated for ".$_POST["name"].'!  Go back to the <a href="index.php">Home page</a>');
	} else {
		echo "Please fill out all information below!";
	}
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
		<input type="text" name="name" id="inputName" value="<?= $listings[$id]['name'] ?>">
		</p>
		<p><label for="address">Address: </label>
		<input type="text" name="address" id="inputAddress" value="<?= $listings[$id]['address'] ?>">
		</p>
		<p><label for="picture">Picture: </label>
		<input type="text" name="picture" id="inputPicture" value="<?= $listings[$id]['picture'] ?>" readonly>
		</p>
		<p><label for="price">Price: </label>
		<input type="number" name="price" id="inputPrice" value="<?= $listings[$id]['price'] ?>">
		</p>
		<p><label for="description">Description: </label>
		<input type="text" name="description" id="inputDescription" value="<?= $listings[$id]['description'] ?>">
		</p>
		<input type="submit" value="Submit">
		<input type="reset" value="Clear">
		</form>
  
  
  
  </body>
 
</html>