<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Input Data Dosen</h1>
    <form class="form-group" action="lecturer_proses.php" method="post">
    <input type="hidden" name="aksi" value="input">
        <table class="table table-hover">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nip"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>
                    <select class="custom-select" name="prodi">
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
                    <select class="custom-select" name="pendidikan">
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea class="form-control" name="alamat" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input class="btn btn-primary" type="submit" value="Submit">
                    <input class="btn btn-danger" type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>
</html>