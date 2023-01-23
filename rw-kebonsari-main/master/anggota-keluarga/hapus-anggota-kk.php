<?php
include "../../koneksi.php";

$id_anggota = $_GET['id_anggota'];
$id_keluarga = $_GET['id_keluarga'];

$query_result = mysqli_query($db, "DELETE FROM anggota_keluarga WHERE id_anggota=$id_anggota");

if ($query_result) {
    echo "<script>alert('Data Anggota KK Berhasil Dihapus'); window.location.href='anggota-keluarga-kk.php?id_keluarga=$id_keluarga'</script>";
}

?>