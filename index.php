<?php
session_start();

// print_r($_SESSION);

//fungsi dari membatasi hak akses

if (isset($_SESSION['userid'])) {
    if ($_SESSION['role_id'] == 2) {
        //redirect ke halaman kasir.php
        header('Location:kasir.php');
    }
} else {
    $_SESSION['error'] = 'Anda harus login dahulu';
    header('location:login.php');
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Kasir V1</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Selamat datang</h1>
	<a href="/barang.php">Barang</a> |
	<a href="/role.php">Role</a> |
	<a href="/user.php">User</a> |
	<a href="/dis_barang.php">Diskon Barang</a> |
	<a href="logout.php">Logout</a>
</div>
</body>
</html>