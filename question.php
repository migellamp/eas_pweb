<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
	        $qno = $_GET['n'];
	        if ($qno == 1) {
	        	$_SESSION['quiz'] = 1;
	        }
	        }
	        else {
	        	header('location: question.php?n='.$_SESSION['quiz']);
	        } 
	        if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == $qno) {
			$query = "SELECT * FROM questions WHERE qno = '$qno'" ;
			$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				$qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
                 $_SESSION['quiz'] = $qno;
                 $checkqsn = "SELECT * FROM questions" ;
                 $runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
                 $countqsn = mysqli_num_rows($runcheck);
                 $time = time();
                 $_SESSION['start_time'] = $time;
                 $allowed_time = $countqsn * 0.05;
                 $_SESSION['time_up'] = $_SESSION['start_time'] + ($allowed_time * 60) ;
                 

			}
			else {
				echo "<script> alert('something went wrong');
			window.location.href = 'home.php'; </script> " ;
			}
		}
		else {
		echo "<script> alert('error');
			window.location.href = 'home.php'; </script> " ;
	}
?>
<?php 
$total = "SELECT * FROM questions ";
$run = mysqli_query($conn , $total) or die(mysqli_error($conn));
$totalqn = mysqli_num_rows($run);

?>
<html>
	<head>
		<title>Evaluasi Akhir Semester</title>
		<link rel="stylesheet" type="text/css" href="css/index1.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	</head>

	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand fixed-top navbar-light bg-light">
			<div class="container-fluid mx-5">
			  <a class="navbar-brand" href="index.php">
				<!-- <img src="img/Logo.svg" alt="Logo" height="50px"> -->
				<h4>mySSH</h4>
			  </a>
	  
			  <form class="input-group mx-5">
				<input class="form-control" type="search" placeholder="Search" aria-label="Search" style="width: 10px;">
				<button class="btn btn-outline-success" type="submit">Search</button>
			  </form>
	  
			  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
				  <!-- <a class="nav-link me-4" href="#"><img src="img/Messages.svg" alt="Shopping Cart" height="25px"></a>
				  <a class="nav-link me-4" href="#"><img src="img/Bell.svg" alt="Shopping Cart" height="25px"></a> -->
				</div>
                <div id="profil-body">
                    <!-- <a class="profil-body-budi" href="profil.html"><img src="img/profil-budi.svg" alt="profil" height="50px"></a> -->
                </div>
			  </div>
			</div>
		</nav>
        <!-- Navbar -->
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 exam_pilgan">
						<div class="judul">
							<h1>Evaluasi Akhir Semester</h1>
							<p>Matematika</p>
						</div>
						<div class="pilgan">
							<div class= "current">Pertanyaan <?php echo $qno; ?> dari <?php echo $totalqn; ?></div>
							<p class="question"><?php echo $question; ?></p>
							<form method="post" action="process.php">
								<ul class="choices">
									<li><input name="choice" type="radio" value="a" required=""><?php echo $ans1; ?></li>
									<li><input name="choice" type="radio" value="b" required=""><?php echo $ans2; ?></li>
									<li><input name="choice" type="radio" value="c" required=""><?php echo $ans3; ?></li>
									<li><input name="choice" type="radio" value="d" required=""><?php echo $ans4; ?></li>
								</ul>
								<input type="submit" value="Lanjut"> 
								<input type="hidden" name="number" value="<?php echo $qno;?>">
								<br>
								<br>
								<a href="results.php" class="start">Selesai?</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>

<?php } 
else {
	header("location: home.php");
}
?>