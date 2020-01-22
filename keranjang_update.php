<?php
include 'config.php';
session_start();
include "authcheckkasir.php";

$qty = $_POST['qty'];
// print_r($qty);

foreach ($_SESSION['cart'] as $key => $value) {

	$_SESSION['cart'][$key]['qty'] = $qty[$key];
	
}
header('location:kasir.php');
?>