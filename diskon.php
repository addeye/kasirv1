
<?php

include 'config.php';
session_start();

$view = $dbconnect->query('SELECT * FROM diskon');

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

	<h1>List Diskon</h1>

	<a href="/diskon_add.php" class="btn btn-primary">Tambah data</a>

	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Batas</th>
			<th>Potongan</th>
			<th>Aksi</th>
		</tr>
		<?php

        while ($row = $view->fetch_array()) { ?>

		<tr>
			<td> <?= $row['id'] ?> </td>
			<td><?= $row['nama'] ?></td>
			<td><?= $row['batas'] ?></td>
			<td><?= $row['potongan'] ?></td>
			<td>
				<a href="/diskon_edit.php?id=<?= $row['id'] ?>">Edit</a> |
				<a href="/diskon_hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
			</td>
		</tr>

		<?php }
        ?>

	</table>
</div>
</body>
</html>