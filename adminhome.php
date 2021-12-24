<?php 
session_start();
if (isset($_SESSION['admin'])) {
?>




<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
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
					<div class="col-md-12 judulzz">
						<div class="juduls">
							<h1>Selamat Datang</h1>
							<p>di situs Guru SMA Sumber Harapan <a href="exit.php" class="start">Logout?</a></p>
							<!-- <a href="index.php" class="start">Home</a>
							<a href="admin.php" class="start">Admin Panel</a> -->

						</div>
					</div>
					<div class="col-md-7 jadwal">
						<div class="jadwals">
							<h1>Exam Management</h1>
							<p>Tekan Buat untuk membuat atau menambahkan Soal</p>
							<a href="add.php">Buat</a>
						</div>
					</div>
					<div class="col-md-4 rekap">
						<div class="borders">
							<h1>Kehadiran Siswa</h1>
							<p>Tekan Lihat untuk melihat daftar siswa yang mengikuti Ujian</p>
							<a href="rekap_guru.php">Lihat Rekap</a>
						</div>
					</div>
					<div class="col-md-12 exam">
						<div class="jadwals" style="margin-top:0px;width: 1319px;">
							<h1>Classroom Management</h1>
							<p>Tekan Buat untuk membuat atau menambahkan Jadwal Pembelajaran</p>
                            <a href="jadwal.php">Buat</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>


<?php } 
else {
header("location: admin.php");
}
?>