<!--<?php include('header.php') ?>-->

<?php include('moviedata.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<form action="result.php" method="post">
	<input type="text" name="search" placeholder="search">
	<button type="submit" name="submit-search"> Search </button>
</form>


<h1>Front page</h1>
<h2>All movies</h2>

<div class="movie-container">
	<?php 
		//echo $_GET['username'];
		$sql = "SELECT * FROM movie";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);
		
		if($queryResults > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "
					<div class='pos'>
						<img src='data:image/jpeg;base64," . base64_encode($row['mov_poster']) . "' height='256' width='171' />
					</div>
					<div class='movie-box'>
					<h3>".$row['mov_title']."</h3>
					<p>".$row['mov_year']."</p>
					<p>".$row['mov_dur']."</p>
					<p>".$row['mov_lang']."</p>

					</div>";			
			}
		}

	 ?>
	
</div>	
</body>
</html>