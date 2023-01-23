<?php
session_start();
include "../../koneksi.php";
if (isset($_POST['simpan'])) {
    $nama_user = $_POST['nama_user'];
    $username_user = $_POST['username_user'];
    $password_user = md5($_POST['password_user']);
    $email_user = $_POST['email_user'];
    $role = $_POST['role'];

    $query = mysqli_query($db, "INSERT INTO user (nama_user,username_user,password_user,email_user,role) VALUES('$nama_user','$username_user','$password_user','$email_user','$role')");

    if ($query) {
        echo "<script>alert('Data User Berhasil Disimpan'); window.location.href='index.php'</script>";
    } else {
        echo "Data User Gagal Disimpan";
    }
}
?>