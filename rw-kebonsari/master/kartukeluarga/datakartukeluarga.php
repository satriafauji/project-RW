<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
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
      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
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
                  <h1>Data Kartu Keluarga</h1>
              <div>
              <div class="card">
                <div class="card-header">
                  <a class="btn btn-primary" href="buatdatakk.php" type="button">Tambah</a>
                  <a class="btn btn-primary" href="lihatdata.php" type="button">Lihat Data</a>
                  <a class="btn btn-primary" href="#" type="button">Refresh</a>
                  <a class="btn btn-primary" href="cetak.php" type="button">Cetak</a>
                </div>
              </div>

              <table id="tabel-data" class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Warga</th>
                    <th>L/P</th>
                    <th>Usia</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Kawin</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include "../../koneksi.php";
                    $sql = "SELECT * FROM warga";
                    $result = mysqli_query($db, $sql);

                    $no = 0;
                    while ($data = mysqli_fetch_array($result)) {
                      $no++;
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nik_warga']; ?></td>
                    <td><?php echo $data['nama_warga']; ?></td>
                    <td><?php echo $data['jenis_kelamin_warga']; ?></td>
                    <td></td>
                    <td><?php echo $data['pendidikan_terakhir_warga']; ?></td>
                    <td><?php echo $data['pekerjaan_warga']; ?></td>
                    <td><?php echo $data['status_perkawinan_warga']; ?></td>
                    <td><?php echo $data['status_warga']; ?></td>
                    <td>
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="detailkk.php?id_warga=<?php echo $data['id_warga']; ?>">Detail</a></li>
                        <li><a class="dropdown-item" href="#">Cetak</a></li>
                        <li><a class="dropdown-item" href="ubahdatakk.php?id_warga=<?php echo $data['id_warga']; ?>">Ubah</a></li>
                        <li><a class="dropdown-item" href="ubahdatawarga.php?id_warga=<?php echo $data['id_warga']; ?>">Ubah Anggota</a></li>
                        <li><a class="dropdown-item" href="hapusdata.php?id_warga=<?php echo $data['id_warga']; ?>">Hapus</a></li>
                      </ul>
                    </div>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
              </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#tabel-data').DataTable();
      });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>