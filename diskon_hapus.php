
<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];

	mysqli_query($dbconnect, "DELETE FROM `diskon` WHERE id='$id' ");

	$_SESSION['success'] = 'Berhasil menghapus data';

	header("location:diskon.php");
}

?>