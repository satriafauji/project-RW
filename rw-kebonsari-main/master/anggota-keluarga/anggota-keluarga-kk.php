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
                    <h2 class="page-header">Data Keluarga</h2>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Anggota Keluarga</h5>
                    </div>
                    <div class="card-body">
                        <div class="title-form-group mb-3">
                            <h6>A. Rincian Keluarga</h6>
                        </div>
                        <table class="table table-striped table-middle table-anggota">
                            <tbody>
                                <tr>
                                    <th width="20%">Nomor Kartu Keluarga (KK)</th>
                                    <th width="1%">:</th>
                                    <td><?php echo $data['no_kk']; ?></td>
                                </tr>
                                <tr>
                                    <th width="20%">Kepala Keluarga</th>
                                    <th width="1%">:</th>
                                    <td><?php echo $data['nama_warga']; ?></td>
                                </tr>
                                <tr>
                                    <th width="20%">Alamat Keluarga</th>
                                    <th width="1%">:</th>
                                    <td><?php echo $data['alamat_keluarga']; ?> - RT <?php echo $data['rt_warga'] ?>, RW <?php echo $data['rw_warga']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="title-form-group mb-3">
                            <h6>B. Tambah Anggota Keluarga</h6>
                        </div>
                        <form action="proses-tambah-anggota-kk.php?id_keluarga=<?php echo $_GET['id_keluarga']; ?>" method="post" class="mb-3">
                            <table class="table table-striped table-middle table-anggota">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">Nama Anggota Keluarga</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td>
                                            <input type="hidden" name="id_keluarga" value="<?php echo $_GET['id_keluarga']; ?>">
                                            <select name="id_warga" class="form-select" required>
                                                <option value="">-- PILIH ANGGOTA --</option>
                                                <?php
                                                    $query = mysqli_query($db,"SELECT * FROM warga");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $row['id_warga']; ?>"><?php echo $row['nama_warga']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%" class="align-middle">Hubungan Keluarga</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td>
                                            <select name="hubungan_keluarga" class="form-select" required>
                                                <option value="">-- PILIH HUBUNGAN --</option>
                                                <option value="SUAMI">SUAMI</option>
                                                <option value="ISTRI">ISTRI</option>
                                                <option value="ANAK">ANAK</option>
                                                <option value="MENANTU">MENANTU</option>
                                                <option value="CUCU">CUCU</option>
                                                <option value="ORANGTUA">ORANGTUA</option>
                                                <option value="MERTUA">MERTUA</option>
                                                <option value="FAMILY LAIN">FAMILY LAIN</option>
                                                <option value="KEPALA KELUARGA">KEPALA KELUARGA</option>
                                                <option value="LAINNYA">LAINNYA</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="reset" name="reset" class="btn btn-sm btn-danger">Batal</button> 
                            <button type="submit" name="simpan" class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                        <div class="title-form-group mb-3">
                            <h6>C. Data Anggota Keluarga</h6>
                        </div>
                        <table id="tabel-data" class="table table-striped table-middle table-anggota">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>NIK Anggota</th>
                                    <th>Tempat & Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hubungan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($db,"SELECT * FROM warga w INNER JOIN anggota_keluarga ak ON ak.id_warga = w.id_warga WHERE ak.id_keluarga=$id_keluarga ORDER BY ak.id_anggota ASC");
                                    $no = 0;
                                    while ($row = mysqli_fetch_array($query)) {
                                        $no++;
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama_warga']; ?></td>
                                    <td><?php echo $row['nik_warga']; ?></td>
                                    <td><?php echo $row['tempat_lahir_warga'] ?>, <?php echo date('d F Y', strtotime($row['tanggal_lahir_warga'])); ?></td>
                                    <td>
                                        <?php
                                            if ($row['jenis_kelamin_warga'] == "L") {
                                                echo "Laki-Laki";
                                            } elseif ($row['jenis_kelamin_warga'] == "P") {
                                                echo "Perempuan";
                                            } 
                                        ?>
                                    </td>
                                    <td><?php echo $row['hubungan_keluarga']; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="../warga/detail-warga.php?id_warga=<?php echo $row['id_warga']; ?>">Detail</a></li>
                                                <li><a class="dropdown-item" href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id_anggota']; ?>">Ubah Hubungan</a></li>
                                                <li><a class="dropdown-item" href="hapus-anggota-kk.php?id_anggota=<?php echo $row['id_anggota']; ?>&id_keluarga=<?php echo $row['id_keluarga']; ?>">Hapus</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal<?php echo $row['id_anggota']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Hubungan Keluarga</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="proses-edit-hubungan-anggota.php" method="get">
                                                <div class="modal-body">
                                                    <?php
                                                        $id_anggota = $row['id_anggota'];
                                                        $id_keluarga = $row['id_keluarga'];
                                                        $query_edit = mysqli_query($db,"SELECT * FROM anggota_keluarga WHERE id_anggota='$id_anggota' AND id_keluarga='$id_keluarga'");
                                                        while ($data = mysqli_fetch_array($query_edit)) {
                                                    ?>
                                                    <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>">
                                                    <input type="hidden" name="id_keluarga" value="<?php echo $data['id_keluarga']; ?>">
                                                    <div class="form-group mb-3">
                                                        <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                                                        <select name="hubungan_keluarga" class="form-select" required>
                                                            <option value="">-- PILIH HUBUNGAN --</option>
                                                            <option value="SUAMI" <?= ($data['hubungan_keluarga'] == "SUAMI") ? "selected" : ""; ?>>SUAMI</option>
                                                            <option value="ISTRI" <?= ($data['hubungan_keluarga'] == "ISTRI") ? "selected" : ""; ?>>ISTRI</option>
                                                            <option value="ANAK" <?= ($data['hubungan_keluarga'] == "ANAK") ? "selected" : ""; ?>>ANAK</option>
                                                            <option value="MENANTU" <?= ($data['hubungan_keluarga'] == "MENANTU") ? "selected" : ""; ?>>MENANTU</option>
                                                            <option value="CUCU" <?= ($data['hubungan_keluarga'] == "CUCU") ? "selected" : ""; ?>>CUCU</option>
                                                            <option value="ORANGTUA" <?= ($data['hubungan_keluarga'] == "ORANGTUA") ? "selected" : ""; ?>>ORANGTUA</option>
                                                            <option value="MERTUA" <?= ($data['hubungan_keluarga'] == "MERTUA") ? "selected" : ""; ?>>MERTUA</option>
                                                            <option value="FAMILY LAIN" <?= ($data['hubungan_keluarga'] == "FAMILY LAIN") ? "selected" : ""; ?>>FAMILY LAIN</option>
                                                            <option value="KEPALA KELUARGA" <?= ($data['hubungan_keluarga'] == "KEPALA KELUARGA") ? "selected" : ""; ?>>KEPALA KELUARGA</option>
                                                            <option value="LAINNYA" <?= ($data['hubungan_keluarga'] == "LAINNYA") ? "selected" : ""; ?>>LAINNYA</option>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" name="reset" class="btn btn-sm btn-danger">Batal</button> 
                                                    <button type="submit" name="edit" class="btn btn-sm btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- JQuery DataTables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function(){
          $('#tabel-data').DataTable();
      });
    </script>
  </body>
</html>