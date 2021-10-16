<h2>Tambah produk</h2>
<?php include '../conn.php'; ?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea type="text" name="desk" rows="3" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>Nama Desain</label>
		<input type="text" name="judul_desain" class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Arsitek</label>
		<input type="text" name="nama_arsitek"  class="form-control">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>

</form>
<?php 
if (isset($_POST['save'])) {
	$nama = $_FILES['gambar']['name'];
	$lokasi= $_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi, "../gambar/".$nama);
	
	$koneksi->query("INSERT INTO produk( harga, desk, judul_desain,gambar,nama_arsitek) 
		VALUES ('$_POST[harga]','$_POST[desk]','$_POST[judul_desain]','$nama' ,'$_POST[nama_arsitek]')" );
	echo "<script>alert('Data Tersimpan');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}
?>
