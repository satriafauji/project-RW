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
                    <h1 class="page-header">Data Kartu Keluarga</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Tambah Data Kartu Keluarga</h5>
                    </div>
                    <form action="proses-tambah-kk.php" method="post">
                        <div class="card-body">
                            <div class="title-form-group mb-3">
                                <h6>A. Data Pribadi</h6>
                            </div>
                            <table class="table table-striped table-middle">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">NO KK</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td> <input type="text" name="no_kk" class="form-control" autocomplete="off" required> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Nama Kepala Keluarga</th>
                                        <th class="align-middle">:</th>
                                        <td>
                                            <select name="id_warga" class="form-select" required>
                                                <option value="">-- PILIH KEPALA KELUARGA --</option>
                                                <?php
                                                    $query = mysqli_query($db,"SELECT * FROM warga");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $row['id_warga']; ?>"><?php echo $row['nama_warga']; ?> (NIK : <?php echo $row['nik_warga']; ?>)</option>
                                                <?php
                                                    }
                                                ?>
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
                                        <th width="20%" class="align-middle">Alamat Kartu Keluarga</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td> <textarea name="alamat_keluarga" class="form-control" required></textarea> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Desa/Kelurahan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="desa_kelurahan_keluarga" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kecamatan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="kecamatan_keluarga" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kabupaten/Kota</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="kabupaten_kota_keluarga" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Provinsi</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="provinsi_keluarga" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Negara</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="negara_keluarga" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th>RT</th>
                                        <th>:</th>
                                        <td>
                                            <select name="rt_keluarga" class="form-select" required>
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
                                        <th>:</th>
                                        <td><input type="text" class="form-control" name="rw_keluarga" autocomplete="off" required></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Pos</th>
                                        <th>:</th>
                                        <td>
                                            <input type="text" name="kode_pos_keluarga" class="form-control" autocomplete="off" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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