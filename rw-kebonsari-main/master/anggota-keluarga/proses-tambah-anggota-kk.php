<?php
session_start();
include "../../koneksi.php";
if (isset($_POST['simpan'])) {
    $id_keluarga = $_POST['id_keluarga'];
    $id_warga = $_POST['id_warga'];
    $hubungan = $_POST['hubungan_keluarga'];

    $query_result = mysqli_query($db,"INSERT INTO anggota_keluarga(id_keluarga,id_warga,hubungan_keluarga) VALUES('$id_keluarga','$id_warga','$hubungan')");

    if ($query_result) {
        echo "<script>alert('Data Anggota KK Berhasil Disimpan'); window.location.href='anggota-keluarga-kk.php?id_keluarga=$id_keluarga'</script>";
    } else {
        echo "Gagal";
    }
}
?>