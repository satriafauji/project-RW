<?php
    include 'koneksi.php';

    $id_pegawai = $_POST["id_pegawai"];
    $nama_pegawai = $_POST["nama_pegawai"];
    $umur = $_POST["umur"];
    $alamat = $_POST["alamat"];

    $dataArr = array(
        'id_pegawai' => $id_pegawai, 
        'nama_pegawai' => $nama_pegawai,
        'umur' => $umur, 
        'alamat' => $alamat, 
    );

    if (UpdateData($dataArr) == 1) {
        echo "Update Berhasil";
        header("Location: index.php", true, 301);
        exit();
    } else {
        echo "Gagal Insert Data";
        header("Location: halaman_edit.php", true, 301);
        exit();
    }