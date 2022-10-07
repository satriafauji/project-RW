<?php
session_start();
include('../koneksi.php');

// ambil data
$username = $_POST['username'];
$password = $_POST['password'];

// periksa username dan password
$query = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
$hasil = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($hasil);

// cek
if ($data_user != null) {
  // jika user dan password cocok
  $_SESSION['user'] = $data_user;
  header('Location: ../dasbor/dashboard.php');
} else {
  // jika user dan password tidak cocok
  echo "<script>window.alert('Username atau password salah'); window.location.href='../login'</script>";
}
