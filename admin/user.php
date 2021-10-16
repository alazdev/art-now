<h2>Data User </h2>

<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Password</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Telepon</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $ambil = $koneksi->query("SELECT * FROM user"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?> 
		<tr>
			<th><?php echo $no;?></th>
			<th><?php echo $pecah['nama_user'];?></th>
			<th><?php echo $pecah['email'];?></th>
			<th><?php echo $pecah['password'];?></th>
			<th><?php echo $pecah['jenis_kelamin'];?></th>
			<th><?php echo $pecah['tgl_lahir'];?></th>
			<th><?php echo $pecah['no_tlp'];?></th>
			<th>
				<img src="../gambar/<?php echo $pecah['gambar'];?>" width="100">
			</th>
			<th>
				<a href="index.php?halaman=hapususer&id=<?php echo $pecah['id_user'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=edituser&id=<?php echo $pecah['id_user'];?>" class="btn-warning btn">Edit</a>
			</th>
		</tr>
		<?php $no++;?>
	<?php }?>
	</tbody>
</table>
		<a href="index.php?halaman=tambahuser" class="btn btn-primary">Tambah User</a>