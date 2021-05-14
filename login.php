<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link href="style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
	<div class="bg-image"></div>
	<div class="container">
		
		<header>
			<h2>Log In</h2>
		</header>

		<form action="login.php" method="post">
			<?php include('errors.php') ?>
			<div class="input">

				<label>Username : </label>
				<input type="text" name="username" required>

			</div>


			<div class="input">

				<label>Password : </label>
				<input type="password" name="password">

			</div>

			<div class="input">
				<button type="submit" class="btn" name="login_user"> Log In </button>
			</div>

			<p>Not a user? <a href="registration.php"><strong>Register Here</strong></a></p>

		</form>

	</div>

</body>
</html>