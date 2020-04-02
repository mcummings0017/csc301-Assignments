<?php
require_once('settings.php');
require_once('func/functions.php');

$title="CM Home";
$newListings=getArrayOfListings('data/data.json');

require_once($root.'/main/header.php');
require_once($root.'/main/nav.php');
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
				<p >Price: '.$newListings[$i]->price.'</p>
				<p><a href="detail.php?id='.$i.'">Details</a>
				<a href="edit.php?id='.$i.'">Edit</a>
				<a href="delete.php?id='.$i.'">Delete</a></p>
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