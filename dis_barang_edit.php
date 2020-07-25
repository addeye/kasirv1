
<?php

include 'config.php';
session_start();
include 'authcheck.php';

$view = $dbconnect->query("SELECT * FROM barang");

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	//menampilkan data berdasarkan ID
	$data = mysqli_query($dbconnect, "SELECT * FROM disbarang where id='$id'");
	$data = mysqli_fetch_assoc($data);
}

if(isset($_POST['update']))
{
	$id = $_GET['id'];

    $barang_id = $_POST['barang_id'];
	$qty = $_POST['qty'];
	$potongan = $_POST['potongan'];

	// Menyimpan ke database;
	mysqli_query($dbconnect, "UPDATE disbarang SET barang_id='$barang_id', qty='$qty', potongan='$potongan' where id='$id' ");

	$_SESSION['success'] = 'Berhasil memperbaruhi data';

	// mengalihkan halaman ke list barang
	header("location:dis_barang.php");
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
	    <label>Barang Yang Di Diskon</label>
	    <select name="barang_id" id="" class="form-control">
        <?php while ($row = $view->fetch_array()): ?>
            <option value="<?=$row['id_barang']?>" <?=$data['barang_id']==$row['id_barang']?'selected':''?> ><?=$row['nama']?></option>
        <?php endwhile; ?>
        </select>
      </div>
      <div class="form-group">
	    <label>Qty (Jumlah)</label>
	    <input type="text" name="qty" class="form-control" placeholder="Batas Nominal" value="<?=$data['qty']?>">
      </div>
      <div class="form-group">
	    <label>Potongan</label>
	    <input type="text" name="potongan" class="form-control" placeholder="Jumlah Potongan" value="<?=$data['potongan']?>">
	  </div>
  	<input type="submit" name="update" value="Update" class="btn btn-primary">
  	<a href="/dis_barang.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>