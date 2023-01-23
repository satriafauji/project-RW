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
        <!-- Custom Master CSS -->
        <link rel="stylesheet" href="../../assets/css/master.css">
        <style>
            .table-cetak>:not(caption)>*>* {
                font-size: 11px;
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <section class="pt-1 pb-1">
            <div class="title text-center mb-4">
                <h1>Data Warga RW 06 Kebonsari</h1>
            </div>
            <table class="table table-striped table-bordered display nowrap table-cetak">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tmp & Tgl Lahir</th>
                        <th>L/P</th>
                        <th>Umur</th>
                        <th>Alamat KTP</th>
                        <th>Alamat Warga</th>
                        <th>Desa / Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten / Kota</th>
                        <th>Provinsi</th>
                        <th>Negara</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Agama</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                        <th>Status Kawin</th>
                        <th>Status Warga (Tinggal)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../../koneksi.php";
                        $query = mysqli_query($db, "Select * from warga");
                        $no = 0;
                        while ($data = mysqli_fetch_array($query)) {
                            $no++;
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nik_warga']; ?></td>
                        <td><?php echo $data['nama_warga']; ?></td>
                        <td><?php echo $data['tempat_lahir_warga']; ?>, <?php echo date('d F Y', strtotime($data['tanggal_lahir_warga'])); ?></td>
                        <td><?php echo $data['jenis_kelamin_warga']; ?></td>
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
                        <td><?php echo $data['alamat_ktp_warga']; ?></td>
                        <td><?php echo $data['alamat_warga']; ?></td>
                        <td><?php echo $data['desa_kelurahan_warga']; ?></td>
                        <td><?php echo $data['kecamatan_warga']; ?></td>
                        <td><?php echo $data['kabupaten_kota_warga']; ?></td>
                        <td><?php echo $data['provinsi_warga']; ?></td>
                        <td><?php echo $data['negara_warga']; ?></td>
                        <td><?php echo $data['rt_warga']; ?></td>
                        <td><?php echo $data['rw_warga']; ?></td>
                        <td><?php echo $data['agama_warga']; ?></td>
                        <td><?php echo $data['pendidikan_terakhir_warga']; ?></td>
                        <td><?php echo $data['pekerjaan_warga']; ?></td>
                        <td><?php echo $data['status_perkawinan_warga']; ?></td>
                        <td><?php echo $data['status_warga']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>

        <script>
            window.print();
        </script>
    </body>
</html>