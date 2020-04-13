<?php
require_once('../settings.php');
require_once($root.'/func/DB.php');
require_once($root.'/auth/auth_functions.php');

if(!Auth::is_logged('user/uID')) {
	header('location: signin.php');
}

$user = Auth::getUser();
if($user->accounttype != "admin") {
	header('location: private.php');
}

$title="Admin Index";
$newListings=DB::DB_getArrayOfListings2();

require_once($root.'/main/header.php');
?>
   <div class="container">
		<h1>All Listings</h1>
		<?php
		echo '<ul class="list-group list-group-flush"';
		echo '<div class="container">';	
		for($i=0;$i<count($newListings);$i++){
				echo '<div class="col-4 border border-dark bg-secondary text-white">
			  <img src="'.$newListings[$i]->picture.'" class="mr-3" alt="..." style="max-width:96px;max-height:96px">
			  <div class="media-body">
				<h5 class="mt-0">'.$newListings[$i]->name.'</h5>
				<p >Type: '.$newListings[$i]->type.'</p>
				<p >Price: '.$newListings[$i]->price.'</p>
				<p><a href="detail.php?id='.$newListings[$i]->ID.'">Details</a>
				<a href="edit.php?id='.$newListings[$i]->ID.'">Edit</a>
				<a href="delete.php?id='.$newListings[$i]->ID.'">Delete</a></p>
			  </div>
			</div>';
		}
		
		echo '</div>';
		echo '</ul>';

		?>
	</div>
<?php
require_once($root.'/main/footer.php');
?>