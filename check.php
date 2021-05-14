<?php 
//defining a check function for user input
$fnameErr = $lnameErr = $usernameErr = $emailErr = $ageErr = $phn_noErr = "";

$fname = $lname = $username = $email = $age = $phn_no = "";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["fname"]))
	{
		$fnameErr = "First name is required";
	}
	else
	{
		$fname = check_input($_POST["fname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
		{
     	 	$fnameErr = "Only letters and white space allowed";
    	}
	}
	if (empty($_POST["lname"]))
	{
		$lnameErr = "Last name is required";
	}
	else
	{
		$lname = check_input($_POST["lname"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
		{
     	 	$lnameErr = "Only letters and white space allowed";
    	}
	}
	}
	if (empty($_POST["username"]))
	{
		$usernameErr = "Username is required";
	}
	else
	{
		$username = check_input($_POST["username"]);
	}
	if (empty($_POST["email"]))
	{
		$emailErr = "Email is required";
	}
	else
	{
		$email = check_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
     	 	$emailErr = "Invalid email format";
    	}
	}
	if (empty($_POST["age"]))
	{
		$ageErr = "age is required";
	}
	else
	{
		$age = check_input($_POST["age"]);
	}
	if (empty($_POST["phn"]))
	{
		$phn_noErr = "Contact is required";
	}
	else
	{
		$phn_no = check_input($_POST["phn"]);
	}
}

function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>