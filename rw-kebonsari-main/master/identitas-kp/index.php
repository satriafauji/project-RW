<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
include "../../koneksi.php";
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
                    <h2 class="page-header">Identitas KP</h2>
                </div>
                <?php
                    $query = mysqli_query($db,"SELECT * FROM identitas_kp i INNER JOIN warga w ON w.id_warga = i.id_warga");
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                
                <div class="card">
                    <div class="card-header">
                        <a href="edit-data-identitas-kp.php?id_identitas_kp=<?php echo $row['id_identitas_kp']; ?>" class="btn btn-sm btn-warning">
                            Ubah Data KP
                        </a>
                        <a href="#!" class="btn btn-sm btn-success">
                            Peta Wilayah KP
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="bg-identitas" style="background: url('../../image_identitas/<?php echo $row['foto_kp'] ?>') rgba(31, 41, 55, 0.5);">
                            <div class="logo-identitas text-center text-white pt-5 pb-5">
                                <img src="../../image_identitas/<?php echo $row['logo_kp']; ?>" alt="Logo KP" class="img-fluid mb-3" width="200" height="200">
                                <h2>RW <?php echo $row['rw_kp'];  ?> <?php echo $row['nama_kp']; ?></h2>
                                <h3>Kec. <?php echo $row['kecamatan_kp'] ?> Kota. <?php echo $row['kota_kp'] ?> Prov. <?php echo $row['provinsi_kp']; ?></h3>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <div class="title-identitas-group mb-3">
                                <h6>A. DATA KP</h6>
                            </div>
                            <table class="table table-striped table-hover tabel-rincian">
                                <tbody>
                                    <tr>
                                        <th width="20%">Nama KP</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['nama_kp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Nama Ketua RW</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['nama_warga']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">NIK Ketua RW</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['nik_warga']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">E-Mail KP</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['email_kp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">No. Telepon</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['no_tlp_kp']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="title-identitas-group mb-3">
                                <h6>B. Data Alamat</h6>
                            </div>
                            <table class="table table-striped table-hover tabel-rincian">
                                <tbody>
                                <tr>
                                        <th width="20%">Alamat Kantor RW</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['alamat_kp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Kelurahan</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['kelurahan_kp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Kecamatan</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['kecamatan_kp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Kota</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['kota_kp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Provinsi</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['provinsi_kp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Kode Pos KP</th>
                                        <th width="1%">:</th>
                                        <td><?php echo $row['kode_pos_kp']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>