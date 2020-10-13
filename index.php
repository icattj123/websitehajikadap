<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">
</head>

<body>
	<div class="container-fluid">
	<div class="row">
	<div class="col-3 position-fixed">
		<nav class="nav flex-column justify-content-center sidebar">
		<a class="nav-link" href="?f=lecturer_index">Data Dosen</a>
		<a class="nav-link" href="?f=student_index">Data Mahasiswa</a>
		<a class="nav-link" href="?f=subject_index">Data Matakuliah</a>
		
	
	<?php
	//memulai session
	session_start();
	//isset akan mengecek apakah variabel ada isinya atau tidak 
	//dalam hal ini variabel $_SESSION["username"] diinisiasi/diisikan value-nya waktu proses login
	//sehingga dipakai untuk mengecek apakah sudah login atau belum.
	//kl variabel $_SESSION["username"] kosong berarti belum login sehingga tdk akan ditampilkan link logout
	
	if (isset($_SESSION["username"])) {
		echo "<a class='nav-link' href='?f=logout'>Logout</a>";
	} else {
		echo "<a class='nav-link' href='?f=login'>Login</a>";
	}
	?>
		</nav>
	</div>
	<div class="col-9 offset-3">
	<div class="container">
	<?php
	//mekanisme/trik untuk menjalankan file php dari url/link tampa ekstensi php dengan menggunakan get
	//trik seperti ini akan sering digunakan pada framework laravel untuk membedakan halaman utama (home page) dengan page yang lain.
	//pertama akan mengecek apakah variabel $_GET['f'] ada value-nya atau tidak. value get berupa 
	//kl ada, akan digunakan untuk memanggil file sesuai dengan value yang diperoleh dari $_GET dengan code include_once
	// localhost/index.php?f=lecturer_index
	if (isset($_GET['f'])) {
		$file = $_GET['f'];
		if (file_exists("$file.php")) {
			include_once "$file.php";
		} else {
			echo '
				<div class="d-flex flex-column justify-content-center align-items-center" style="height:100vh;">
					<h1 class="display-4">File not found!!!</h1>
				</div>
			';
		}
	} else {
		echo '
		<h1 class="text-center mt-4">
		Selamat Datang di Kelas Proweb IF
		</h1>
		<div class="row align-items-center mt-5">
			<div class="col">
				<div class="card" style="width: 18rem;">
					<div class="card-body">
					<h5 class="card-title">Data Dosen</h5>
					<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
					<p class="card-text">Some quick example text to build on the Data Dosen and make up the bulk of the cards content.</p>
					<a href="?f=lecturer_input" class="card-link">Tambah</a>
					<a href="?f=lecturer_index" class="card-link">View</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card" style="width: 18rem;">
					<div class="card-body">
					<h5 class="card-title">Data Mahasiswa</h5>
					<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
					<p class="card-text">Some quick example text to build on the Data Mahasiswa and make up the bulk of the cards content.</p>
					<a href="?f=student_input" class="card-link">Tambah</a>
					<a href="?f=student_index" class="card-link">View</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card" style="width: 18rem;">
					<div class="card-body">
					<h5 class="card-title">Data Mata Kuliah</h5>
					<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
					<p class="card-text">Some quick example text to build on the Data Mata Kuliah and make up the bulk of the cards content.</p>
					<a href="?f=subject_input" class="card-link">Tambah</a>
					<a href="?f=subject_index" class="card-link">View</a>
					</div>
				</div>
			</div>
			
		</div>
		';
	}
	?>
	</div>
	</div>
	</div>
	</div>
</body>

</html>