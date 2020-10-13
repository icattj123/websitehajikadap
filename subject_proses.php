<?php
//Tempat untuk mengeksekusi semua event baik itu input data, edit data dan hapus data.

//membuat objek database mysql dengan format (link_server, username_mysql, password_mysql, database_mysql)
$mysqli = new mysqli("localhost", "root", "", "pabw");

//setiap request yang datang akan dicek methodnya apakah post atau get. 
//$_POST['aksi'] valuenya diperoleh dari tag <input type="hidden" value=""> karena kl metod post, data yang dikirim dr suatu form, tdk ditampilkan di url/link.
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $sks = $_POST["sks"];
    $semester = $_POST["semester"];
	
	//eksekusi query mysql dalam hal ini input data ke tabel
    $query = "INSERT INTO matkul (kode, nama, prodi, sks, semester) VALUES ('$kode', '$nama', '$prodi', '$sks', '$semester')";
    $result = $mysqli->query($query);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $id = $_POST["id"];
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $sks = $_POST["sks"];
    $semester = $_POST["semester"];

    $query = "UPDATE matkul SET kode='$kode', nama='$nama', prodi=' $prodi', sks='$sks', semester='$semester' WHERE id='$id'";
    $result = $mysqli->query($query);
} else if ($_GET['aksi'] == "hapus") {
    $query = "DELETE FROM matkul WHERE id='" . $_GET['id'] . "'";

    $result = $mysqli->query($query);
} 
header("Location: index.php?f=subject_index");
$mysqli->close();
