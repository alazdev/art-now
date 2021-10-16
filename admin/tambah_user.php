<h2>Tambah User</h2>
<?php include '../conn.php'; ?>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama User</label>
		<input type="text" name="nama_user" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Pasword</label>
		<input type="text" name="password"  class="form-control">
	</div>
    <div class="form-group">
    <label>Jenis Kelamin</label><br>
		<input type="radio" name="jenis_kelamin" value="laki">Laki-Laki<br>
		<input type="radio" name="jenis_kelamin" value="perempuan">Perempuan<br>
	</div>
    <div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" name="tgl_lahir"  class="form-control">
	</div>
    <div class="form-group">
		<label>No Telepon</label>
		<input type="text" name="no_tlp"  class="form-control">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<button  type="submit"  class="btn btn-primary" name="save">Simpan</button>
	
</form>
<?php 
if (isset($_POST['save'])) {
	$nama = $_FILES['gambar']['name'];
	$lokasi= $_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi, "../foto/".$nama);
	$koneksi->query("INSERT INTO user(nama_user,email,password,jenis_kelamin,tgl_lahir,no_tlp,gambar )
     VALUES ('$_POST[nama_user]','$_POST[email]','$_POST[password]','$_POST[jenis_kelamin]','$_POST[tgl_lahir]',
	 '$_POST[no_tlp]','$nama')" );
	echo "<script>alert('Data Tersimpan');</script>";
   	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=user'>";
}
?>

	