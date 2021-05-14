<?php 

	session_start();
	$db = mysqli_connect('localhost','root','','trial');
	if(!isset($_SESSION['username']))
	{
		$_SESSION['msg'] = "You must login first to view this page.";
		header("location: login.php");
	}
$username = $_SESSION['username'];
//$uid="";

$query = "SELECT user_id, fname, lname, email, age, phn_no, password FROM user WHERE username = '$username'";
$results = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($results);
$uid = $user['user_id'];
$pass = $user['password'];

/*function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}*/
$errors=array();
if(isset($_POST['change']))
{
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$age = mysqli_real_escape_string($db, $_POST['age']);
	$phn_no = mysqli_real_escape_string($db, $_POST['phn_no']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	/*$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$phn_no = $_POST['phn_no'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];*/

	//form validation

	if(empty($fname)) { array_push($errors, "*First name is required."); }
	if(empty($lname)) { array_push($errors, "*Last name is required."); }
	if(empty($username)) {array_push($errors, "*Username is required.");}
	if(empty($email)) {array_push($errors, "*Email is required.");}
	if(empty($age)) {array_push($errors, "*Age is required.");}
	if(empty($phn_no)) {array_push($errors, "*Phone number is required.");}
	if(empty($password_1)) {array_push($errors, "*Password is required.");}
	if(empty($password_2)) {array_push($errors, "*Password confirmation is required.");}
	if($pass != md5($_POST['password_1']))
	{
		array_push($errors, "Wrong password");
	}
	if(count($errors)==0)
	{
		$password = md5($password_2);
		$update_query = "UPDATE user SET fname='$fname', lname='$lname', username='$username',email='$email', age='$age', phn_no='$phn_no', password='$password' WHERE user_id='$uid'";
		mysqli_query($db, $update_query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Saved changes";

		header('location: index.php');
	}
}
/*if(isset($_POST['delete']))
{
	//$username = $_SESSION['username'];
	$del_query = "DELETE user WHERE username = '$username'";
	mysqli_query($db, $del_query);
	session_destroy();
	unset($_SESSION['username']);
	header('location: bye.php');
}
?>*/