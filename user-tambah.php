<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //prepared statement
    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $row = $koneksi->execute_query($sql, [$username, $password]);

    if ($row) {
        header("location:login.form.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah User</title>
</head>
<body>
    <h1>Tambah User</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>