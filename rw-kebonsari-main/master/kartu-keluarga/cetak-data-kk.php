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
                <h1>Data Kartu Keluarga RW 06 Kebonsari</h1>
            </div>
            <table class="table table-striped table-bordered display nowrap table-cetak">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor KK</th>
                        <th>Nama Kepala</th>
                        <th>NIK Kepala</th>
                        <th>Jml. Anggota</th>
                        <th>Alamat</th>
                        <th>Desa / Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten / Kota</th>
                        <th>Provinsi</th>
                        <th>Negara</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Kode Pos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../../koneksi.php";
                        $query = mysqli_query($db, "SELECT * FROM keluarga k INNER JOIN warga w ON w.id_warga = k.id_warga");
                        $no = 0;
                        while ($data = mysqli_fetch_array($query)) {
                            $no++;
                    ?>
                    <?php
                        $query_jumlah_anggota = mysqli_query($db,"SELECT COUNT(*) AS total FROM anggota_keluarga WHERE id_keluarga = ".$data['id_keluarga']."");
                        $jumlah_anggota = mysqli_fetch_assoc($query_jumlah_anggota);
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['no_kk']; ?></td>
                        <td><?php echo $data['nama_warga']; ?></td>
                        <td><?php echo $data['nik_warga']; ?></td>
                        <td>
                            <?php echo $jumlah_anggota['total']; ?>
                        </td>
                        <td><?php echo $data['alamat_keluarga']; ?></td>
                        <td><?php echo $data['desa_kelurahan_keluarga']; ?></td>
                        <td><?php echo $data['kecamatan_keluarga']; ?></td>
                        <td><?php echo $data['kabupaten_kota_keluarga']; ?></td>
                        <td><?php echo $data['provinsi_keluarga']; ?></td>
                        <td><?php echo $data['negara_keluarga']; ?></td>
                        <td><?php echo $data['rt_keluarga']; ?></td>
                        <td><?php echo $data['rw_keluarga']; ?></td>
                        <td><?php echo $data['kode_pos_keluarga']; ?></td>
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