<?php
	session_start();
	include "connection.php";
?>
<?php 
	if (isset($_SESSION['id'])) {
		header("location: home.php");
	}
?>
<?php
	if (isset($_POST['email'])) 
	{
		$email = mysqli_real_escape_string($conn , $_POST['email']);
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$checkmail = "SELECT * from users WHERE email = '$email'";
			$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
			if (mysqli_num_rows($runcheck) > 0) 
			{
				$played_on = date('Y-m-d H:i:s');
				$update = "UPDATE users SET played_on = '$played_on' WHERE email = '$email' ";
				$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
				$row = mysqli_fetch_array($runcheck);
				$id = $row['id'];
				$_SESSION['id'] = $id;
				$_SESSION['email'] = $row['email'];
				header("location: home.php");
			}
			else 
			{
				$played_on = date('Y-m-d H:i:s');
				$query = "INSERT INTO users(email,played_on) VALUES ('$email','$played_on')";
				$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
				if (mysqli_affected_rows($conn) > 0) 
				{
					$query2 = "SELECT * FROM users WHERE email = '$email' ";
					$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
					if (mysqli_num_rows($run2) > 0) 
					{
						$row = mysqli_fetch_array($run2);
						$id = $row['id'];
						$_SESSION['id'] = $id;
						$_SESSION['email'] = $row['email'];
						header("location: home.php");
					}
				}
				else
				{
					echo "<script> alert('something is wrong'); </script>";
				}
			}
		}
		else {
			echo "<script> alert('Invalid Email'); </script>";
		}
	}
?>
<html>
	<head>
		<title>SMA SUMBER HARAPAN</title>
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
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="width: 10px;margin-top:10px;">
            <button class="btn btn-outline-success" type="submit" style="margin-top:10px;" >Search</button>
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
							<p>Halaman siswa SMA Sumber Harapan <a href="admin.php" class="start">Guru?</a></p>
							<!-- <a href="index.php" class="start">Home</a>
							<a href="admin.php" class="start">Admin Panel</a> -->

						</div>
					</div>
					<div class="col-md-7 jadwal">
						<div class="jadwals">
							<h1>Jadwal Pelajaran</h1>
							<p>Tekan Lihat jadwal, untuk melihat jadwal semester ini</p>
							<a href="jadwal_siswa.php">Lihat Jadwal</a>
						</div>
					</div>
					<div class="col-md-4 rekap">
						<div class="borders">
							<h1>Rekap Nilai Siswa</h1>
							<p>Tekan Lihat Rekap, untuk melihat rekap nilai siswa</p>
							<a href="rekap.php">Lihat Rekap</a>
						</div>
					</div>
					<div class="col-md-12 exam">
						<div class="exams">
							<h1>Evaluasi Akhir Semester</h1>
							<p>Masukkan Email, untuk mengerjakan kuis :</p>
							<form method="POST" action="">
							<input type="email" name="email" required="" >
							<input type="submit" name="submit" value="Lanjut">
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>