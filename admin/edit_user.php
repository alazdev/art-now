<h2>Edit Produk</h2>

<?php

$ambil = $koneksi->query("SELECT * FROM user WHERE id_user='$_GET[id]'");
$pecah = $ambil-> fetch_assoc();

?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama User</label>
		<input type="text" name="nama_user" class="form-control" value="<?php echo $pecah['nama_user'];?>"readonly>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email " class="form-control" value="<?php echo $pecah['email'];?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" class="form-control" value="<?php echo $pecah['password'];?>">
	</div>
    <div class="form-group">
		<label>Jenis Kelamin</label>
		<input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $pecah['jenis_kelamin'];?>"readonly>
	</div>
	<div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $pecah['tgl_lahir'];?>">
	</div>
	<div class="form-group">
		<label>No HP</label>
		<input type="text" name="no_hp" class="form-control" value="<?php echo $pecah['no_hp'];?>">
	</div>
	<div class="form-group">
		<img src="../gambar/<?php echo $pecah['gambar'];?>" width="100">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php

if (isset($_POST['ubah'])) {
	
	$nama_foto = $_FILES['gambar']['name'];
	$lokasi_foto = $_FILES['gambar']['tmp_name'];

	if (!empty($lokasi_foto)) {
		move_uploaded_file($lokasi_foto, "../gambar/$nama_foto");

		$koneksi->query("UPDATE user SET nama_user='$_POST[nama_user]',email='$_POST[email]',password='$_POST[password]',jenis_kelamin='$_POST[jenis_kelamin]',tgl_lahir='$_POST[tgl_lahir]',no_hp='$_POST[no_hp]',gambar='$nama_foto' WHERE id_user='$_GET[id]'");
	}else{
		$koneksi->query("UPDATE user SET nama_user='$_POST[nama_user]',email='$_POST[email]',gambar='$nama_foto' WHERE id_user='$_GET[id]'");
	}
	echo "<script>alert('Data Telah Diubah');</script>";
	echo "<script>location='index.php?halaman=user'</script>";
}

?>