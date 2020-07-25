
<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	//menampilkan data berdasarkan ID
	$data = mysqli_query($dbconnect, "SELECT * FROM diskon where id='$id'");
	$data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update']))
{
	$id = $_GET['id'];

    $nama = $_POST['nama'];
	$batas = $_POST['batas'];
	$potongan = $_POST['potongan'];

	// Menyimpan ke database;
	mysqli_query($dbconnect, "UPDATE diskon SET nama='$nama', batas='$batas', potongan='$potongan' where id='$id' ");

	$_SESSION['success'] = 'Berhasil memperbaruhi data';

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
	    <input type="text" name="nama" class="form-control" placeholder="Nama Diskon" value="<?=$data['nama']?>">
      </div>
      <div class="form-group">
	    <label>Batas Nominal</label>
	    <input type="text" name="batas" class="form-control" placeholder="Batas Nominal" value="<?=$data['batas']?>">
      </div>
      <div class="form-group">
	    <label>Potongan</label>
	    <input type="text" name="potongan" class="form-control" placeholder="Jumlah Potongan" value="<?=$data['potongan']?>">
	  </div>
  	<input type="submit" name="update" value="Update" class="btn btn-primary">
  	<a href="/diskon.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>