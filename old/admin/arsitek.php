<h2>Data Arsitek </h2>

<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Arsitek</th>
			<th>Telepon</th>
			<th>Email</th>
			<th>No Rekening</th>
			<th>Foto</th>
			<th>Aksi</th>
			
    	</tr>
	</thead>
	<tbody>
		<?php $no=1;?>
		<?php $ambil = $koneksi->query("SELECT * FROM arsitek"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {?> 
		<tr>
			<th><?php echo $no;?></th>
			<th><?php echo $pecah['nama_arsitek'];?></th>
			<th><?php echo $pecah['no_tlp'];?></th>
			<th><?php echo $pecah['email'];?></th>
            <th><?php echo $pecah['no_rek'];?></th>
			<th>
				<img src="../gambar/<?php echo $pecah['gambar'];?>" width="100">
			</th>
			<th>
				<a href="index.php?halaman=hapusarsitek&id=<?php echo $pecah['id_arsitek'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=editarsitek&id=<?php echo $pecah['id_arsitek'];?>" class="btn-warning btn">Edit</a>
			</th>
		</tr>
		<?php $no++;?>
	<?php }?>
	</tbody>
</table>
		<a href="index.php?halaman=tambaharsitek" class="btn btn-primary">Tambah Arsitek</a>