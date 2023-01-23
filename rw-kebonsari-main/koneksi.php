<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
//mysqli_report(MYSQLI_REPORT_ERROR);

$host = "localhost";
$user = "root";
$pass = "";
$database = "db_warga_bonsar";

$db = new mysqli($host, $user, $pass, $database);

if (!$db) {
    die("Koneksi gagal ke database. ". $db->error);
}