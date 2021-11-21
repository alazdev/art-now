<?php

$ambil = $koneksi->query("SELECT * FROM arsitek WHERE id_arsitek='$_GET[id]'");

$koneksi->query("DELETE  FROM arsitek WHERE id_arsitek='$_GET[id]'");
echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='index.php?halaman=arsitek';</script>";

?>
