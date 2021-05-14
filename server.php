<?php 
	session_start();

	//initialise variables

	$fname = "";
	$lname = "";
	$username = "";
	$email = "";
	$age = "";
	$phn_no = "";
	$_SESSION['success'] = "";
	$errors = array();

	//database connection

	$db = mysqli_connect('localhost','root','','trial'); //or die("Unable to connect to the databse");

	//User registration
	if(isset($_POST['reg_user']))
	{

		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$age = mysqli_real_escape_string($db, $_POST['age']);
		$phn_no = mysqli_real_escape_string($db, $_POST['phn']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		//form validation

		if(empty($fname)) { array_push($errors, "*First name is required."); }
		if(empty($lname)) { array_push($errors, "*Last name is required."); }
		if(empty($username)) {array_push($errors, "*Username is required.");}
		if(empty($email)) {array_push($errors, "*Email is required.");}
		if(empty($age)) {array_push($errors, "*Age is required.");}
		if(empty($phn_no)) {array_push($errors, "*Phone number is required.");}
		if(empty($password_1)) {array_push($errors, "*Password is required.");}
		if($password_1 != $password_2) {array_push($errors, "*Passwords do not match");}

		//Check for same usernames encountered

		$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";
		$results = mysqli_query($db, $user_check_query);
		$user = mysqli_fetch_assoc($results);

		if($user)
		{
			if($user['username'] = $username)
			{
				array_push($errors, "*Username already exists.");
			}
			if($user['email'] = $email)
			{
				array_push($errors, "*Email already connected to other username.");
			}
		}

		//if no error then register the user

		if(count($errors) == 0)
		{
			$password = md5($password_1); //Password encryption
			$query = "INSERT INTO user (fname, lname, username, email, age, phn_no, password) VALUES ('$fname', '$lname', '$username', '$email', '$age', '$phn_no', '$password')";
			mysqli_query($db, $query);
			$que = "SELECT user_id FROM user WHERE username=$username";
			$pro = mysqli_query($conn, $que);
			$fro = mysqli_fetch_assoc($pro);
			$_SESSION['username'] = $username;
			$_SESSION['user_id'] = $fro['user_id'];
			$_SESSION['success'] = "You are now logged in.";

			header('location: index.php');

		}
	}
	//Login part
	if (isset($_POST['login_user'])) 
	{
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) 
		{
			array_push($errors, "Username is required");
		}
		if (empty($password)) 
		{
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) 
		{
			$password = md5($password);
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			$data = mysqli_fetch_assoc($results);
			$id = $data['user_id'];

			if (mysqli_num_rows($results)) 
			{
				$_SESSION['username'] = $username;
				$_SESSION['user_id'] = $id;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
			else 
			{
				array_push($errors, "Wrong username/password combination");
			}
		}
	}


?>