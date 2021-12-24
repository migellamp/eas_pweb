<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
	?>



<?php 
if (isset($_GET['j_no'])) {
	$j_no = mysqli_real_escape_string($conn , $_GET['j_no']);
	if (is_numeric($j_no)) {
		$query = "SELECT * FROM jadwal WHERE j_no = '$j_no' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $j_no = $row['j_no'];
                 $j_hari = $row['j_hari'];
                 $jp_1 = $row['jp_1'];
                 $jp_2 = $row['jp_2'];
                 $jp_3 = $row['jp_3'];
                 $jp_4 = $row['jp_4'];
                 $jp_5 = $row['jp_5'];
			}
		}
		else {
			echo "<script> alert('error');
			window.location.href = 'jadwal.php'; </script>" ;
		}
	}
	else {
		header("location: jadwal.php.php");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
    $haris = htmlentities(mysqli_real_escape_string($conn , $_POST['haris']));
    $hp1s = htmlentities(mysqli_real_escape_string($conn , $_POST['hp1s']));
    $hp2s = htmlentities(mysqli_real_escape_string($conn , $_POST['hp2s']));
    $hp3s = htmlentities(mysqli_real_escape_string($conn , $_POST['hp3s']));
    $hp4s = htmlentities(mysqli_real_escape_string($conn , $_POST['hp4s']));
    $hp5s = htmlentities(mysqli_real_escape_string($conn , $_POST['hp5s']));
    

	$query = "UPDATE jadwal SET j_hari = '$haris' , jp_1 = '$hp1s', jp_2 = '$hp2s' , jp_3 = '$hp3s' , jp_4 = '$hp4s', jp_5 = '$hp5s' WHERE j_no = '$j_no' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully updated');
		window.location.href= 'jadwal.php'; </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

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
			  <a class="navbar-brand" href="adminhome.php">
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
						<div class="juduls_add">
							<h1>Selamat Datang</h1>
							<p>di halaman edit Jadwal Pembelajaran hari <?php echo $j_hari; ?></p>
							<a href="jadwal.php" class="start">Kembali? </a>
							<!-- <a href="index.php" class="start">Home</a>
							<a href="admin.php" class="start">Admin Panel</a> -->

						</div>
					</div>
					<div class="col-md-7 jadwal">
						<div class="jadwals1">
						<h2>Ubah Mata Pelajaran...</h2>
						<form method="post" action="">
							<p>
								<label>Hari</label>
								<input type="text" name="haris" required="" value="<?php echo $j_hari; ?>">
							</p>
							<p>
								<label>Pertemuan 1</label>
								<input type="text" name="hp1s" required="" value="<?php echo $jp_1; ?>">
							</p>
							<p>
								<label>Pertemuan 2</label>
								<input type="text" name="hp2s" required="" value="<?php echo $jp_2; ?>">
							</p>
							<p>
								<label>Pertemuan 3</label>
								<input type="text" name="hp3s" required="" value="<?php echo $jp_3; ?>">
							</p>
							<p>
								<label>Pertemuan 4</label>
								<input type="text" name="hp4s" required="" value="<?php echo $jp_4; ?>">
							</p>
                            <p>
								<label>Pertemuan 5</label>
								<input type="text" name="hp5s" required="" value="<?php echo $jp_5; ?>">
							</p>
							<p>
								
								<input class="submit" type="submit" name="submit" value="Submit">
							</p>
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
	header("location: admin.php");
}
?>