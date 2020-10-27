
<?php

include 'authcheck.php';

$role = mysqli_query($dbconnect,"SELECT * FROM role");

// echo var_dump($roledata);
// return false;

if (isset($_POST['simpan'])) {
	// echo var_dump($_POST);
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role_id = $_POST['role_id'];


	// Menyimpan ke database;
	mysqli_query($dbconnect, "INSERT INTO user VALUES (NULL,'$nama','$username','$password','$role_id')");

	$_SESSION['success'] = 'Berhasil menambahkan data';

	// mengalihkan halaman ke list barang
	header('location: index.php?page=user');

}

?>

<div class="container">
	<h1>Tambah User</h1>
	<form method="post">
	  <div class="form-group">
	    <label>Nama</label>
	    <input type="text" name="nama" class="form-control" placeholder="Nama User">
	  </div>
	  <div class="form-group">
	    <label>Username</label>
	    <input type="text" name="username" class="form-control" placeholder="Username">
	  </div>
	  <div class="form-group">
	    <label>Password</label>
	    <input type="text" name="password" class="form-control" placeholder="Password">
	  </div>
	  <div class="form-group">
	    <label>Role Akses</label>
	    <select class="form-control" name="role_id">
	    	<option value="">Pilih Role Akses</option>
	    <?php while($row = mysqli_fetch_array($role)){?>
	    	<option value="<?=$row['id_role']?>"><?=$row['nama']?></option>
	    <?php } ?>
	    </select>
	  </div>
  	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  	<a href="?page=user" class="btn btn-warning">Kembali</a>
	</form>
</div>