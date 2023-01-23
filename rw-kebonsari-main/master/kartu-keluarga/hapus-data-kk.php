<?php
session_start();

include('../../koneksi.php');

// ambil data dari form
$id_keluarga = $_GET['id_keluarga'];

// delete database
$query = "DELETE FROM keluarga WHERE id_keluarga = $id_keluarga";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>alert('Data Kartu Keluarga Berhasil Dihapus'); window.location.href='index.php'</script>";
} else {
  echo "<script>alert('Data Kartu Keluarga Gagal Dihapus'); window.location.href='index.php'</script>";
}