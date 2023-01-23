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
                    <h1 class="page-header">Data Keluarga</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Data Keluarga</h5>
                    </div>
                    <form action="proses-edit-kk.php?id_keluarga=<?php echo $_GET['id_keluarga']; ?>" method="post">
                        <div class="card-body">
                            <div class="title-form-group mb-3">
                                <h4>A. Data Pribadi</h4>
                            </div>
                            <table class="table table-striped table-middle">
                                <input type="hidden" name="id_keluarga" value="<?php echo $_GET['id_keluarga']; ?>">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">NO KK</th>
                                        <th width="1%" class="align-middle">:</th>
                                        <td> <input type="text" name="no_kk" class="form-control" value="<?php echo $data['no_kk']; ?>" autocomplete="off" required> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Nama Kepala Keluarga</th>
                                        <th class="align-middle">:</th>
                                        <td>
                                            <input type="hidden" name="id_warga" value="<?php echo $data['id_warga']; ?>">
                                            <input type="text" name="nama_kk" class="form-control" value="<?php echo $data['nama_warga']; ?>" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="title-form-group mb-3">
                                <h4>B. Data Alamat</h4>
                            </div>
                            <table class="table table-striped table-middle">
                                <tbody>
                                    <tr>
                                        <th width="20%" class="align-middle">Alamat Keluarga</th>
                                        <th class="align-middle" width="1%">:</th>
                                        <td> <textarea name="alamat_keluarga" class="form-control" required><?php echo $data['alamat_keluarga']; ?></textarea> </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Desa/Kelurahan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="desa_kelurahan_keluarga" value="<?php echo $data['desa_kelurahan_keluarga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kecamatan</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="kecamatan_keluarga" value="<?php echo $data['kecamatan_keluarga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Kabupaten/Kota</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="kabupaten_kota_keluarga" value="<?php echo $data['kabupaten_kota_keluarga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Provinsi</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="provinsi_keluarga" value="<?php echo $data['provinsi_keluarga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Negara</th>
                                        <th class="align-middle">:</th>
                                        <td><input type="text" class="form-control" name="negara_keluarga" value="<?php echo $data['negara_keluarga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>RT</th>
                                        <th>:</th>
                                        <td>
                                            <select name="rt_keluarga" class="form-select" required>
                                                <option value="">-- PILIH RT --</option>
                                                <option value="001" <?= ($data['rt_keluarga'] == "001") ? "selected" : ""; ?>>001</option>
                                                <option value="002" <?= ($data['rt_keluarga'] == "002") ? "selected" : ""; ?>>002</option>
                                                <option value="003" <?= ($data['rt_keluarga'] == "003") ? "selected" : ""; ?>>003</option>
                                                <option value="005" <?= ($data['rt_keluarga'] == "004") ? "selected" : ""; ?>>005</option>
                                                <option value="005" <?= ($data['rt_keluarga'] == "005") ? "selected" : ""; ?>>005</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>RW</th>
                                        <th>:</th>
                                        <td><input type="text" class="form-control" name="rw_keluarga" value="<?php echo $data['rw_keluarga']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Pos</th>
                                        <th>:</th>
                                        <td>
                                            <input type="text" name="kode_pos_keluarga" value="<?php echo $data['kode_pos_keluarga']; ?>" class="form-control" autocomplete="off">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
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