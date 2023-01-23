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
                    <h2 class="page-header">Data User</h2>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Tambah Data User</h5>
                    </div>
                    <form action="proses-tambah-warga.php" method="post">
                        <div class="card-body">
                            <div class="title-form-group mb-3">
                                <h6>A. Data Pribadi</h6>
                            </div>
                            <table class="table table-striped table-middle">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">Nama User</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td> <input type="text" name="nik_warga" class="form-control" autocomplete="off" required> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Username</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="nama_warga" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Password</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="tempat_lahir_warga" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Keterangan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="date" class="form-control" name="tanggal_lahir_warga" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">:</th>
                                        <td>
                                            <select name="jenis_kelamin_warga" class="form-select" required>
                                                <option value="">-- PILIH --</option>
                                                <option value="admin">Admin</option>
                                                <option value="rw">RW</option>
                                                <option value="rt">RT</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="title-form-group mb-3">
                                <h6>B. Data Alamat</h6>
                            </div>
                            <table class="table table-striped table-middle">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">Desa/Kelurahan</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="desa_kelurahan_warga" value="Baros" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kecamatan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="kecamatan_warga" value="Cimahi Tengah" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kabupaten/Kota</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="kabupaten_kota_warga" value="Cimahi" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Provinsi</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="provinsi_warga" value="Jawa Barat" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Negara</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="negara_warga" value="Indonesia" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>RT</th>
                                        <td>:</td>
                                        <td>
                                            <select name="rt_warga" class="form-select" required>
                                                <option value="">-- PILIH RT --</option>
                                                <option value="001">001</option>
                                                <option value="002">002</option>
                                                <option value="003">003</option>
                                                <option value="005">005</option>
                                                <option value="005">005</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>RW</th>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="rw_warga" value="006" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        <div class="card-header">
                            <button type="reset" name="reset" class="btn btn-sm btn-danger">
                                Batal
                            </button>
                            <button type="submit" name="simpan" class="btn btn-sm btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>