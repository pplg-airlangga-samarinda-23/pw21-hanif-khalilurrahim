<?php

require 'koneksi.php';

$sql = "SELECT username FROM user";
$rows = $koneksi->execute_query($sql)->fetch_all(MSQSLI_ASSOC);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Data user</h1>
    <a href="user-tambah.php">Tambah</a>
    <table>
        <Thead>
            <th>No</th>
            <th>Username</th>
        <Thead>
        <?php
        foreach ($rows as $row) {
        ?>
        <tr>
            <td><?=++$no?></td>
            <td><?=$row['username']?></td>    
        </tr>
        <?php
        }
        ?>
    <table>
</body>
</html>