<?php

require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Nama = $_POST["Nama"];
    $Stok = $_POST["Stok"];
    $Status = $_POST["Status"];

    $sql = "INSERT INTO barang (nama_barang, stok, status) values (?, ?, ?)";
    //PHP 8.2
    //$row = $koneksi->execute_query($sql, [$nama, $stok, $status]);
    
    //untuk semua versi php
    $stmt = $koneksi -> prepare($sql);
    $stmt -> bind_param("sis", $Nama, $Stok, $Status);
    $stmt -> execute();

    header("location:barang.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah barang</title>
</head>
<body>
    <h1 stayle="font-size:large">Tambah barang</h1>
    <form action="" method="POST">
        <div class="form-item">
            <label for="nama">Nama barang</label>
            <input type="text" name="Nama" id="nama">
        </div>
        <div class="form-item">
            <label for="stok">Stok</label>
            <input type="number" name="Stok" id="stok">
        </div>
        <div class="form-item">
            <label for="status">Status</label>
            <select name="Status" id="status">
                <option values="" disable selected>Pilih status barang</option>
                <option values="baik">Baik</option>
                <option values="rusak">Rusak</option>
            </select>
        </div>
        <button type="submit">Submit<button>
    </from>
    <a href="barang.php">Kembali</a>
</body>
</html>