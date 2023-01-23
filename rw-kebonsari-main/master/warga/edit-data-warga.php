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
                        <h5 class="card-title mb-0">Edit Data Warga</h5>
                    </div>
                    <form action="proses-edit-warga.php?id_warga=<?php echo $_GET['id_warga']; ?>" method="post">
                        <input type="hidden" name="id_warga" value="<?php echo $_GET['id_warga']; ?>">
                        <div class="card-body">
                            <div class="title-form-group mb-3">
                                <h6>A. Data Pribadi</h6>
                            </div>
                            <table class="table table-striped table-middle">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">NIK</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td> <input type="text" name="nik_warga" class="form-control" value="<?php echo $data['nik_warga']; ?>" autocomplete="off" required> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Nama Warga</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="nama_warga" value="<?php echo $data['nama_warga']; ?>" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Tempat Lahir</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="tempat_lahir_warga" value="<?php echo $data['tempat_lahir_warga']; ?>" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Tanggal Lahir</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="date" class="form-control" name="tanggal_lahir_warga" value="<?php echo $data['tanggal_lahir_warga']; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Jenis Kelamin</th>
                                        <th class="align-middle">:</th>
                                        <td>
                                            <select name="jenis_kelamin_warga" class="form-select" required>
                                                <option value="">-- PILIH JENIS KELAMIN --</option>
                                                <option value="L" <?= ($data['jenis_kelamin_warga'] == "L") ? "selected" : ""; ?>>Laki-Laki</option>
                                                <option value="P" <?= ($data['jenis_kelamin_warga'] == "P") ? "selected" : ""; ?>>Perempuan</option>
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
                                        <th width="20%" class="align-middle">Alamat KTP</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td> <textarea name="alamat_ktp_warga" class="form-control" required><?php echo $data['alamat_ktp_warga']; ?></textarea> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Alamat</th>
                                        <th class="align-middle">:</th>
                                        <td> <textarea name="alamat_warga" class="form-control" required><?php echo $data['alamat_warga']; ?></textarea> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Desa/Kelurahan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="desa_kelurahan_warga" value="<?php echo $data['desa_kelurahan_warga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kecamatan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="kecamatan_warga" value="<?php echo $data['kecamatan_warga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kabupaten/Kota</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="kabupaten_kota_warga" value="<?php echo $data['kabupaten_kota_warga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Provinsi</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="provinsi_warga" value="<?php echo $data['provinsi_warga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Negara</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="negara_warga" value="<?php echo $data['negara_warga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>RT</th>
                                        <td>:</td>
                                        <td>
                                            <select name="rt_warga" class="form-select" required>
                                                <option value="">-- PILIH RT --</option>
                                                <option value="001" <?= ($data['rt_warga'] == "001") ? "selected" : ""; ?>>001</option>
                                                <option value="002" <?= ($data['rt_warga'] == "002") ? "selected" : ""; ?>>002</option>
                                                <option value="003" <?= ($data['rt_warga'] == "003") ? "selected" : ""; ?>>003</option>
                                                <option value="005" <?= ($data['rt_warga'] == "004") ? "selected" : ""; ?>>005</option>
                                                <option value="005" <?= ($data['rt_warga'] == "005") ? "selected" : ""; ?>>005</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>RW</th>
                                        <td>:</td>
                                        <td><input type="text" class="form-control" name="rw_warga" value="<?php echo $data['rw_warga']; ?>" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="title-form-group mb-3">
                                <h6>C. Data Lainnya</h6>
                            </div>
                            <table class="table table-striped table-middle">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">Agama</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td>
                                            <select name="agama_warga" class="form-select" required>
                                                <option value="">-- Pilih --</option>
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
                                        <th class="align-middle">Pendidikan Terakhir</th>
                                        <th class="align-middle">:</th>
                                        <td>
                                            <select name="pendidikan_terakhir_warga" class="form-select" required>
                                                <option value="">-- PILIH PENDIDIKAN TERAKHIR --</option>
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
                                        <th class="align-middle">Pekerjaan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="pekerjaan_warga" value="<?php echo $data['pekerjaan_warga']; ?>" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Status Perkawinan</th>
                                        <th class="align-middle">:</th>
                                        <td>
                                            <select name="status_perkawinan_warga" class="form-select" required>
                                                <option value="">-- PILIH STATUS PERKAWINAN --</option>
                                                <option value="Kawin" <?= ($data['status_perkawinan_warga'] == "Kawin") ? "selected" : ""; ?>>Kawin</option>
                                                <option value="Belum-Kawin" <?= ($data['status_perkawinan_warga'] == "Belum-Kawin") ? "selected" : ""; ?>>Belum Kawin</option>
                                                <option value="Cerai-Hidup" <?= ($data['status_perkawinan_warga'] == "Cerai-Hidup") ? "selected" : ""; ?>>Cerai Hidup</option>
                                                <option value="Cerai-Mati" <?= ($data['status_perkawinan_warga'] == "Cerai-Mati") ? "selected" : ""; ?>>Cerai Mati</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Status Tinggal</th>
                                        <th class="align-middle">:</th>
                                        <td>
                                            <select name="status_warga" class="form-select" required>
                                                <option value="">-- PILIH STATUS TINGGAL --</option>
                                                <option value="Tetap" <?= ($data['status_warga'] == "Tetap") ? "selected" : ""; ?>>Tetap</option>
                                                <option value="Kontrak" <?= ($data['status_warga'] == "Kontrak") ? "selected" : ""; ?>>Kontrak</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="reset" name="reset" class="btn btn-sm btn-danger">
                                Batal
                            </button>
                            <button type="submit" name="edit" class="btn btn-sm btn-primary">
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