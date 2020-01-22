
<?php 

include 'config.php';
session_start();

include 'authcheck.php';

$view = $dbconnect->query("SELECT u.*,r.nama as nama_role FROM user as u INNER JOIN role as r ON u.role_id=r.id_role");

?>

<!DOCTYPE html>
<html>
<head>
	<title>List User</title>
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

	<h1>List User</h1>

	<a href="/user_add.php" class="btn btn-primary">Tambah data</a>

	<table class="table table-bordered">
		<tr>
			<th>ID User</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Role Akses</th>
			<th>Aksi</th>
		</tr>
		<?php

		while ($row = $view->fetch_array()) { ?>

		<tr>
			<td> <?= $row['id_user'] ?> </td>
			<td><?= $row['nama'] ?></td>
			<td><?=$row['username']?></td>
			<td><?=$row['password']?></td>
			<td><?=$row['nama_role']?></td>
			<td>
				<a href="/user_edit.php?id=<?= $row['id_user'] ?>">Edit</a> |
				<a href="/user_hapus.php?id=<?= $row['id_user'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
			</td>
		</tr>
			
		<?php }
		?>
		
	</table>
</div>
</body>
</html>