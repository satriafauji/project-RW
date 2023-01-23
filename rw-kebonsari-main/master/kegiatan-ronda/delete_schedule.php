<?php 
require_once('../../koneksi.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Tidak Sesuai'); location.replace('./') </script>";
    $db->close();
    exit;
}

$delete = $db->query("DELETE FROM schedule_list where id = '{$_GET['id']}'");
if($delete){
    echo "<script> alert('Jadwal Ronda Berhasil Dihapus'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$db->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$db->close();

?>