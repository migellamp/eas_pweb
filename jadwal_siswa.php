<?php
	session_start();
	include "connection.php";
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
							<p>Berikut adalah jadwal kalian pada semester ini!</p>
							<!-- <a href="index.php" class="start">Home</a>
							<a href="admin.php" class="start">Admin Panel</a> -->

						</div>
					</div>
					<div class="col-md-7 add_jadwal">
          <div class="jadwal_pel">
              <h1> Jadwal Pembelajaran Siswa</h1>
              <table class="table table-bordered">
              <caption class="title"><a href="index.php" class="start">Kembali?</a> </caption>
                <caption>*ket : Pertemuan 1 (07.00-09.00), Pertemuan 2 (10.00-11.00), Pertemuan 3 (12.00-13.00), Pertemuan 4 (14.00-15.00), Pertemuan 5 (15.00-16.00)</caption>
                  
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Hari</th>
                          <th>Pertemuan 1</th>
                          <th>Pertemuan 2</th>
                          <th>Pertemuan 3</th>
                          <th>Pertemuan 4</th>
                          <th>Pertemuan 5</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                  <?php 
                      
                      $query = "SELECT * FROM jadwal ORDER BY j_no ASC";
                      $select_jadwal = mysqli_query($conn, $query) or die(mysqli_error($conn));
                      if (mysqli_num_rows($select_jadwal) > 0 ) {
                      while ($row = mysqli_fetch_array($select_jadwal)) {
                          $j_no = $row['j_no'];
                          $hari = $row['j_hari'];
                          $hp1 = $row['jp_1'];
                          $hp2 = $row['jp_2'];
                          $hp3 = $row['jp_3'];
                          $hp4 = $row['jp_4'];
                          $hp5 = $row['jp_5'];
                          echo "<tr>";
                          echo "<td>$j_no</td>";
                          echo "<td>$hari</td>";
                          echo "<td>$hp1</td>";
                          echo "<td>$hp2</td>";
                          echo "<td>$hp3</td>";
                          echo "<td>$hp4</td>";
                          echo "<td>$hp5</td>";
                          echo "</tr>";
                      }
                  }
                  ?>
              
                  </tbody>       
              </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
