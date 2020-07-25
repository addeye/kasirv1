<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

if (isset($_POST['kode_barang'])) {
    $kode_barang = $_POST['kode_barang'];
    $qty = 1;

    //menampilkan data barang
    $data = mysqli_query($dbconnect, "SELECT * FROM barang WHERE kode_barang='$kode_barang'");
    $b = mysqli_fetch_assoc($data);

    //cek diskon barang
    $disbarang = mysqli_query($dbconnect, "SELECT * FROM disbarang WHERE barang_id='$b[id_barang]'");
    $disb = mysqli_fetch_assoc($disbarang);

    //cek jika di keranjang sudah ada barang yang masuk
    $key = array_search($b['id_barang'], array_column($_SESSION['cart'], 'id'));
	// return var_dump($key);

    if ($key !== false) {
        // return var_dump($_SESSION['cart']);

        //jika ada data yang sesuai di keranjang akan ditambahkan jumlah nya
        $c_qty = $_SESSION['cart'][$key]['qty'];
        $_SESSION['cart'][$key]['qty'] = $c_qty + 1;

        //cek jika ada potongan dan cek jumlah barang lebih besar sama dengan minimum order potongan
        if ($disb['qty'] && $_SESSION['cart'][$key]['qty'] >= $disb['qty']) {

            //cek kelipatan jumlah barang dengan batas minimum order
            $mod = $_SESSION['cart'][$key]['qty'] % $disb['qty'];

            if ($mod == 0) {

                //Jika benar jumlah barang kelipatan batas minimum order
                $d = $_SESSION['cart'][$key]['qty'] / $disb['qty'];
            } else {

                //Simpan jumlah potongan yang didapat
                $d = ($_SESSION['cart'][$key]['qty'] - $mod) / $disb['qty'];
            }

            //Simpan diskon dengan jumlah kelipatan dikali potongan barang
            $_SESSION['cart'][$key]['diskon'] = $d * $disb['potongan'];
        }
    } else {
        // return var_dump($b);
        //Jika tidak ada yang sesuai akan menjadi barang baru dikeranjang
        $barang = [
            'id' => $b['id_barang'],
            'nama' => $b['nama'],
            'harga' => $b['harga'],
            'qty' => $qty,
            'diskon' => 0,
        ];

        $_SESSION['cart'][] = $barang;

        //merubah urutan tampil pada keranjang
        // krsort($_SESSION['cart']);
    }

    header('location:kasir.php');
}
