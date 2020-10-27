
<?php

include 'authcheck.php';

$view = $dbconnect->query("SELECT u.*,r.nama as nama_role FROM user as u INNER JOIN role as r ON u.role_id=r.id_role");

?>

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

	<a href="index.php?page=user_add" class="btn btn-primary">Tambah data</a>
	<hr>
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
				<a href="index.php?page=user_edit&id=<?= $row['id_user'] ?>">Edit</a> |
				<a href="/page/user_hapus.php?id=<?= $row['id_user'] ?>" onclick="return confirm('apakah anda yakin?')">Hapus</a>
			</td>
		</tr>

		<?php }
		?>

	</table>
</div>