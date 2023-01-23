<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:../login.php");
}
include('../../koneksi.php');
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
        <div class="row flex-wrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
              <?php include('../../layouts/master/sidebar.php'); ?>
          </div>
          <div class="col py-3">
              <div class="title mb-4">
                  <h1 class="page-header">Data Kartu Keluarga</h1>
              </div>
              <div class="card">
                  <div class="card-header">
                      <a class="btn btn-sm btn-primary" href="tambah-data-kk.php">Tambah</a>
                      <a class="btn btn-sm btn-primary" href="#refresh" id="refresh">Refresh</a>
                      <a class="btn btn-sm btn-primary" href="cetak-data-kk.php" target="_blank">Cetak</a>
                  </div>
                  <div class="card-body">
                      <table id="tabel-data" class="table table-striped">
                          <thead>
                              <tr>
                                <th>No</th>
                                <th>Nomor KK</th>
                                <th>Nama Kepala</th>
                                <th>NIK Kepala</th>
                                <th>Jml. Anggota</th>
                                <th>Alamat</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                              $query = mysqli_query($db,"SELECT * FROM keluarga k INNER JOIN warga w ON w.id_warga = k.id_warga");
                              $no = 0;
                              while ($data = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                            <?php
                                $query_jumlah_anggota = mysqli_query($db,"SELECT COUNT(*) AS total FROM anggota_keluarga WHERE id_keluarga = ".$data['id_keluarga']."");
                                $jumlah_anggota = mysqli_fetch_assoc($query_jumlah_anggota);
                            ?>
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $data['no_kk']; ?></td>
                              <td><?php echo $data['nama_warga']; ?></td>
                              <td><?php echo $data['nik_warga']; ?></td>
                              <td><?php echo $jumlah_anggota['total']; ?></td>
                              <td><?php echo $data['alamat_keluarga'] ?></td>
                              <td><?php echo $data['rt_keluarga']; ?></td>
                              <td><?php echo $data['rw_keluarga']; ?></td>
                              <td>
                                <div class="dropdown">
                                  <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="detail-kk.php?id_keluarga=<?php echo $data['id_keluarga']; ?>">Detail</a></li>
                                    <li><a class="dropdown-item" href="cetak-kk.php?id_keluarga=<?php echo $data['id_keluarga']; ?>" target="_blank">Cetak</a></li>
                                    <li><a class="dropdown-item" href="edit-data-kk.php?id_keluarga=<?php echo $data['id_keluarga']; ?>">Ubah</a></li>
                                    <li><a class="dropdown-item" href="hapus-data-kk.php?id_keluarga=<?php echo $data['id_keluarga']; ?>">Hapus</a></li>
                                    <li><a class="dropdown-item" href="../anggota-keluarga/anggota-keluarga-kk.php?id_keluarga=<?php echo $data['id_keluarga']; ?>">Tambah Anggota</a></li>
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