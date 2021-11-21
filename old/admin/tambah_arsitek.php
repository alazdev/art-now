<h2>Tambah Arsitek</h2>
<?php include '../conn.php'; ?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Arsitek</label>
		<input type="text" name="nama_arsitek" class="form-control">
	</div>
	<div class="form-group">
		<label>Foto Arsitek</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<div class="form-group">
		<label>No Telepon</label>
		<input type="text" name="no_tlp"  class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>No Rek</label>
		<input type="text" name="no_rek" class="form-control">
	</div>
	<button  type="submit"  class="btn btn-primary" name="save">Simpan</button>
	
</form>
<?php 
if (isset($_POST['save'])) {
	$nama = $_FILES['gambar']['name'];
	$lokasi= $_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi, "../gambar/".$nama);
	$koneksi->query("INSERT INTO arsitek(nama_arsitek,gambar,no_tlp,email,no_rek )
     VALUES ('$_POST[nama_arsitek]','$nama','$_POST[no_tlp]','$_POST[email]','$_POST[no_rek]')" );
	echo "<script>alert('Data Tersimpan');</script>";
   	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=arsitek'>";
}
?>

	