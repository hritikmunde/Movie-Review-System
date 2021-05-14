<?php include('confirm.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Profile</title>
</head>
<body>

	<div>
		
		<header>
			<h2>Are you sure?</h2>

		</header>
		<form action="delete.php" method="post">
			
			<button type="submit" name="delete"> Yes </button>
			<button><a href="index.php"> No </a></button>

		</form>

	</div>

</body>
</html>