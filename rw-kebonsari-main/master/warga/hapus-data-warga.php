<?php
session_start();

include('../../koneksi.php');

// ambil data dari form
$id_warga = $_GET['id_warga'];

// delete database
$query = "DELETE FROM warga WHERE id_warga = $id_warga";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>alert('Data Warga Berhasil Dihapus'); window.location.href='index.php'</script>";
} else {
  echo "<script>alert('Data Warga Gagal Dihapus'); window.location.href='index.php'</script>";
}
