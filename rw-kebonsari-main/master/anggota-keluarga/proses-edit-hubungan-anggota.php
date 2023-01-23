<?php
include "../../koneksi.php";
$id_anggota = $_GET['id_anggota'];
$id_keluarga = $_GET['id_keluarga'];
$hubungan_keluarga = $_GET['hubungan_keluarga'];

$query_edit = mysqli_query($db,"UPDATE anggota_keluarga SET hubungan_keluarga='$hubungan_keluarga' WHERE id_anggota='$id_anggota' AND id_keluarga='$id_keluarga'");

if ($query_edit) {
    echo "<script>alert('Edit Hubungan Keluarga Berhasil'); window.location.href='anggota-keluarga-kk.php?id_keluarga=$id_keluarga'</script>";
} else {
    echo "gagal";
}
?>