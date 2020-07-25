
<?php

include '../config.php';
session_start();
include '../authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($dbconnect, "DELETE FROM `barang` WHERE id_barang='$id' ");

    $_SESSION['success'] = 'Berhasil menghapus data';

    header('location: index.php?page=barang');
}

?>