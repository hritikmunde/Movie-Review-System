<!--<?php include('header.php') ?>-->
<!--<?php session_start(); ?>-->
<?php include('moviedata.php') ?>

	<?php 
		$title = $search = mysqli_real_escape_string($conn, $_SESSION['title']);
		
		$year = $search = mysqli_real_escape_string($conn, $_SESSION['year']);
		

		$sql = "SELECT * FROM movie WHERE mov_title='$title' AND mov_year='$year'";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);
		//$_SESSION['mov_id'] = "";
		if($queryResults > 0)
		{
			$row = mysqli_fetch_assoc($result);
			
				$movid = $_SESSION['mov_id'];
				$img = $_SESSION['img'];
				//$m_title =  $row['mov_title'];
				//$m_year = $row['mov_year'];
				$m_dur = $_SESSION['dur'];
				$m_lang = $_SESSION['lang'];
				$m_tit = $_SESSION['s_tit'];
				$m_sum = $_SESSION['sum'];
				/*echo "
					<div class='pos'>
						<img src='data:image/jpeg;base64," . base64_encode($row['mov_poster']) . "' height='256' width='171' />
					</div>
					<div class='movie-box'>
					<h3>".$row['mov_title']."</h3>
					<p>".$row['mov_year']."</p>
					<p>".$row['mov_dur']."</p>
					<p>".$row['mov_lang']."</p>

					</div>";*/
				//$_SESSION['mov_id'] = $movid;
		}

	 ?>