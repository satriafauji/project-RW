<?php

function koneksiDB() {
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "crud";

    $conn = mysqli_connect($host, $username, $password, $db);
    
    if(!$conn) {
        die("Koneksi Database Gagal : " .mysqli_connect_error());
    } else {
        return $conn;
    }
}

function selectAllData() {
    $query = "SELECT * FROM tb_barang";
    $result = mysqli_query(koneksiDB(), $query);
    return $result;
}

function selectDataDetail($kode) {
    $query = "SELECT * FROM tb_barang WHERE id_pegawai ='$kode'";
    $result = mysqli_query(koneksiDB(), $query);
    return $result;
}

function insertData($data) {
    $query = "INSERT INTO tb_barang VALUES ('".$data['id_pegawai']. "','" . $data['nama_pegawai'] . "',
        '" . $data['umur'] . "', '" . $data['alamat'] . "') ";

    $result = mysqli_query(koneksiDB(), $query);

    if (!$result) {
        return 0;
    } else {
        return 1;
    }
}

function UpdateData($data) {
    $query = "UPDATE tb_barang SET
        nama_pegawai = '" . $data['nama_pegawai'] . "',
        umur = '" . $data['umur'] . "', 
        alamat = '" . $data['alamat'] . "'
        WHERE id_pegawai = '" . $data['id_pegawai'] . "'";

    $result = mysqli_query(koneksiDB(), $query);

    if (!$result) {
        return 0;
    } else {
        return 1;
    }
}

function deleteData($kode) {
    $query = "DELETE FROM tb_barang WHERE id_pegawai = '$kode'";
    $result = mysqli_query(koneksiDB(), $query);

    if (!$result) {
        return 0;
    } else {
        return 1;
    }
}


// echo "<pre>";
// print_r(mysqli_fetch_assoc(selectAllData()));
// echo "</pre>";

// echo "<pre>";
// print_r(koneksiDB());
// echo "</pre>";
?>