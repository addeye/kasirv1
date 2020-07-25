
<?php

include 'config.php';
session_start();

include 'authcheck.php';

$view = $dbconnect->query('SELECT * FROM barang');

?>

<!DOCTYPE html>
<html>
<head>
	<title>List Barang</title>
	<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">

	<?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

		<div class="alert alert-success" role="alert">
			<?=$_SESSION['success']?>
		</div>

	<?php
        }
        $_SESSION['success'] = '';
    ?>

	<h1>List Barang</h1>
	<a href="/barang_add.php" class="btn btn-primary">Tambah data</a>
	<a href="/barang_cetak_barcode.php" class="btn btn-success">Cetak Barcode</a>
	<hr>
	<table class="table table-bordered">
		<tr>
			<th>ID Barang</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Jumlah Stok</th>
			<th>Aksi</th>
		</tr>
		<?php

        while ($row = $view->fetch_array()) { ?>

		<tr>
			<td> <?= $row['id_barang'] ?> </td>
			<td> <?= $row['kode_barang'] ?> </td>
			<td><?= $row['nama'] ?></td>
			<td><?=$row['harga']?></td>
			<td><?=$row['jumlah']?></td>
			<td>
				<a href="/barang_edit.php?id=<?= $row['id_barang'] ?>">Edit</a> |
				<a href="/barang_hapus.php?id=<?= $row['id_barang'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
			</td>
		</tr>

		<?php }
        ?>

	</table>
</div>
</body>
</html>