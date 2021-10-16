<h2>Data Pembelian</h2>

<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Arsitek</th>
			<th>Harga</th>
			<th>Tanggal</th>
			<th>Email</th>
			<th>No_Rek</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $ambil = $koneksi->query("SELECT * FROM transaksi JOIN user ON transaksi.id_user=user.id_user"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?> 
		<tr>
		
			<th><?php echo $no;?></th>
			<th><?php echo $pecah['nama_arsitek'];?></th>
			<th><?php echo $pecah['harga'];?></th>
			<th><?php echo $pecah['tanggal'];?></th>
			<th><?php echo $pecah['email'];?></th>
			<th><?php echo $pecah['no_rek'];?></th>
			<th><?php echo $pecah['status_pembelian'];?></th>
			<th>
				<a href="index.php?halaman=hapuspembelian&id=<?php echo $pecah['id_pembelian'];?>" class="btn-info btn">Hapus</a>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-info">Detail</a>

				<?php if ($pecah['status_pembelian']!=="pending"):?> 
					<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'];?> " class="btn btn-success">Lihat Pembayaran</a>
				<?php endif ?>

			</th>
		</tr>
		<?php $no++;?>
	<?php }?>
	</tbody>
</table>
