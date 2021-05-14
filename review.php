
<?php 
	$errors = array();
	if(isset($_POST['review']))
	{
		$titl = mysqli_real_escape_string($conn, $_POST['title']);
		$content = mysqli_real_escape_string($conn, $_POST['content']);
		$rating = mysqli_real_escape_string($conn, $_POST['rate']);

		if(empty($titl)){array_push($errors, "Title required");}
		if(empty($content)){array_push($errors,"Content required");}
		if(empty($rating)){array_push($errors,"Rating required");}

		$rev_query = "INSERT INTO review (rev_title, rev_con) VALUES ('$titl','$content')";
		$confirm = "SELECT rev_id FROM review WHERE rev_title='$titl' AND rev_con='$content'";
		mysqli_query($conn, $rev_query);
		$results = mysqli_query($conn, $confirm);
		$bow = mysqli_fetch_assoc($results);
		//echo "Rev id: ".$bow['rev_id'];
		$revid = $bow['rev_id'];

		$rate_query = "INSERT INTO rate (mov_id, rev_id, user_id, rev_stars) VALUES ($movid, $revid, $userid, $rating)";
		mysqli_query($conn, $rate_query);
	}

	$final = "SELECT * FROM (SELECT user_id, rev_stars, rev_id, rev_title, rev_con FROM review NATURAL JOIN rate WHERE mov_id=$movid ORDER BY rev_id DESC LIMIT 5)var1 ORDER BY rev_id ASC";
	$don = mysqli_query($conn, $final);
	$qres = mysqli_num_rows($don);
	

	if($qres > 0)
	{
		while($sow = mysqli_fetch_assoc($don))
		{
			//$usid = "";
			$usid = $sow['user_id'];
			$again = "SELECT username FROM user WHERE user_id='$usid'";
			$con = mysqli_query($conn, $again);
			$jow = mysqli_fetch_assoc($con);
			echo "
					<section class='revi'>
						<span><strong>".$jow['username']."</strong></span>
						<span>".$sow['rev_stars']."/5</span><br>
						<span><strong>".$sow['rev_title']."</strong></span><br>
						<span>".$sow['rev_con']."</span><br><br>
					</section>";	
		}
	}
	else
	{
		echo "<br><p>No reviews yet</p>";
	}
	$_POST['review'] = "";
	$_POST['title'] = "";
	$_POST['content'] = "";
	$_POST['rate'] = "";
	//$_POST = array();
	//$_POST=[];


?>
<!--<?php include('mov.php') ?>-->