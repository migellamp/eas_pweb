<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('wrong password');</script>";
	}
}

?>


<html>
	<head>
		<title>PHP-kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/admin1.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	</head>

	<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 judulzz">
						<div class="juduls">
							<h1>Selamat Datang</h1>
							<p>di situs Guru SMA Sumber Harapan <a href="index.php" class="start">Home</a></p>
							<!-- <a href="index.php" class="start">Home</a>
							<a href="admin.php" class="start">Admin Panel</a> -->
							<p>Masukkan Password : </p>
							<form method="POST" action="">
							<input type="password" name="password" required="" >
							<input type="submit" name="submit" value="Login"> 
						</div>
					</div>
				</div>
			</div>
		</div>


	</body>
</html>