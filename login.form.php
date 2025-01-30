<?php
// post itu tidak menampilkan inputan
// get itu menampilkan inputan
    echo "</br>";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $username_benar = "adminhitam";
    $password_benar = "admin";
// && AND benar jika dua yang benar
// || OR benar jika salah satu benar
    if ( $username === $username_benar && $password === $password_benar) {
        //echo "password benar<br>";
        header("Location:barang.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="form.css">
    <title>Login Form</title>
</head>
<body>

<style>
    .logo {
        position: relative;
        width: 200px;
        border-radius: 100%;
        left: 43%;
    }
    .username {
        left: 43.5%;
        position: relative;
    }
    .password {
        left: 43.5%;
        position: relative;
    }
    button {
            left: 47.5%;
        position: relative;
        }
   
</style>

<img class="logo" src="logo.jpg" alt=""><br>
    <Form class="login" action="" method="POST">
    <input class="username" name="username" type="text" placeholder="UserName" require> <br>
    <input class="password" name="password" type="text" placeholder="PassWord" require> <br>
    <button>Login</button><br>
</Form>

</body>
</html>