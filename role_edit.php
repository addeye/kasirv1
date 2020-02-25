
<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	//menampilkan data berdasarkan ID
	$data = mysqli_query($dbconnect, "SELECT * FROM role where id_role='$id'");
	$data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update']))
{
	$id = $_GET['id'];

	$nama = $_POST['nama'];

	// Menyimpan ke database;
	mysqli_query($dbconnect, "UPDATE role SET nama='$nama' where id_role='$id' ");

	$_SESSION['success'] = 'Berhasil memperbaruhi data';

	// mengalihkan halaman ke list barang
	header("location:role.php");
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
	<h1>Edit Role</h1>
	<form method="post">
	  <div class="form-group">
	    <label>Nama Role</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama Role" value="<?=$data['nama']?>">
	  </div>
  	<input type="submit" name="update" value="Perbaruhi" class="btn btn-primary">
  	<a href="/barang.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>