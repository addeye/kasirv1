
<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_POST['simpan'])) {
	// return var_dump($_POST);
	$nama = $_POST['nama'];
	$batas = $_POST['batas'];
	$potongan = $_POST['potongan'];

	// Menyimpan ke database;
	mysqli_query($dbconnect, "INSERT INTO diskon VALUES (NULL,'$nama','$batas','$potongan')");

	$_SESSION['success'] = 'Berhasil menambahkan data';

	// mengalihkan halaman ke list barang
	header("location:diskon.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Role</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Tambah Diskon</h1>
	<form method="post">
	  <div class="form-group">
	    <label>Nama Diskon</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama Diskon">
      </div>
      <div class="form-group">
	    <label>Batas Nominal</label>
	    <input type="text" name="batas" class="form-control" placeholder="Batas Nominal">
      </div>
      <div class="form-group">
	    <label>Potongan</label>
	    <input type="text" name="potongan" class="form-control" placeholder="Jumlah Potongan">
	  </div>
  	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  	<a href="/diskon.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>