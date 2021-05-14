<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link href="style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>

	<div class="container">
		
		<header>
			<h2>Register</h2>
		</header>
		<form action="registration.php" method="post">
			<?php include('errors.php') ?>
			<div class="input">

				<label>First name : </label>
				<input type="text" name="fname" required><br>
			</div>
				
			<div class="input">
				<label>Last name : </label>
				<input type="text" name="lname" required>

			</div>

			<div class="input">

				<label>Username : </label>
				<input type="text" name="username" value = "<?php echo $username; ?>" required>

			</div>

			<div class="input">

				<label>Email :</label>
				<input type="email" name="email" value = "<?php echo $email; ?>" required>

			</div>

			<div class="input">

				<label>Age : </label>
				<input type="number" name="age" value = "<?php echo $age; ?>" required>

			</div>

			<div class="input">

				<label>Phone No : </label>
				<input type="number" name="phn" value = "<?php echo $phn_no; ?>" required>

			</div>

			<div class="input">

				<label>Password : </label>
				<input type="password" name="password_1"required>

			</div>

			<div class="input">

				<label for="password">Confirm Password : </label>
				<input type="password" name="password_2"required>

			</div>

			<div class="input">
				<button type="submit" class="btn" name="reg_user"> Submit </button>
			</div>

			<p>Already a user? <a href="login.php"><strong>Log In</strong></a></p>

		</form>

	</div>

</body>
</html>