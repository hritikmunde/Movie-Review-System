<!--<?php include('header.php') ?>-->
<?php session_start(); ?>
<?php include('moviedata.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<h1>Search Page</h1>

<div class="movie-container">
	

</div>

<?php 
	if(isset($_POST['submit-search']))
	{
		$search = mysqli_real_escape_string($conn, $_POST['search']);
		$sql = "SELECT * FROM movie WHERE mov_title LIKE '%$search%' OR mov_year LIKE '%$search%' OR mov_lang LIKE '%$search%'";
		$result = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($result);


		echo "There are ".$queryResult." results!";

		if($queryResult > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$_SESSION['title'] = $row['mov_title'];
				$_SESSION['year'] = $row['mov_year'];
				$_SESSION['mov_id'] = $row['mov_id'];
				$_SESSION['img'] = $row['mov_poster'];
				$_SESSION['dur'] = $row['mov_dur'];
				$_SESSION['lang'] = $row['mov_lang'];
				$_SESSION['s_tit'] = $row['mov_sum_tit'];
				$_SESSION['sum'] = $row['mov_sum'];
				echo "<div class='movie-box'>
					<!--<a href='res.php?title=".$row['mov_title']."&year=".$row['mov_year']."'><h3>".$row['mov_title']."</h3></a>-->
					<a href='res.php'><h3>".$row['mov_title']."</h3></a>
					<p>".$row['mov_year']."</p>
					<p>".$row['mov_dur']."</p>
					<p>".$row['mov_lang']."</p>

				</div>";
			}
		}
		else
		{
			echo "There are no results matching your search";
		}
	}






?>