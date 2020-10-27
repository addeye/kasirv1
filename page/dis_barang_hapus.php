
<?php

include '../config.php';
session_start();
include '../authcheck.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];

	mysqli_query($dbconnect, "DELETE FROM `disbarang` WHERE id='$id' ");

	$_SESSION['success'] = 'Berhasil menghapus data';

	header('location: index.php?page=dis_barang');
}

?>