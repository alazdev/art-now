<?php

$ambil = $koneksi->query("SELECT * FROM user WHERE id_user='$_GET[id]'");

$koneksi->query("DELETE  FROM user WHERE id_user='$_GET[id]'");
echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='index.php?halaman=user';</script>";

?>
