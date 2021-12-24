<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
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
					<div class="col-md-12 exam_uas">
						<div class="uas">
							<h1>Evaluasi Akhir Semester</h1>
							<p>Matematika</p>
							<ul>
								<li><strong>Jumlah Soal : </strong><?php echo $total; ?></li>
								<li><strong>Tipe Soal : </strong>Multiple Choice</li>
								<li><strong>Waktu Maksimal : </strong><?php echo $total * 1 * 60; ?> Detik</li>
								<li><strong>Score : </strong> +1 point untuk setiap jawaban yang benar</li>
							</ul>
							<a href="question.php?n=1" class="start">Mulai</a>
							<a href="exit.php" class="add">Keluar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>