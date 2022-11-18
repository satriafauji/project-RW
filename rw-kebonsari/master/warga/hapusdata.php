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
  echo "<script>window.location.href='datawarga.php'</script>";
} else {
  echo "gagal";
}
