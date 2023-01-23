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
      <title>RW 06 Kebonsari</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../../assets/vendor/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- DataTables Bootstrap 5 -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
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
                    <a class="btn btn-sm btn-primary" href="tambah-data-warga.php">Tambah</a>
                    <a class="btn btn-sm btn-primary" href="#refresh" id="refresh">Refresh</a>
                    <a class="btn btn-sm btn-primary" href="cetak-data-warga.php" target="_blank">Cetak</a>
                  </div>
                  <div class="card-body">
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
                          <td><?php echo $data['pendidikan_terakhir_warga']; ?></td>
                          <td><?php echo $data['pekerjaan_warga']; ?></td>
                          <td><?php echo $data['status_perkawinan_warga']; ?></td>
                          <td><?php echo $data['status_warga']; ?></td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="detail-warga.php?id_warga=<?php echo $data['id_warga']; ?>">Detail</a></li>
                                <li><a class="dropdown-item" href="cetak-warga.php?id_warga=<?php echo $data['id_warga']; ?>" target="_blank">Cetak</a></li>
                                <li><a class="dropdown-item" href="edit-data-warga.php?id_warga=<?php echo $data['id_warga']; ?>">Ubah</a></li>
                                <li><a class="dropdown-item" href="hapus-data-warga.php?id_warga=<?php echo $data['id_warga']; ?>">Hapus</a></li>
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
        </div>
    </div>
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JQuery DataTables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
          $('#tabel-data').DataTable();
          $('#refresh').click(function() {
            location.reload();
          });
      });
    </script>
  </body>
</html>