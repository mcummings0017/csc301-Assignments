<?php require_once($root.'/auth/auth_functions.php'); ?>
<!-- Image and text -->
<nav class="navbar navbar-expand navbar-light bg-danger text-white list-style-type-none">
  <a class="navbar-brand text-white" href="#">
    <img src="img/cmLogo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    CM's List
  </a>
	<div class="navbar-nav-scroll">
	  <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
		<li class="nav-item">
			<a class="nav-link" href="index.php" padding-right: 30px;>Home page</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="create.php" padding-right: 30px;>Create New Listing</a>
		</li>
		<?php 
			if (Auth::is_logged('user/uID')) {
				echo '<li class="nav-item">
						  <a class="nav-link" href="auth/signout.php" padding-right: 30px;>Sign Out</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="auth/private.php" padding-right: 30px;>Private</a>
					  </li>';
					  $user = Auth::getUser();
					  if($user->accounttype == "admin") {
						  echo '<li class="nav-item">
								<a class="nav-link" href="auth/admin_page.php" padding-right: 30px;>Admin</a>
								</li>';
					  }
			} else {
				echo '<li class="nav-item">
						  <a class="nav-link" href="auth/signup.php" padding-right: 30px;>Sign Up</a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link" href="auth/signin.php" padding-right: 30px;>Sign In</a>
					  </li>';
			}
		?>
	  </ul>
	</div>
</nav>