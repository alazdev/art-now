<h2>Data Produk</h2>

<a href="index.php?halaman=tambahproduk" class="btn-primary btn">Tambah Data</a>
<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Foto</th> 
			<th>Harga</th>
			<th>Deskripsi</th>
			<th>Nama Desain</th>
			<th>Nama Arsitek</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?> 
		<tr>
			<th><?php echo $no;?></th>
			<th>
				<img src="../gambar/<?php echo $pecah['gambar'];?>" width="100">
			</th>
			<th><?php echo $pecah['harga'];?></th>
			<th><?php echo $pecah['desk'];?></th>
			<th><?php echo $pecah['judul_desain'];?></th>
			<th><?php echo $pecah['nama_arsitek'];?></th>
			<th>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-warning btn">Edit</a>
			</th>
		</tr>
		<?php $no++;?>
	<?php }?>
	</tbody>
</table>
