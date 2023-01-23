<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:../login.php");
}
include "../../koneksi.php";
if (isset($_GET['id_keluarga'])) {
    $id_keluarga = $_GET['id_keluarga'];
  
    $query = mysqli_query($db, "SELECT * FROM keluarga k INNER JOIN warga w ON w.id_warga = k.id_warga WHERE k.id_keluarga=$id_keluarga");
    $data = mysqli_fetch_assoc($query);

    $query_jumlah_anggota = mysqli_query($db,"SELECT COUNT(*) AS total FROM anggota_keluarga WHERE id_keluarga = ".$data['id_keluarga']."");
    $jumlah_anggota = mysqli_fetch_assoc($query_jumlah_anggota);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>RW 06 Kebonsari</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../../assets/vendor/bootstrap/dist/css/bootstrap.min.css">
      <!-- Custom Master CSS -->
      <link rel="stylesheet" href="../../assets/css/master.css">
  </head>
  <body>
    <section class="pt-1 pb-1">
        <div class="title text-center mb-4">
            <h1>Rincian Kartu Keluarga RW 06 Kebonsari</h1>
        </div>
        <div class="title-detail-group mb-3">
            <h6>A. Data Rincian Kartu Keluarga</h6>
        </div>
        <table class="table table-striped table-middle">
            <tbody>
                <tr>
                    <th width="20%">Nomor KK</th>
                    <td width="1%">:</td>
                    <td><?php echo $data['no_kk']; ?></td>
                </tr>
                <tr>
                    <th width="20%">NIK Kepala Keluarga</th>
                    <td width="1%">:</td>
                    <td><?php echo $data['nik_warga']; ?></td>
                </tr>
                <tr>
                    <th>Nama Kepala Keluarga</th>
                    <td>:</td>
                    <td><?php echo $data['nama_warga']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Anggota Keluarga</th>
                    <td>:</td>
                    <td><?php echo $jumlah_anggota['total']; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="title-detail-group mb-3">
            <h6>B. Data Alamat Kartu Keluarga</h6>
        </div>
        <table class="table table-striped table-middle">
            <tbody>
                <tr>
                    <th width="20%">Alamat KK</th>
                    <td width="1%">:</td>
                    <td><?php echo $data['alamat_keluarga']; ?></td>
                </tr>
                <tr>
                    <th>Desa/Kelurahan</th>
                    <td>:</td>
                    <td><?php echo $data['desa_kelurahan_keluarga']; ?></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>:</td>
                    <td><?php echo $data['kecamatan_keluarga']; ?></td>
                </tr>
                <tr>
                    <th>Kabupaten/Kota</th>
                    <td>:</td>
                    <td><?php echo $data['kabupaten_kota_keluarga']; ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>:</td>
                    <td><?php echo $data['provinsi_keluarga']; ?></td>
                </tr>
                <tr>
                    <th>Negara</th>
                    <td>:</td>
                    <td><?php echo $data['negara_keluarga']; ?></td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td>:</td>
                    <td><?php echo $data['rt_keluarga']; ?></td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td>:</td>
                    <td><?php echo $data['rw_keluarga']; ?></td>
                </tr>
                <tr>
                    <th>Kode Pos</th>
                    <td>:</td>
                    <td><?php echo $data['kode_pos_keluarga']; ?></td>
                </tr>
            </tbody>
        </table>
    </section>

    <script>
        window.print();
    </script>
  </body>
</html>