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
                    <h2 class="page-header">Data Warga</h2>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Warga</h5>
                    </div>
                    <div class="card-body">
                        <div class="title-detail-group mb-3">
                            <h6>A. Data Pribadi</h6>
                        </div>
                        <table class="table table-striped table-middle">
                            <tbody>
                                <tr>
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
                                    <td><?php echo date('d F Y', strtotime($data['tanggal_lahir_warga'])); ?></td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td>:</td>
                                    <td>
                                        <?php
                                            $tanggal_lahir = new DateTime($data['tanggal_lahir_warga']);
                                            $today = new DateTime();

                                            $years = $today->diff($tanggal_lahir)->y;
                                            $month = $today->diff($tanggal_lahir)->m;
                                            $day = $today->diff($tanggal_lahir)->d;
                                            echo $years;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>:</td>
                                    <td>
                                    <?php
                                        if ($data['jenis_kelamin_warga'] == "L") {
                                            echo "Laki-Laki";
                                        } elseif ($data['jenis_kelamin_warga'] == "P") {
                                            echo "Perempuan";
                                        }
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="title-detail-group mb-3">
                            <h6>B. Data Alamat</h6>
                        </div>
                        <table class="table table-striped table-middle">
                            <tbody>
                                <tr>
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
                            </tbody>
                        </table>
                        <div class="title-detail-group mb-3">
                            <h6>C. Data Lainnya</h6>
                        </div>
                        <table class="table table-striped table-middle">
                            <tbody>
                                <tr>
                                    <th width="20%">Agama</th>
                                    <td width="1%">:</td>
                                    <td><?php echo $data['agama_warga']; ?></td>
                                </tr>
                                <tr>
                                    <th>Pendidikan Terakhir</th>
                                    <td>:</td>
                                    <td><?php echo $data['pendidikan_terakhir_warga']; ?></td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td>:</td>
                                    <td><?php echo $data['pekerjaan_warga']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status Perkawinan</th>
                                    <td>:</td>
                                    <td><?php echo $data['status_perkawinan_warga']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status Tinggal</th>
                                    <td>:</td>
                                    <td><?php echo $data['status_warga']; ?></td>
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