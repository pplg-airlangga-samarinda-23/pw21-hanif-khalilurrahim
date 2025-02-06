<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM barang WHERE id=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama"];
    $stok = $_POST["stok"];
    $status = $_POST["status"];
    $id = $_GET["id"];

    $sql = "UPDATE barang SET nama_barang=?, stok=?, status=? WHERE id=?";
    $row = $koneksi->execute_query($sql, [$nama, $stok, $status, $id]);
    header("location:barang.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit barang</title>
</head>
<body>
    <h1 style="font-size:large">Edit barang</1h>
    <form action="" method="POST">
        <div class="form-item">
            <label for="nama">Nama barang</label>
            <input type="text" name="nama" id="nama" value="<?=$row['nama_barang']?>">
        </div>

        <div class="form-item">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" value="<?=$row['stok']?>">
        </div>

        <div class="form-item">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option values="baik" <?=($row['status'] == 'baik')?'selected':''?> >baik</option>
                <option values="rusak" <?=($row['status'] == 'rusak')?'selected':''?> >rusak</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
    <a href="barang.php">Kembali</a>
</body>
</html>