<?php
include "../../koneksi.php";
if (isset($_POST['edit'])) {
    $id_warga = $_POST['id_warga'];
    $nik_warga = $_POST['nik_warga'];
    $nama_warga = $_POST['nama_warga'];
    $tempat_lahir = $_POST['tempat_lahir_warga'];
    $tanggal_lahir = $_POST['tanggal_lahir_warga'];
    $jenis_kelamin = $_POST['jenis_kelamin_warga'];
    $alamat_ktp = $_POST['alamat_ktp_warga'];
    $alamat_warga = $_POST['alamat_warga'];
    $desa_kelurahan = $_POST['desa_kelurahan_warga'];
    $kecamatan = $_POST['kecamatan_warga'];
    $kabupaten_kota = $_POST['kabupaten_kota_warga'];
    $provinsi = $_POST['provinsi_warga'];
    $negara = $_POST['negara_warga'];
    $rt = $_POST['rt_warga'];
    $rw = $_POST['rw_warga'];
    $agama = $_POST['agama_warga'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir_warga'];
    $pekerjaan = $_POST['pekerjaan_warga'];
    $status_kawin = $_POST['status_perkawinan_warga'];
    $status_tinggal = $_POST['status_warga'];

    $query_result = mysqli_query($db,"UPDATE warga SET nik_warga='$nik_warga', nama_warga='$nama_warga', tempat_lahir_warga='$tempat_lahir', tanggal_lahir_warga='$tanggal_lahir', jenis_kelamin_warga='$jenis_kelamin', alamat_ktp_warga='$alamat_ktp', alamat_warga='$alamat_warga', desa_kelurahan_warga='$desa_kelurahan', kecamatan_warga='$kecamatan', kabupaten_kota_warga='$kabupaten_kota', provinsi_warga='$provinsi', negara_warga='$negara', rt_warga='$rt', rw_warga='$rw', agama_warga='$agama', pendidikan_terakhir_warga='$pendidikan_terakhir', pekerjaan_warga='$pekerjaan', status_perkawinan_warga='$status_kawin', status_warga='$status_tinggal' WHERE id_warga=$id_warga");

    if ($query_result) {
      echo "<script>alert('Data Warga Berhasil Di edit'); document.location.href='index.php'</script>";
    } else {
      echo "<script>alert('Data Warga Gagal Di edit'); document.location.href='edit-data-warga.php?id_warga=$id_warga'</script>";
    }
}
?>