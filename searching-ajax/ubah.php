<?php
session_start();
require 'functions.php';

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

// ambil id
$id = $_GET["id"];

// query data mahasiswa
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
// cek tombol submit
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Mahasiswa</title>
</head>
<body>
    <h1>Tambah data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"] ?>">
        <ul>
            <li>
                <label for="nim">NIM: </label>
                <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"] ?>">
            </li>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>">
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?= $mhs["email"] ?>">
            </li>
            <li>
                <label for="prodi">Prodi: </label>
                <input type="text" name="prodi" id="prodi" value="<?= $mhs["prodi"] ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label> <br>
                <img src="img/<?= $mhs['gambar'] ?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li><button type="submit" name="submit">Ubah data</button></li>
        </ul>
    </form>
</body>
</html>