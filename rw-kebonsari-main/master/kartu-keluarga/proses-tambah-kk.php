<?php
session_start();
include('../../koneksi.php');
if (isset($_POST['simpan'])) {
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

    $query_result = mysqli_query($db,"INSERT INTO keluarga (id_warga,no_kk,alamat_keluarga,desa_kelurahan_keluarga,kecamatan_keluarga,kabupaten_kota_keluarga,provinsi_keluarga,negara_keluarga,rt_keluarga,rw_keluarga,kode_pos_keluarga) VALUES('$id_warga','$no_kk','$alamat_keluarga','$desa_kelurahan_keluarga','$kecamatan_keluarga','$kabupaten_kota_keluarga','$provinsi_keluarga','$negara_keluarga','$rt_keluarga','$rw_keluarga','$kode_pos_keluarga')");

    if ($query_result) {
        echo "<script>alert('Data Kartu Keluarga Berhasil Disimpan'); window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data Kartu Keluarga Gagal Disimpan'); window.location.href='tambah-data-kk.php'</script>";
    }
}
?>