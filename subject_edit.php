<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php 
         $mysqli = new mysqli("localhost", "root", "", "pabw");
         
         $sql = "SELECT * FROM matkul where id='".$_GET['id']."'";
         $result = $mysqli->query($sql);
         $row = $result->fetch_assoc()
    ?>
    <h1>Edit Data matkul</h1>
    <form class="form-group" action="subject_proses.php" method="post">
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <table class="table table-hover">
            <tr>
                <td>kode</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="kode"  value="<?php echo $row['kode']; ?>"></td>
            </tr>    
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>
                    <select name="prodi" class="custom-select">
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Matematika">Matematika</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>sks</td>
                <td>:</td>
                <td><input class="form-control" type="text" value="<?= $row['sks'] ?>" name="sks"></td>
            </tr>
            <tr>
                <td>semester</td>
                <td>:</td>
                <td><input class="form-control" type="text" value="<?= $row['semester'] ?>" name="semester"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                <input class="btn btn-primary" type="submit" value="Submit">
                <a href="?f=subject_index" class="btn btn-default">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>