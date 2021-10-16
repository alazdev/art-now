<h2>Edit Produk</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM arsitek WHERE id_arsitek='$_GET[id]'");
$pecah = $ambil-> fetch_assoc();

?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Arsitek</label>
		<input type="text" name="nama_arsitek" class="form-control" value="<?php echo $pecah['nama_arsitek'];?>"readonly>
	</div>
    <div class="form-group">
		<img src="../gambar/<?php echo $pecah['gambar'];?>" width="100">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<div class="form-group">
		<label>No Telepon</label>
		<input type="text" name="no_tlp " class="form-control" value="<?php echo $pecah['no_tlp'];?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" value="<?php echo $pecah['email'];?>"readonly>
	</div>
    <div class="form-group">
		<label>No Rekening</label>
		<input type="text" name="no_rek" class="form-control" value="<?php echo $pecah['no_rek'];?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php

if (isset($_POST['ubah'])) {
	
	$nama_foto = $_FILES['gambar']['name'];
	$lokasi_foto = $_FILES['gambar']['tmp_name'];

	if (!empty($lokasi_foto)) {
		move_uploaded_file($lokasi_foto, "../gambar/$nama_foto");

		$koneksi->query("UPDATE arsitek SET nama_arsitek='$_POST[nama_arsitek]',gambar='$nama_foto',no_lp='$_POST[no_lp]',email='$_POST[email]',no_rek='$_POST[no_rek]' WHERE id_arsitek='$_GET[id]'");
	}else{
		$koneksi->query("UPDATE arsitek SET nama_arsitek='$_POST[nama_arsitek]',gambar='$nama_foto',no_lp='$_POST[no_lp]' WHERE id_arsitek='$_GET[id]'");
	}
	echo "<script>alert('Data Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=arsitek'</script>";
}

?>