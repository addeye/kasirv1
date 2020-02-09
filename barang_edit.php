
<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //menampilkan data berdasarkan ID
    $data = mysqli_query($dbconnect, "SELECT * FROM barang where id_barang='$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];

    $nama = $_POST['nama'];
    $kode_barang = $_POST['kode_barang'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "UPDATE barang SET nama='$nama', harga='$harga', jumlah='$jumlah', kode_barang='$kode_barang' where id_barang='$id' ");

    $_SESSION['success'] = 'Berhasil memperbaruhi data';

    // mengalihkan halaman ke list barang
    header('location:barang.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Perbaruhi Barang</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Edit Barang</h1>
	<form method="post">
	  <div class="form-group">
	    <label>Nama Barang</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama barang" value="<?=$data['nama']?>">
	  </div>
	  <div class="form-group">
	    <label>Kode Barang</label>
	    <input type="text" name="kode_barang" class="form-control" placeholder="Kode barang" value="<?=$data['kode_barang']?>">
	  </div>
	  <div class="form-group">
	    <label>Harga</label>
	    <input type="number" name="harga" class="form-control" placeholder="Harga Barang" value="<?=$data['harga']?>">
	  </div>
	  <div class="form-group">
	    <label>Jumlah Stock</label>
	    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stock" value="<?=$data['jumlah']?>">
	  </div>
  	<input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
  	<a href="/barang.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>