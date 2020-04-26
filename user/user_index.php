<?php
require_once('../settings.php');
require_once(ROOT.'/func/DB.php');
require_once(ROOT.'/auth/auth_functions.php');
if(!Auth::is_logged('user/uID')) {
	header('location: '.ROOT.'/signin.php');
}

$title="My Listings";
$user=Auth::getUser();
$newListings=DB::DB_getUserListings($user->ID);

require_once(ROOT.'/main/header.php');
require_once(ROOT.'/main/nav.php');
echo '<a class="nav-link" href="'.HTTP_ROOT.'auth/private.php" padding-right: 30px;>Private Page</a>';
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
				<p><a href="'.HTTP_ROOT.'detail.php?id='.$newListings[$i]->ID.'">Details</a>
				<a href="'.HTTP_ROOT.'user/edit.php?id='.$newListings[$i]->ID.'">Edit</a>
				<a href="'.HTTP_ROOT.'user/delete.php?id='.$newListings[$i]->ID.'">Delete</a></p>
			  </div>
			</div>';
		}
		echo '</div>';
		echo '</ul>';

		?>
	</div>
<?php
require_once(ROOT.'/main/footer.php');
?>