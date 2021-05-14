<?php 

	session_start();

	if(!isset($_SESSION['username']))
	{
		$_SESSION['msg'] = "You must login first to view this page.";
		header("location: login.php");
	}

	if(isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<link href="style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<h1>Welcome to home page</h1>
	</header>
	<div class="content">
		<?php if(isset($_SESSION['success'])) : ?>
			<div>

				<h3>
					<?php 

						echo $_SESSION['success'];
						unset($_SESSION['success']);

					 ?>

				</h3>

			</div>
		<?php endif ?>

		<!--after user logs in-->
		
		<?php if(isset($_SESSION['username'])) : ?>
			<h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
			<button class="btn"><a href="profile.php"> Update profile </a></button>
			<button class="btn"><a href="index.php?logout='1'"> Log out </a></button>
			<button class="btn"><a href="delete.php"> Delete account </a></button>
			<button class="btn"><a href="search.php"> Search Movies </a></button>
		<?php endif ?>
	</div>

</body>
</html>