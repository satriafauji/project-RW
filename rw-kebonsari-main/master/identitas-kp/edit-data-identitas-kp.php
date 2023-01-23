<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:../login.php");
}
include "../../koneksi.php";
if (isset($_GET['id_identitas_kp'])) {
    $id_identitas_kp = $_GET['id_identitas_kp'];

    $query = mysqli_query($db, "SELECT * FROM identitas_kp i INNER JOIN warga w ON w.id_warga = i.id_warga WHERE i.id_identitas_kp=$id_identitas_kp");
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
                    <h2 class="page-header">Identitas KP</h2>
                </div>
                <form action="proses-edit-identitas-kp.php?id_identitas_kp=<?php echo $_GET['id_identitas_kp']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_identitas_kp" value="<?php echo $_GET['id_identitas_kp']; ?>">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Edit Logo</h5>
                                </div>
                                <div class="card-body">
                                    <div class="content-logo mb-3">
                                        <img src="../../image_identitas/<?php echo $data['logo_kp']; ?>" alt="Logo" class="img-fluid" id="previewImage">
                                    </div>
                                    <input type="file" name="logo_kp" id="logo_kp" class="form-control">
                                    <input type="hidden" name="logo_kp_old" value="<?php echo $data['logo_kp']; ?>">
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Edit Banner</h5>
                                </div>
                                <div class="card-body">
                                    <div class="content-logo mb-3">
                                        <img src="../../image_identitas/<?php echo $data['foto_kp']; ?>" alt="Banner" class="img-fluid" id="foto">
                                    </div>
                                    <input type="file" name="foto_kp" onchange="loadImage(event)" class="form-control">
                                    <input type="hidden" name="foto_kp_old" value="<?php echo $data['foto_kp']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Edit Data Identitas KP</h5>
                                </div>
                            
                                <div class="card-body">
                                        <div class="title-form-group mb-3">
                                            <h6>A. Data KP & Ketua RW</h6>
                                        </div>
                                        <table class="table table-striped table-middle">
                                            <tbody>
                                                <tr>
                                                    <th width="20%" class="align-middle">Nama KP</th>
                                                    <th width="1%" class="align-middle">:</th>
                                                    <td> <input type="text" name="nama_kp" class="form-control" value="<?php echo $data['nama_kp']; ?>" autocomplete="off" required> </td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Nama Ketua RW</th>
                                                    <th class="align-middle">:</th>
                                                    <td>
                                                        <select name="id_warga" class="form-select" required>
                                                            <option value="">-- PILIH KETUA RW --</option>
                                                            <?php
                                                                $query_warga = mysqli_query($db,"SELECT * FROM warga");
                                                                while ($row = mysqli_fetch_array($query_warga)) {
                                                            ?>
                                                            <option value="<?php echo $row['id_warga']; ?>" <?= ($data['id_warga'] == "".$row['id_warga']."") ? "selected" : ""; ?>><?php echo $row['nama_warga']; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">NIK Ketua RW</th>
                                                    <th class="align-middle">:</th>
                                                    <td><input type="text" class="form-control" name="nik_ketua_rw" value="<?php echo $data['nik_warga']; ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Email KP</th>
                                                    <th class="align-middle">:</th>
                                                    <td><input type="email" class="form-control" name="email_kp" value="<?php echo $data['email_kp']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">No. Telepon KP</th>
                                                    <th class="align-middle">:</th>
                                                    <td><input type="number" class="form-control" name="no_tlp_kp" value="<?php echo $data['no_tlp_kp']; ?>"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="title-form-group mb-3">
                                            <h6>B. Data Alamat</h6>
                                        </div>
                                        <table class="table table-striped table-middle">
                                            <tbody>
                                                <tr>
                                                    <th class="align-middle" width="20%">Alamat Kantor RW</th>
                                                    <th class="align-middle" width="1%">:</th>
                                                    <td> <textarea name="alamat_kp" cols="30" class="form-control"><?php echo $data['alamat_kp']; ?></textarea> </td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Kelurahan</th>
                                                    <th class="align-middle">:</th>
                                                    <td><input type="text" class="form-control" name="kelurahan_kp" value="<?php echo $data['kelurahan_kp']; ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Kecamatan</th>
                                                    <th class="align-middle">:</th>
                                                    <td><input type="text" class="form-control" name="kecamatan_kp" value="<?php echo $data['kecamatan_kp']; ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Kota</th>
                                                    <th class="align-middle">:</th>
                                                    <td><input type="text" class="form-control" name="kota_kp" value="<?php echo $data['kota_kp']; ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Provinsi</th>
                                                    <th class="align-middle">:</th>
                                                    <td><input type="text" class="form-control" name="provinsi_kp" value="<?php echo $data['provinsi_kp']; ?>" readonly></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Kode Pos</th>
                                                    <th class="align-middle">:</th>
                                                    <td><input type="text" class="form-control" name="kode_pos_kp" value="<?php echo $data['kode_pos_kp']; ?>" readonly></td>
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
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>    
    <script>
        $(document).ready(function() {
            $('#logo_kp').on('input', function() {
                var file = $(this).get(0).files[0];

                if(file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImage').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
                }
            });
        });

        var loadImage = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
            var output = document.getElementById('foto');
            output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
  </body>
</html>