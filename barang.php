<?php

require "koneksi.php";

$sql = "select * from barang";
//$rows = $koneksi ->execute_query($sql, [])->fetch_all(mysqli_assoc); <- versi lama 

//cara oop di versi lama
$rows = mysqli_query($koneksi, $sql);

//cara prosedural nanti
var_dump($rows);
//foreach ($rows as $row)
//{
//    echo "{$row['id']}: {$Row['nama_barang']}\n";
//}

$barang = [
    
    [
        "Nama" => "laptop",
        "Stok" => "6",
        "Status" => "baik",
        "Aksi" => "Edit"." "."Hapus", 
    ],
    
    [
        "Nama" => "PC",
        "Stok" => "38",
        "Status" => "baik",
        "Aksi" => "Edit"." "."Hapus", 
    ],

    [
        "Nama" => "Printer",
        "Stok" => "1",
        "Status" => "rusak", 
        "Aksi" => "Edit"." "."Hapus",
    ],

];

foreach($barang as $key => $value) {
    echo $value["Nama"]." ".$value["Stok"]." ".$value["Status"].$value["Aksi"]."<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Barang</title>
    <link rel="stylesheet" href="form.css">
    <style>
    table {
    background-color: black;
    }

    tr {
        background-color: gray;
    }

    th  {
        background-color: gray;
    }

    td  {
        background-color: green;
    }   
    </style>

</head>
<body>
    <a href="tambah.php">Tambah</a>
<div class="tabel">
        <table >
            <thead>
                <tr>
                    <th>No.</th>
                    <th>nama barang</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            <thead>
            
            <tbody>
                
            <?php
                $no = 1;
                //foreach ($barang as $item) 
                while ($item = mysqli_fetch_assoc($rows)){
            ?>
                                
            <tr>
                <td> <?= $no; ?></td>
                <td> <?= $item["nama_barang"] ?></td>
                <td> <?= $item["stok"] ?></td>
                <td> <?= $item["status"] ?></td>
                <td> 
                    <a href="edit-tambah-barang.php?id=<?$item['id']?>">Edit</a>
                    <a href="hapus-data.php"id=<?=$item['id']?>>Hapus</a> 
                </td>
            </tr>
                
            <?php
            $no += 1;
                }
            ?>
                
            <tbody>

        </table>
</div>
</body>
</html>