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
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- Custom Master CSS -->
      <link rel="stylesheet" href="../../assets/css/master.css">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <?php include('../../layouts/master/sidebar.php'); ?>
            </div>
            <div class="col py-3">
                <div class="title mb-4">
                    <h1 class="page-header">Data Kartu Keluarga</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Kartu Keluarga</h5>
                    </div>
                    <div class="card-body">
                        <div class="title-detail-group mb-3">
                            <h4>A. Data Rincian Kartu Keluarga</h4>
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
                            </tbody>
                        </table>
                        <div class="title-detail-group mb-3">
                            <h4>B. Data Alamat Kartu Keluarga</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>