<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan Transaksi.xls");
	?>
 
	<center>
		<h3>Laporan Transaksi</h3>
	</center>
 
	<table border="1">
		<tr>
            <th>No</th>
            <th>Nomor Transaksi</th>
            <th>Metode Transaksi</th>
            <th>Nomor Pembayaran/Rekening</th>
            <th>Total Dibayar</th>
            <th>Nama Pengguna</th>
            <th>Email Pengguna</th>
            <th>Telepon Pengguna</th>
            <th>Nama Arsitek</th>
            <th>Email Arsitek</th>
            <th>Telepon Arsitek</th>
            <th>Judul Produk</th>
            <th>Waktu</th>
		</tr>
        <?php $i = 1; foreach($data['transaksis'] as $transaksi) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $transaksi['nomor_transaksi']; ?></td>
                <td><?= $transaksi['metode_pembayaran']; ?></td>
                <td><?= $transaksi['nomor_pembayaran']; ?></td>
                <td>Rp <?= number_format($transaksi['total_dibayar'], 0, ',', '.'); ?></td>
                <td><?= $transaksi['nama_lengkap_pengguna']; ?></td>
                <td><?= $transaksi['email_pengguna']; ?></td>
                <td><?= $transaksi['telepon_pengguna']; ?></td>
                <td><?= $transaksi['nama_lengkap_arsitek']; ?></td>
                <td><?= $transaksi['email_arsitek']; ?></td>
                <td><?= $transaksi['telepon_arsitek']; ?></td>
                <td><?= $transaksi['judul_produk']; ?></td>
                <td><?= date('Y-m-d H:i', strtotime($transaksi['dibuat_pada']));?></td>
            </tr>
        <?php $i++; } ?>
	</table>
</body>
</html>