<?php session_start(); ?>
<?php include "connection.php";
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
    <div class="container rekaps">
        <h1>Rekap Nilai Evaluasi Akhir Semester Siswa</h1>
        <br>
        <table class="table">
            <caption class="title"><a href="adminhome.php" class="start">Kembali? </a></caption>
            <thead>
                <tr>
                <th>Id Siswa</th>
                <th>Email Siswa</th>
                <th>Tanggal</th>
                <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $query = "SELECT * FROM users ORDER BY played_on DESC";
                $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
                if (mysqli_num_rows($select_players) > 0 ) {
                while ($row = mysqli_fetch_array($select_players)) {
                    $id = $row['id'];
                    $email = $row['email'];
                    $played_on = $row['played_on'];
                    $score = $row['score'];
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$email</td>";
                    echo "<td>$played_on</td>";
                    echo "<td>$score</td>";
                
                    echo "</tr>";
                }
            }
            ?>
        
            </tbody>
            
        </table>
    </div>
</body>
</html>


<?php } 
else {
	header("location: admin.php");
}
?>
