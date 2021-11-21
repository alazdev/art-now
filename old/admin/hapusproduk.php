<?php
include "../conn.php";

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$gambar = $pecah['gambar'];
if (file_exists("../gambar/$gambar")) {

	unlink("../gambar/$gambar");
}
$koneksi->query("DELETE  FROM produk WHERE id_produk='$_GET[id]'");
echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

?>
