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
         
         $sql = "SELECT * FROM dosen where nip='".$_GET['nip']."'";
         $result = $mysqli->query($sql);
         $row = $result->fetch_assoc()
    ?>
    <h1>Edit Data Dosen</h1>
    <form class="form-group" action="lecturer_proses.php" method="post">
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <table class="table table-hover">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nip"  value="<?php echo $row['nip']; ?>"></td>
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
                <td>Pendidikan Terkahir</td>
                <td>:</td>
                <td>
                    <select name="pendidikan">
                        <option value="<?php echo $row['pendidikan']; ?>" default><?php echo $row['pendidikan']; ?></option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea class="form-control" name="alamat" cols="30" rows="10"><?php echo $row['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                <input class="btn btn-primary" type="submit" value="Submit">
                <a href="?f=lecturer_index" class="btn btn-default">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>