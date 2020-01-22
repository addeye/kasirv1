
<?php 

include 'config.php';
session_start();

$view = $dbconnect->query("SELECT * FROM role");

?>

<!DOCTYPE html>
<html>
<head>
	<title>List Barang</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">

	<?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

		<div class="alert alert-success" role="alert">
			<?=$_SESSION['success']?>
		</div>

	<?php 
		} 
		$_SESSION['success'] = '';
	?>

	<h1>List Role</h1>

	<a href="/role_add.php" class="btn btn-primary">Tambah data</a>

	<table class="table table-bordered">
		<tr>
			<th>ID Role</th>
			<th>Nama</th>
			<th>Aksi</th>
		</tr>
		<?php

		while ($row = $view->fetch_array()) { ?>

		<tr>
			<td> <?= $row['id_role'] ?> </td>
			<td><?= $row['nama'] ?></td>
			<td>
				<a href="/role_edit.php?id=<?= $row['id_role'] ?>">Edit</a> |
				<a href="/role_hapus.php?id=<?= $row['id_role'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
			</td>
		</tr>
			
		<?php }
		?>
		
	</table>
</div>
</body>
</html>