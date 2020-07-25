
<?php

include 'config.php';
session_start();
include 'authcheck.php';

$view = $dbconnect->query('SELECT * FROM barang');

if (isset($_POST['simpan'])) {
    // return var_dump($_POST);
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];
    $potongan = $_POST['potongan'];

    // Menyimpan ke database;
    mysqli_query($dbconnect, "INSERT INTO disbarang VALUES (NULL,'$barang_id','$qty','$potongan')");

    $_SESSION['success'] = 'Berhasil menambahkan data';

    // mengalihkan halaman ke list barang
    header('location:dis_barang.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Diskon Barang</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Tambah Diskon Barang</h1>
	<form method="post">
	  <div class="form-group">
	    <label>Barang Yang Di Diskon</label>
	    <select name="barang_id" id="" class="form-control">
        <?php while ($row = $view->fetch_array()): ?>
            <option value="<?=$row['id_barang']?>"><?=$row['nama']?></option>
        <?php endwhile; ?>
        </select>
      </div>
      <div class="form-group">
	    <label>Qty (Jumlah)</label>
	    <input type="text" name="qty" class="form-control" placeholder="Batas Nominal">
      </div>
      <div class="form-group">
	    <label>Potongan</label>
	    <input type="text" name="potongan" class="form-control" placeholder="Jumlah Potongan">
	  </div>
  	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
  	<a href="/dis_barang.php" class="btn btn-warning">Kembali</a>
	</form>
</div>
</body>
</html>