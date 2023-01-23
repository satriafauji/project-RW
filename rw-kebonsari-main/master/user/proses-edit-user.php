<?php
session_start();
include "../../koneksi.php";
if (isset($_POST['edit'])) {
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $username_user = $_POST['username_user'];
    $password_user = md5($_POST['password_user']);
    $email_user = $_POST['email_user'];
    $role = $_POST['role'];

    $query = mysqli_query($db, "UPDATE user SET nama_user='$nama_user', username_user='$username_user', password_user='$password_user', email_user='$email_user', role='$role' WHERE id_user='$id_user'");

    if ($query) {
        echo "<script>alert('Data User Berhasil Di edit'); window.location.href='index.php'</script>";
    } else {
        echo "Data User Gagal Diedit";
    }
}
?>