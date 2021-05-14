<?php include('getdata.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update profile</title>
	<link href="style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>

	<header>
		<h2>Make changes</h2>
	</header>
	<div>
		<form action="profile.php" method="post">
			<?php include('errors.php') ?>
			<div>
				<p>User ID: <?php echo $user['user_id']; ?></p>
				
				<div class="input">
					<label>First Name: </label>
					<input type="text" name="fname" value="<?php echo $user['fname']; ?>">
				</div>
				
				<div class="input">
					<label>Last Name: </label>
					<input type="text" name="lname" value="<?php echo $user['lname']; ?>"><br>
				</div>
				
				<div class="input">
					<label>Username: </label>
					<input type="text" name="username" value="<?php echo $username; ?>"><br>
				</div>
				
				<div class="input">
					<label>Email: </label>
					<input type="email" name="email" value="<?php echo $user['email']; ?>"><br>
				</div>
				
				<div class="input">
					<label>Age: </label>
					<input type="number" name="age" value="<?php echo $user['age']; ?>"><br>
				</div>
				
				<div class="input">
					<label>Contact: </label>
					<input type="number" name="phn_no" value="<?php echo $user['phn_no']; ?>"><br>
				</div>
				
				<div class="input">
					<label>Current Password:</label>
					<input type="password" name="password_1"><br>
				</div>
				
				<div class="input">
					<label>New Password:</label>
					<input type="password" name="password_2"><br>
				</div>
				
				<div class="input">
					<button type="submit" class="btn" name="change">Save changes</button>
				</div>

				<div>
					<button><a href="index.php">Cancel</a></button>

				</div>
				
			</div>
		</form>

	</div>
</body>
</html>