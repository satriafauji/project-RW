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
                <td><input type="text" class="form-control" name="nik_warga" value="<?php echo $data['nik_warga']; ?>"></td>
            </tr>
            <tr>
                <th>Nama Warga</th>
                <td>:</td>
                <td><input type="text" class="form-control" name="nama_warga" value="<?php echo $data['nama_warga']; ?>"></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>:</td>
                <td><input type="text" class="form-control" name="tempat_lahir_warga" value="<?php echo $data['tempat_lahir_warga']; ?>"></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>:</td>
                <td><input type="date" class="form-control" name="tanggal_lahir_warga" value="<?php echo $data['tanggal_lahir_warga']; ?>"></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td>
                <select name="jenis_kelamin_warga" class="form-select">
                    <option value="">-- PILIH JENIS KELAMIN --</option>
                    <option value="L" <?= ($data['jenis_kelamin_warga'] == "L") ? "selected" : ""; ?>>Laki - Laki</option>
                    <option value="P" <?= ($data['jenis_kelamin_warga'] == "P") ? "selected" : ""; ?>>Perempuan</option>
                </select>
                </td>
            </tr>
            </tbody></table>

            <h3>B. Data Alamat</h3>
            <table class="table table-striped table-middle">
                <tbody><tr>
                    <th width="20%">Alamat KTP</th>
                    <td width="1%">:</td>
                    <td><textarea class="form-control" name="alamat_ktp_warga"><?php echo $data['alamat_ktp_warga']; ?></textarea></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><textarea class="form-control" name="alamat_warga"><?php echo $data['alamat_warga']; ?></textarea></td>
                </tr>
                <tr>
                    <th>Desa/Kelurahan</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="desa_kelurahan_warga" value="Baros" readonly></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="kecamatan_warga" value="Cimahi Tengah" readonly></td>
                </tr>
                <tr>
                    <th>Kabupaten/Kota</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="kabupaten_kota_warga" value="Cimahi" readonly></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="provinsi_warga" value="Jawa Barat" readonly></td>
                </tr>
                <tr>
                    <th>Negara</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="negara_warga" value="Indonesia" readonly></td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="rt_warga" value="<?php echo $data['rt_warga']; ?>"></td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="rw_warga" value="006" readonly></td>
                </tr>
                </tbody></table>

            <h4>C. Data Lain-lain</h4>
            <table class="table table-striped table-middle">
                <tbody><tr>
                    <th width="20%">Agama</th>
                    <td width="1%">:</td>
                    <td>
                    <select name="agama_warga" class="form-select">
                        <option value="">- pilih -</option>
                        <option value="Islam" <?= ($data['agama_warga'] == "Islam") ? "selected" : ""; ?>>Islam</option>
                        <option value="Kristen" <?= ($data['agama_warga'] == "Kristen") ? "selected" : ""; ?>>Kristen</option>
                        <option value="Katholik" <?= ($data['agama_warga'] == "Katholik") ? "selected" : ""; ?>>Katholik</option>
                        <option value="Hindu" <?= ($data['agama_warga'] == "Hindu") ? "selected" : ""; ?>>Hindu</option>
                        <option value="Budha" <?= ($data['agama_warga'] == "Budha") ? "selected" : ""; ?>>Budha</option>
                        <option value="Konghucu" <?= ($data['agama_warga'] == "Konghucu") ? "selected" : ""; ?>>Konghucu</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir</th>
                    <td>:</td>
                    <td>
                    <select name="pendidikan_terakhir_warga" class="form-select">
                        <option value="" selected="" disabled="">- pilih -</option>
                        <option value="Tidak Sekolah" <?= ($data['pendidikan_terakhir_warga'] == "Tidak Sekolah") ? "selected" : ""; ?>>Tidak Sekolah</option>
                        <option value="Tidak Tamat SD" <?= ($data['pendidikan_terakhir_warga'] == "Tidak Tamat SD") ? "selected" : ""; ?>>Tidak Tamat SD</option>
                        <option value="SD" <?= ($data['pendidikan_terakhir_warga'] == "SD") ? "selected" : ""; ?>>SD</option>
                        <option value="SMP" <?= ($data['pendidikan_terakhir_warga'] == "SMP") ? "selected" : ""; ?>>SMP</option>
                        <option value="SMA" <?= ($data['pendidikan_terakhir_warga'] == "SMA") ? "selected" : ""; ?>>SMA</option>
                        <option value="D1" <?= ($data['pendidikan_terakhir_warga'] == "D1") ? "selected" : ""; ?>>D1</option>
                        <option value="D2" <?= ($data['pendidikan_terakhir_warga'] == "D2") ? "selected" : ""; ?>>D2</option>
                        <option value="D3" <?= ($data['pendidikan_terakhir_warga'] == "D3") ? "selected" : ""; ?>>D3</option>
                        <option value="S1" <?= ($data['pendidikan_terakhir_warga'] == "S1") ? "selected" : ""; ?>>S1</option>
                        <option value="S2" <?= ($data['pendidikan_terakhir_warga'] == "S2") ? "selected" : ""; ?>>S2</option>
                        <option value="S3" <?= ($data['pendidikan_terakhir_warga'] == "S3") ? "selected" : ""; ?>>S3</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="pekerjaan_warga" value="<?php echo $data['pekerjaan_warga']; ?>"></td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>:</td>
                    <td>
                    <select name="status_perkawinan_warga" class="form-select">
                        <option value="">- pilih -</option>
                        <option value="Kawin" <?= ($data['status_perkawinan_warga'] == "Kawin") ? "selected" : ""; ?>>Kawin</option>
                        <option value="Tidak Kawin" <?= ($data['status_perkawinan_warga'] == "Tidak Kawin") ? "selected" : ""; ?>>Tidak Kawin</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>Status Tinggal</th>
                    <td>:</td>
                    <td>
                    <select name="status_warga" class="form-select">
                        <option value="" selected="" disabled="">- pilih -</option>
                        <option value="Tetap" <?= ($data['status_warga'] == "Tetap") ? "selected" : ""; ?>>Tetap</option>
                        <option value="Kontrak" <?= ($data['status_warga'] == "Kontrak") ? "selected" : ""; ?>>Kontrak</option>
                    </select>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-floppy-save"></i> Simpan
                </button>
            </form>
            </div>


    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>