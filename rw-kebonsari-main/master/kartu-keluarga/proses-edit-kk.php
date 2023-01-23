<?php
session_start();
include('../../koneksi.php');
if (isset($_POST['edit'])) {
    $id_keluarga = $_POST['id_keluarga'];
    $id_warga = $_POST['id_warga'];
    $no_kk = $_POST['no_kk'];
    $alamat_keluarga = $_POST['alamat_keluarga'];
    $desa_kelurahan_keluarga = $_POST['desa_kelurahan_keluarga'];
    $kecamatan_keluarga = $_POST['kecamatan_keluarga'];
    $kabupaten_kota_keluarga = $_POST['kabupaten_kota_keluarga'];
    $provinsi_keluarga = $_POST['provinsi_keluarga'];
    $negara_keluarga = $_POST['negara_keluarga'];
    $rt_keluarga = $_POST['rt_keluarga'];
    $rw_keluarga = $_POST['rw_keluarga'];
    $kode_pos_keluarga = $_POST['kode_pos_keluarga'];

    $query_result = mysqli_query($db,"UPDATE keluarga SET id_warga='$id_warga', no_kk='$no_kk', alamat_keluarga='$alamat_keluarga',
    desa_kelurahan_keluarga='$desa_kelurahan_keluarga', kecamatan_keluarga='$kecamatan_keluarga', kabupaten_kota_keluarga='$kabupaten_kota_keluarga',
    provinsi_keluarga='$provinsi_keluarga', negara_keluarga='$negara_keluarga', rt_keluarga='$rt_keluarga', rw_keluarga='$rw_keluarga',
    kode_pos_keluarga='$kode_pos_keluarga' WHERE id_keluarga=$id_keluarga");

    if ($query_result) {
        echo "<script>alert('Data Kartu Keluarga Berhasil Di edit'); window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data Kartu Keluarga Gagal Di edit'); window.location.href='edit-data-kk.php?id_keluarga=$id_keluarga'</script>";
    }
}
?>