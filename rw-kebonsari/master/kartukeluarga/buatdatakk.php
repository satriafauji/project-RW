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
        <form action="proses-tambah-warga.php" method="post">
        <table class="table table-striped table-middle">
            <tbody><tr>
                <th width="20%">Nomor Kartu Keluarga</th>
                <td width="1%">:</td>
                <td><input type="text" class="form-control" name="nik_warga" required=""></td>
            </tr>
            <tr>
                <th>ID Kepala Keluarga</th>
                <td>:</td>
                <td><input type="text" class="form-control" name="nama_warga" required=""></td>
            </tr>
            </tbody></table>

            <h3>B. Data Alamat</h3>
            <table class="table table-striped table-middle">
                <tbody><tr>
                    <th width="20%">Alamat KTP</th>
                    <td width="1%">:</td>
                    <td><textarea class="form-control" name="alamat_ktp_warga" required=""></textarea></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><textarea class="form-control" name="alamat_warga" required=""></textarea></td>
                </tr>
                <tr>
                    <th>Desa/Kelurahan</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="desa_kelurahan_warga" value="Baros"></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="kecamatan_warga" value="Cimahi Tengah"></td>
                </tr>
                <tr>
                    <th>Kabupaten/Kota</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="kabupaten_kota_warga" value="Cimahi"></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="provinsi_warga" value="Jawa Barat"></td>
                </tr>
                <tr>
                    <th>Negara</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="negara_warga" value="Indonesia"></td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="rt_warga" value="001-005"></td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="rw_warga" value="006" readonly=""></td>
                </tr>
                <tr>
                    <th>Kode Pos</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="kode_pos" value="40521"></td>
                </tr>
                </tbody></table>
        
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-floppy-save"></i> Simpan
                </button>
            </form>
            </div>


    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>