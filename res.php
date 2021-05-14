<?php mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); ?>
<?php session_start();
	//$username = $_SESSION['username'];
	//echo $username;
	//$user_id = $_SESSION['user_id'];
	//echo $user_id;
	//$mov_id = $_SESSION['mov_id'];
	echo $_SESSION['title'];
	echo $_SESSION['year'];

?>
<?php include('mov.php') ?>
<?php $userid = $_SESSION['user_id'];
	$movide = $movid;
?>
<span>Username : <?php echo $_SESSION['username']; ?></span><br>
<span>User_id : <?php echo $_SESSION['user_id']; ?></span><br>
<span>Movie Id : <?php echo $movid; ?></span>

<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?> (<?= $year ?>)</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<link href="https://fonts.googleapis.com/css2?family=Amaranth:wght@700&display=swap" rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
	</style>
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<style type="text/css">
		section, .truncate {
			font-family: 'Jost', sans-serif; 
		}
		.ctn {
			padding: 10px;
			font-size: 15px;
			color: white;
			background: #5F9EA0;
			border: none;
			border-radius: 5px;
			position: relative;
			left: 84em;
			bottom: 34em;
		}
		.btn {
			padding: 10px;
			font-size: 15px;
			color: white;
			background: #5F9EA0;
			border: none;
			border-radius: 5px;
			position: relative;
			left: 21em;
		}
		.input {
			margin: 10px 0px 10px 0px;
		}

		.input label {
			/*display: block;
			text-align: left;*/
			margin: 3px;
		}
		.input input {
			height: 22px;
			width: 53%;
			padding: 5px 10px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid gray;
		}
		.input textarea {
			height: 80px;
			width: 53%;
			padding: 5px 10px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid gray;
			position: relative;
			left: 6em;
			bottom: 1em;
		}

	</style>
</head>
<body>
<div class='pos'>
	
	<img src='data:image/jpeg;base64,<?= base64_encode($img)?> ' height='345' width='230' />

</div>
<div class='movie-box'>
	<h1 class="headline"><?= $_SESSION['title']; ?></h1>
	<p>
		<small class="num">
			<strong><?= $_SESSION['year']; ?></strong>
		</small>
		<span class="dur"><?= $m_dur ?></span>
		<span class="lang"><strong><?= $m_lang ?></strong></span>
		
	</p>
</div>
<section class="summer">
	<div class="review body-text -prose -hero prettify">
		<h4 class="tagline"><?= $m_tit ?></h4>
		<div class="truncate" data-truncate="450">
			
			<p><?= $m_sum ?></p>

		</div>

	</div>

</section>

<form action="res.php" method="post">	
	<section>
		
		<div class="input">	
			<label>Review Title : </label>
			<input type="text" name="title" required>
		</div>

		<div class="input">
			<label>Review : </label><br>
			<textarea name="content" rows="3" cols="40" required>Write your review</textarea>
		</div>

		<div>
			<label>Rating : </label>
			<input type="number" name="rate" step="0.5" min="1" max="5" required>
			<span>/5</span>
		</div>

		<div>
			<button type="submit" name="review" class="btn"> Share </button>
		</div>
	</section>
</form>
<aside>
	
	<button class="ctn"><a href="index.php?logout='1'"> Log out </a></button>

</aside>
</body>
</html>
<?php include('review.php') ?>
<!--<?php $_POST = array(); ?>-->