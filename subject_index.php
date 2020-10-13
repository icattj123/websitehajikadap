<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Data Mata Kuliah</h1>
    <a class="btn btn-primary py-2 float-right mb-4" href="?f=subject_input">Input Data Mata Kuliah</a>
    <?php
	// Cek sudah login atau belum, kalau belum akan diredirect ke page logi. Penjelasan kode ini ada di file index.php
    if (isset($_SESSION["username"])) {
		//membuat objek mysql
        $mysqli = new mysqli("localhost", "root", "", "pabw");

        //mengecek apakah sudah terkoneksi ke database mysql atau belum
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

		//menjalankan query mysql
        $sql = "SELECT * FROM matkul";
        $result = $mysqli->query($sql);
        echo "
        <table class='table table-hover mt-4'>
            <thead>
                <th>Kode</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Sks</th>
                <th>Semester</th>
                <th>Aksi</th>
            </thead>
            <tbody>
            ";
		//mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
        if ($result->num_rows > 0) {
            // menampilkan hasil query data berdasarkan baris. id, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>" . $row["kode"] . "</td>
                    <td>" . $row["nama"] . "</td>
                    <td>" . $row["prodi"] . "</td>
                    <td>" . $row["sks"] . "</td>
                    <td>" . $row["semester"] . "</td>
                    <td>
                    <a class='btn btn-light' href='?f=subject_edit&&id=" . $row["id"] . "'>Edit</a>
                    <a class='btn btn-danger' href='subject_proses.php?aksi=hapus&&id=" . $row["id"] . "'>Hapus</a>
                  </tr>";
            }
        } else {
            echo "0 results";
        }
        echo "
        </tbody>
        </table>";
        $mysqli->close();
    }else{
        header("Location: index.php?f=login");
    }
    ?>
</body>

</html>