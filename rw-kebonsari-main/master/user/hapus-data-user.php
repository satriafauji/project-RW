<?php
session_start();

include('../../koneksi.php');

// ambil data dari form
$id_user = $_GET['id_user'];

// delete database
$query = "DELETE FROM user WHERE id_user = $id_user";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>alert('Data User Berhasil Dihapus'); window.location.href='index.php'</script>";
} else {
  echo "<script>alert('Data User Gagal Dihapus'); window.location.href='index.php'</script>";
}
