<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID adalah integer
    $sql = "SELECT * FROM barang WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    } else {
        die("Query gagal: " . $stmt->error);
    }

    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST["id"]);
    $nama = trim($_POST["nama"]);
    $stok = intval($_POST["stok"]);
    $status = trim($_POST["status"]);

    if (!empty($nama) && is_numeric($stok) && !empty($status)) {
        $sql = "UPDATE barang SET nama = ?, stok = ?, status = ? WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sisi", $nama, $stok, $status, $id);
        
        if ($stmt->execute()) {
            header("Location: barang.php");
            exit();
        } else {
            die("Gagal memperbarui data: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("Input tidak valid.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit barang</title>
</head>
<body>
    <h1 style="font-size:large">Edit barang</1h>
    <form action="" method="post">
        <div class="form-item">
            <label for="nama">Nama barang</label>
            <input type="text" name="nama" id="nama" value="<?=row['nama']?>">
        </div>
        <div class="form-item">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" value="<?=row['stok']?>">
        </div>
        <div class="form-item">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option values="baik" <?=($row['status'] == 'baik')?'selected':''?> >baik</option>
                <option values="rusak" <?=($row['status'] == 'rusak')?'selected':''?> >rusak</option>
            </select>
            <button type="submit">Submit</button>
        </form>
</body>
</html>