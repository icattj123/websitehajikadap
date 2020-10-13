<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form class="form-group" method="post" action="">
        <h1>Login</h1>

        <label for="username">Username</label>
        <input class="form-control" type="text" name="username">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password">
        <button class="btn btn-primary mt-3" type="submit" value="Submit">Login</button>
    </form>

</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "pabw");

    $sql = "SELECT * FROM user where username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION["username"] = $row['username'];
            $_SESSION["password"] = $row['password'];
            header("Location: index.php?");
        }
    } else {
        echo "Username dan Password salah";
    }
}
?>

</html>