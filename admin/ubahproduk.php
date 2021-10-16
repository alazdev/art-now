<h2>Edit Produk</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil-> fetch_assoc();

?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<img src="../gambar/<?php echo $pecah['gambar'];?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga'];?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" rows="10" name="desk">
			<?php echo $pecah['desk'];?>
		</textarea>
	</div>
	<div class="form-group">
		<label>Nama Desain</label>
		<input type="text" name="judul_desain" class="form-control" value="<?php echo $pecah['judul_desain'];?>">
	</div>
	<div class="form-group">
		<label>Nama Arsitek</label>
		<input type="text" name="nama_arsitek" class="form-control" value="<?php echo $pecah['nama_arsitek'];?>"readonly>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php

if (isset($_POST['ubah'])) {
	
	$nama_foto = $_FILES['gambar']['name'];
	$lokasi_foto = $_FILES['gambar']['tmp_name'];

	if (!empty($lokasi_foto)) {
		move_uploaded_file($lokasi_foto, "../gambar/$nama_foto");

		$koneksi->query("UPDATE produk SET gambar='$nama_foto',harga='$_POST[harga]',desk='$_POST[desk]',judul_desain='$_POST[judul_desain]',nama_arsitek='$_POST[nama_arsitek]' WHERE id_produk='$_GET[id]'");
	}else{
		$koneksi->query("UPDATE produk SET gambar='$nama_foto',harga='$_POST[harga]',desk='$_POST[desk]' WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('Data Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=produk'</script>";
}

?>