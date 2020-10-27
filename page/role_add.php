
<?php
include 'authcheck.php';

if (isset($_POST['simpan'])) {

	$nama = $_POST['nama'];

	// Menyimpan ke database;
	mysqli_query($dbconnect, "INSERT INTO role VALUES (NULL,'$nama')");

	$_SESSION['success'] = 'Berhasil menambahkan data';

	// mengalihkan halaman ke list barang
	header('location: index.php?page=role');
}

?>
<div class="container">
	<h1>Tambah Role</h1>
	<form method="post">
	  <div class="form-group">
	    <label>Nama Role</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama Role">
	  </div>
  	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  	<a href="?page=role" class="btn btn-warning">Kembali</a>
	</form>
</div>