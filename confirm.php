<?php 

	session_start();
	$db = mysqli_connect('localhost','root','','trial');
	if(!isset($_SESSION['username']))
	{
		$_SESSION['msg'] = "You must login first to view this page.";
		header("location: login.php");
	}
	$username = $_SESSION['username'];
	$query = "SELECT user_id FROM user WHERE username = '$username'";
	$results = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($results);
	$uid = $user['user_id'];
	
	if(isset($_POST['delete']))
	{
		//$username = $_SESSION['username'];
		$del_query = "DELETE FROM user WHERE user_id='$uid'";
		/*SET  @num := 0;

		UPDATE your_table SET id = @num := (@num+1);

		ALTER TABLE your_table AUTO_INCREMENT =1;*/
		mysqli_query($db, $del_query);
		session_destroy();
		unset($_SESSION['username']);
		header('location: bye.php');
	}
?>