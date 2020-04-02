<?php
require_once('settings.php');
require_once($root.'/func/JSONutility.php');
$file = 'data/data.json';
if(!empty($_POST["name"]) 
	&& !empty($_POST["address"])
	&& !empty($_POST["picture"])
	&& !empty($_POST["price"])
	&& !empty($_POST["description"])) {
		$listings=jsonToArray($file);
		$data=array(
			"name"  => $_POST["name"],
			"address" => $_POST["address"],
			"picture" => $_POST["picture"],
			"price" => floatval($_POST["price"]),
			"description" => $_POST["description"]
		);
		array_push($listings, $data);
		writeAllJSON($file,$listings);
		
		die("Listing created for ".$_POST["name"].'!  Go back to the <a href="index.php">Home page</a>');
} else {
	echo "Please fill out all information below!";
}

?>
<!doctype html>
<html lang="en">
  <head>
  <title>Create Listing</title>
  </head>
  <body>
  <form action="create.php" method="post">
  <p><label for="name">Name: </label>
  <input type="text" name="name" id="inputName">
  </p>
  <p><label for="address">Address: </label>
  <input type="text" name="address" id="inputAddress">
  </p>
  <p><label for="picture">Picture: </label>
  <input type="text" name="picture" id="inputPicture" value="img/mustang.jpg" readonly>
  </p>
  <p><label for="price">Price: </label>
  <input type="number" name="price" id="inputPrice">
  </p>
  <p><label for="description">Description: </label>
  <input type="text" name="description" id="inputDescription">
  </p>
  <input type="submit" value="Submit">
  <input type="reset" value="Clear">
  </form>
  
  
  
  </body>
 
</html>