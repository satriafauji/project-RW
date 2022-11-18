<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:../login.php");
}
include "../../koneksi.php";
if (isset($_GET['id_warga'])) {
    $id_warga = $_GET['id_warga'];

    $query = mysqli_query($db, "SELECT * FROM warga WHERE id_warga=$id_warga");
    $data = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Data Warga Kebon Sari</title>
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <?php include('../../layouts-master/sidebar.php'); ?>
            </div>
            <div class="col py-3">

            <div class="card mb-4">
                <h1 class="page-header">Data Warga</h1>
            <div>
            </div>
        </div>

        
        <h2>A. Data Pribadi</h2>
        <form action="proses-ubah-warga.php" method="post">
        <table class="table table-striped table-middle">
            <input type="hidden" name="id_warga" value="<?php echo $data['id_warga']; ?>">
            <tbody><tr>
                <th width="20%">NIK</th>
                <td width="1%">:</td>
                <td><?php echo $data['nik_warga']; ?></td>
            </tr>
            <tr>
                <th>Nama Warga</th>
                <td>:</td>
                <td><?php echo $data['nama_warga']; ?></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>:</td>
                <td><?php echo $data['tempat_lahir_warga']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>:</td>
                <td><?php echo $data['tanggal_lahir_warga']; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td>
                <?php echo $data['jenis_kelamin_warga']; ?>
                </td>
            </tr>
            </tbody></table>

            <h3>B. Data Alamat</h3>
            <table class="table table-striped table-middle">
                <tbody><tr>
                    <th width="20%">Alamat KTP</th>
                    <td width="1%">:</td>
                    <td><?php echo $data['alamat_ktp_warga']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><?php echo $data['alamat_warga']; ?></td>
                </tr>
                <tr>
                    <th>Desa/Kelurahan</th>
                    <td>:</td>
                    <td><?php echo $data['desa_kelurahan_warga']; ?></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>:</td>
                    <td><?php echo $data['kecamatan_warga']; ?></td>
                </tr>
                <tr>
                    <th>Kabupaten/Kota</th>
                    <td>:</td>
                    <td><?php echo $data['kabupaten_kota_warga']; ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>:</td>
                    <td><?php echo $data['provinsi_warga']; ?></td>
                </tr>
                <tr>
                    <th>Negara</th>
                    <td>:</td>
                    <td><?php echo $data['negara_warga']; ?></td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td>:</td>
                    <td><?php echo $data['rt_warga']; ?></td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td>:</td>
                    <td><?php echo $data['rw_warga']; ?></td>
                </tr>
                </tbody></table>

            <h4>C. Data Lain-lain</h4>
            <table class="table table-striped table-middle">
                <tbody><tr>
                    <th width="20%">Agama</th>
                    <td width="1%">:</td>
                    <td>
                    <?php echo $data['agama_warga']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir</th>
                    <td>:</td>
                    <td>
                    <?php echo $data['pendidikan_terakhir_warga']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>:</td>
                    <td><?php echo $data['pekerjaan_warga']; ?></td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>:</td>
                    <td>
                    <?php echo $data['status_perkawinan_warga']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Status Tinggal</th>
                    <td>:</td>
                    <td>
                    <?php echo $data['status_warga']; ?>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>


    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>