<?php
require_once('../settings.php');
require_once(ROOT.'/func/DB.php');
$title="Admin Users Page";

require_once(ROOT.'/auth/auth_functions.php');

if(!Auth::is_logged('user/uID')) {
	header('location: '.HTTP_ROOT.'auth/signin.php');
}

$user = Auth::getUser();
if($user->accounttype != "admin") {
	header('location: '.HTTP_ROOT.'auth/private.php');
}

require_once(ROOT.'/class/User.php');
$pdo=DB::db_connect();
$result=$pdo->query('SELECT * FROM users');

$newUsers=array();
while($record=$result->fetch()) {
	$user=new User();
	$user->ID=$record['ID'];
	$user->name=$record['name'];
	$user->email=$record['email'];
	$user->accounttype=$record['accounttype'];
	array_push($newUsers, $user);
}

require_once(ROOT.'/main/header.php');
require_once(ROOT.'/main/nav.php');
echo '<a class="nav-link" href="'.HTTP_ROOT.'admin/admin_page.php" padding-right: 30px;>Admin Page</a>';
?>
   <div class="container">
		<h1>All Users</h1>
		<?php
		echo '<ul class="list-group list-group-flush"';
		echo '<div class="container">';	
		for($i=0;$i<count($newUsers);$i++){
				echo '<div class="col-4 border border-dark bg-secondary text-white">
			  <div class="media-body">
				<p >ID: '.$newUsers[$i]->ID.'</p>
				<p >Name: '.$newUsers[$i]->name.'</p>
				<p >Email: '.$newUsers[$i]->email.'</p>
				<p >Account Type: '.$newUsers[$i]->accounttype.'</p>
				<a href="admin/admin_edit_user.php?id='.$newUsers[$i]->ID.'">Edit</a>
				<a href="admin/admin_delete_user.php?id='.$newUsers[$i]->ID.'">Delete</a></p>
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