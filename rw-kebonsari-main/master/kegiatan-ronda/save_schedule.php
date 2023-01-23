<?php
require_once('../../koneksi.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: Data Tidak Ada.'); location.replace('./') </script>";
    $db->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if (empty($id)) {
    $sql = "INSERT INTO schedule_list(title,description,start_datetime,end_datetime) VALUES('$title','$description','$start_datetime','$end_datetime')";
} else {
    $sql = "UPDATE schedule_list SET title='{$title}', description='{$description}', start_datetime='{$start_datetime}', end_datetime='{$end_datetime}' WHERE id='{$id}'";
}
$save = $db->query($sql);
if ($save) {
    echo "<script>alert('Jadwal Ronda Berhasil Disimpan'); location.replace('./')</script>";
} else {
    echo "<script>alert('Jadwal Ronda Gagal Disimpan'); location.replace('./')</script>";
}

$db->close();
?>