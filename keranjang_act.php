<?php
include 'config.php';
session_start();
include "authcheckkasir.php";

if(isset($_POST['id_barang']))
{
	$id_barang = $_POST['id_barang'];
	$qty = $_POST['qty'];

	$data = mysqli_query($dbconnect,"SELECT * FROM barang WHERE id_barang='$id_barang'");
	// echo var_dump($data);
	// return false;
	$b = mysqli_fetch_assoc($data);

	$barang = [
		'id' => $b['id_barang'],
		'nama' => $b['nama'],
		'harga' => $b['harga'],
		'qty' => $qty
	];

	$_SESSION['cart'][]=$barang;
	
	krsort($_SESSION['cart']);

	header('location:kasir.php');
}

?>