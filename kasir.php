<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

$barang = mysqli_query($dbconnect, 'SELECT * FROM barang');
// print_r($_SESSION);

$sum = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $sum += ($value['harga'] * $value['qty']) - $value['diskon'];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Kasir</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Kasir</h1>
			<h2>Hai <?=$_SESSION['nama']?></h2>
			<a href="logout.php">Logout</a> |
			<a href="keranjang_reset.php">Reset Keranjang</a> |
			<a href="riwayat.php">Riwayat Transaksi</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-8">
			<form method="post" action="keranjang_act.php">
				<div class="form-group">
					<input type="text" name="kode_barang" class="form-control" placeholder="Masukkan Kode Barang" autofocus>
				</div>
			</form>
			<br>
			<form method="post" action="keranjang_update.php">
			<table class="table table-bordered">
				<tr>
					<th>Nama</th>
					<th>Harga</th>
					<th>Qty</th>
					<th>Sub Total</th>
					<th></th>
				</tr>
				<?php if (isset($_SESSION['cart'])): ?>
				<?php foreach ($_SESSION['cart'] as $key => $value) { ?>
					<tr>
						<td>
							<?=$value['nama']?>
							<?php if ($value['diskon'] > 0): ?>
								<br><small class="label label-danger">Diskon <?=number_format($value['diskon'])?></small>
							<?php endif;?>
						</td>
						<td align="right"><?=number_format($value['harga'])?></td>
						<td class="col-md-2">
							<input type="number" name="qty[<?=$key?>]" value="<?=$value['qty']?>" class="form-control">
						</td>
						<td align="right"><?=number_format(($value['qty'] * $value['harga'])-$value['diskon'])?></td>
						<td><a href="keranjang_hapus.php?id=<?=$value['id']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
					</tr>
				<?php } ?>
				<?php endif; ?>
			</table>
			<button type="submit" class="btn btn-success">Perbaruhi</button>
			</form>
		</div>
		<div class="col-md-4">
			<h3>Total Rp. <?=number_format($sum)?></h3>
			<form action="transaksi_act.php" method="POST">
				<input type="hidden" name="total" value="<?=$sum?>">
			<div class="form-group">
				<label>Bayar</label>
				<input type="text" id="bayar" name="bayar" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Selesai</button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">

	//inisialisasi inputan
	var bayar = document.getElementById('bayar');

	bayar.addEventListener('keyup', function (e) {
        bayar.value = formatRupiah(this.value, 'Rp. ');
        // harga = cleanRupiah(dengan_rupiah.value);
        // calculate(harga,service.value);
    });

    //generate dari inputan angka menjadi format rupiah

	function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    //generate dari inputan rupiah menjadi angka

    function cleanRupiah(rupiah) {
        var clean = rupiah.replace(/\D/g, '');
        return clean;
        // console.log(clean);
    }
</script>
</body>
</html>