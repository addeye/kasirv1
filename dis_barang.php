
<?php

include 'config.php';
session_start();

$view = $dbconnect->query('SELECT disbarang.*, barang.nama as barang FROM disbarang inner join barang ON disbarang.barang_id=barang.id_barang');

?>

<!DOCTYPE html>
<html>
<head>
	<title>List Diskon</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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

	<h1>List Diskon Barang</h1>

	<a href="/dis_barang_add.php" class="btn btn-primary">Tambah data</a>

	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Barang</th>
			<th>Qty</th>
			<th>Potongan</th>
			<th>Aksi</th>
		</tr>
		<?php

        while ($row = $view->fetch_array()) { ?>

		<tr>
			<td> <?= $row['id'] ?> </td>
			<td><?= $row['barang'] ?></td>
			<td><?= $row['qty'] ?></td>
			<td><?= $row['potongan'] ?></td>
			<td>
				<a href="/dis_barang_edit.php?id=<?= $row['id'] ?>">Edit</a> |
				<a href="/dis_barang_hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
			</td>
		</tr>

		<?php }
        ?>

	</table>
</div>
</body>
</html>