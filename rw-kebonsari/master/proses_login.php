<?php
// session_start();
// include('../koneksi.php');

// $username_user = htmlspecialchars($_POST['username_user']);
// $password_user = md5(htmlspecialchars($_POST['password_user']));

// $cek_query = mysqli_query($db,"SELECT * FROM user WHERE username_user='$username_user' AND password_user='$password_user'");

// if (mysqli_num_rows($cek_query) > 0) {
//   $result = mysqli_fetch_array($cek_query);
//   session_start();
//   $_SESSION['login'] = 'OK';
//   $_SESSION['username_user'] = $result['username_user'];

//   header("Location:dasbor/dashboard.php");
// } else {
//   echo "Username atau password salah";
// }

session_start();
include '../koneksi.php';
$username = $_POST['username_user'];
$password = $_POST['password_user'];

$query = mysqli_query($db, "SELECT * FROM user WHERE username_user='$username' AND password_user=md5('$password')");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['username'] = $data['username_user'];
        $_SESSION['id_user'] = $data['id_user'];
        header("Location:dasbor/dashboard.php");
    } else {
      header("Location: login.php");
    }

?>
