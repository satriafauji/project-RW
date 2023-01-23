<?php
include "../../koneksi.php";
if (isset($_POST['simpan'])) {
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

    $query_result = mysqli_query($db, "INSERT INTO warga(nik_warga,nama_warga,tempat_lahir_warga,tanggal_lahir_warga,jenis_kelamin_warga,alamat_ktp_warga,alamat_warga,desa_kelurahan_warga,kecamatan_warga,kabupaten_kota_warga,provinsi_warga,negara_warga,rt_warga,rw_warga,agama_warga,pendidikan_terakhir_warga,pekerjaan_warga,status_perkawinan_warga,status_warga) VALUES('$nik_warga','$nama_warga','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$alamat_ktp','$alamat_warga','$desa_kelurahan','$kecamatan','$kabupaten_kota','$provinsi','$negara','$rt','$rw','$agama','$pendidikan_terakhir','$pekerjaan','$status_kawin','$status_tinggal')");

    if ($query_result) {
      echo "<script>alert('Data Warga Berhasil Disimpan'); document.location.href='index.php'</script>";
    } else {
      echo "<script>alert('Data Warga Gagal Disimpan'); document.location.href='tambah-data-warga.php'</script>";
    }
}
?>