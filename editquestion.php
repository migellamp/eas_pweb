<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
	?>



<?php 
if (isset($_GET['qno'])) {
	$qno = mysqli_real_escape_string($conn , $_GET['qno']);
	if (is_numeric($qno)) {
		$query = "SELECT * FROM questions WHERE qno = '$qno' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
			}
		}
		else {
			echo "<script> alert('error');
			window.location.href = 'allquestions.php'; </script>" ;
		}
	}
	else {
		header("location: allquestions.php");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);
    

	$query = "UPDATE questions SET question = '$question' , ans1 = '$choice1' , ans2= '$choice2' , ans3 = '$choice3' , ans4 = '$choice4' , correct_answer = '$correct_answer' WHERE qno = '$qno' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully updated');
		window.location.href= 'allquestions.php'; </script> " ;
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
						<div class="juduls_add">
							<h1>Selamat Datang</h1>
							<p>di halaman edit soal nomor <?php echo $qno; ?></p>
							<a href="adminhome.php" class="start">Kembali? </a>
							<!-- <a href="index.php" class="start">Home</a>
							<a href="admin.php" class="start">Admin Panel</a> -->

						</div>
					</div>
					<div class="col-md-7 jadwal">
						<div class="jadwals1">
						<h2>Ubah Pertanyaan...</h2>
						<form method="post" action="">

							<p>
								<label class="pertanyaan">Pertanyaan</label>
								<input class="pertanyaan1" type="text" name="question" required="" value="<?php echo $question; ?>">
							</p>
							<p>
								<label>Pilihan A</label>
								<input type="text" name="choice1" required="" value="<?php echo $ans1; ?>">
							</p>
							<p>
								<label>Pilihan B</label>
								<input type="text" name="choice2" required="" value="<?php echo $ans2; ?>">
							</p>
							<p>
								<label>Pilihan C</label>
								<input type="text" name="choice3" required="" value="<?php echo $ans3; ?>">
							</p>
							<p>
								<label>Pilihan D</label>
								<input type="text" name="choice4" required="" value="<?php echo $ans4; ?>">
							</p>
							<p>
								<label>Jawaban</label>
								<select name="answer" >
								<option value="a">Pilihan A</option>
								<option value="b">Pilihan B</option>
								<option value="c">Pilihan C</option>
								<option value="d">Pilihan D</option>
							</select>
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