<?php
include 'config.php';
session_start();
// include "authcheckkasir.php";

$return_arr = array();
$term = $_GET["term"];

$fetch = mysqli_query($dbconnect,"SELECT * FROM barang WHERE nama LIKE '%$term%'"); 

while ($row = mysqli_fetch_array($fetch)) {
    $row_array['id'] = $row['id'];
    $row_array['label'] = $row['nama'];
    $row_array['desc'] = $row['harga'];
    $row_array['value'] = $row['nama'];

    array_push($return_arr,$row_array);   
}

echo json_encode($return_arr);