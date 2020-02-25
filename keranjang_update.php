<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

arsort($_SESSION['cart']);

$qty = $_POST['qty'];
$cart = $_SESSION['cart'];

// print_r($qty);

foreach ($cart as $key => $value) {
    $_SESSION['cart'][$key]['qty'] = $qty[$key];
}

header('location:kasir.php');
