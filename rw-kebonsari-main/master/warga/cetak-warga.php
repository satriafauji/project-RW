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
      <!-- Custom Master CSS -->
      <link rel="stylesheet" href="../../assets/css/master.css">
  </head>
  <body>
    <section class="pt-1 pb-1">
        <div class="title text-center mb-4">
            <h1>Biodata Warga RW 06 Kebonsari</h1>
        </div>
        <div class="title-detail-group mb-3">
            <h4>A. Data Pribadi</h4>
        </div>
        <table class="table table-striped table-middle">
            <tbody>
                <tr>
                    <th width="20%">NIK</th>
                    <td width="1%">:</td>
                    <td><?php echo $data['nik_warga']; ?></td>
                </tr>
                <tr>
                    <th>Nama Warga</th>
                    <td>:</td>
                    <td><?php echo $data['nama_warga']; ?></td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>:</td>
                    <td><?php echo $data['tempat_lahir_warga']; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>:</td>
                    <td><?php echo $data['tanggal_lahir_warga']; ?></td>
                </tr>
                <tr>
                    <th>Umur</th>
                    <td>:</td>
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
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>
                    <td><?php echo $data['jenis_kelamin_warga']; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="title-detail-group mb-3">
            <h4>B. Data Alamat</h4>
        </div>
        <table class="table table-striped table-middle">
            <tbody>
                <tr>
                    <th width="20%">Alamat KTP</th>
                    <td width="1%">:</td>
                    <td><?php echo $data['alamat_ktp_warga']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><?php echo $data['alamat_warga']; ?></td>
                </tr>
                <tr>
                    <th>Desa/Kelurahan</th>
                    <td>:</td>
                    <td><?php echo $data['desa_kelurahan_warga']; ?></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>:</td>
                    <td><?php echo $data['kecamatan_warga']; ?></td>
                </tr>
                <tr>
                    <th>Kabupaten/Kota</th>
                    <td>:</td>
                    <td><?php echo $data['kabupaten_kota_warga']; ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>:</td>
                    <td><?php echo $data['provinsi_warga']; ?></td>
                </tr>
                <tr>
                    <th>Negara</th>
                    <td>:</td>
                    <td><?php echo $data['negara_warga']; ?></td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td>:</td>
                    <td><?php echo $data['rt_warga']; ?></td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td>:</td>
                    <td><?php echo $data['rw_warga']; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="title-detail-group mb-3">
            <h4>C. Data Lainnya</h4>
        </div>
        <table class="table table-striped table-middle">
            <tbody>
                <tr>
                    <th width="20%">Agama</th>
                    <td width="1%">:</td>
                    <td><?php echo $data['agama_warga']; ?></td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir</th>
                    <td>:</td>
                    <td><?php echo $data['pendidikan_terakhir_warga']; ?></td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>:</td>
                    <td><?php echo $data['pekerjaan_warga']; ?></td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>:</td>
                    <td><?php echo $data['status_perkawinan_warga']; ?></td>
                </tr>
                <tr>
                    <th>Status Tinggal</th>
                    <td>:</td>
                    <td><?php echo $data['status_warga']; ?></td>
                </tr>
            </tbody>
        </table>
    </section>

    <script>
        window.print();
    </script>
  </body>
</html>