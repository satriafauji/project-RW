<?php
session_start();
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
                <?php include('sidebar.php'); ?>
            </div>
            <div class="col py-3">

            <div class="card mb-4">
                <h1 class="page-header">Data Warga</h1>
            <div>
            </div>
        </div>

        
        <h2>A. Data Pribadi</h2>
        <form action="proses-data-warga.php" method="post">
        <table class="table table-striped table-middle">
            <tbody><tr>
                <th width="20%">NIK</th>
                <td width="1%">:</td>
                <td><input type="text" class="form-control" name="nik_warga" required=""></td>
            </tr>
            <tr>
                <th>Nama Warga</th>
                <td>:</td>
                <td><input type="text" class="form-control" name="nama_warga" required=""></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>:</td>
                <td><input type="text" class="form-control" name="tempat_lahir_warga" required=""></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>:</td>
                <td><input type="text" class="form-control datepicker" name="tanggal_lahir_warga" required=""></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td>
                <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="- pilih -"><span class="filter-option pull-left">- pilih -</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="disabled selected"><a tabindex="-1" class="" style="" data-tokens="null" href="#"><span class="text">- pilih -</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Laki-laki</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Perempuan</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control selectpicker" name="jenis_kelamin_warga" required="" tabindex="-98">
                    <option value="" selected="" disabled="">- pilih -</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select></div>
                </td>
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
                    <td><input type="text" class="form-control" name="rt_warga" value="001-005" readonly=""></td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="rw_warga" value="006" readonly=""></td>
                </tr>
                </tbody></table>

            <h4>C. Data Lain-lain</h4>
            <table class="table table-striped table-middle">
                <tbody><tr>
                    <th width="20%">Agama</th>
                    <td width="1%">:</td>
                    <td>
                    <div class="btn-group bootstrap-select form-control selectlive dropup"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="- pilih -" aria-expanded="false"><span class="filter-option pull-left">- pilih -</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" style="max-height: 210px; overflow: hidden;"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off"></div><ul class="dropdown-menu inner" role="menu" style="max-height: 156px; overflow-y: auto;"><li data-original-index="0" class="disabled selected active"><a tabindex="-1" class="" style="" data-tokens="null" href="#"><span class="text">- pilih -</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Islam</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Kristen</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Katholik</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Hindu</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Budha</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Konghucu</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control selectlive" name="agama_warga" required="" tabindex="-98">
                        <option value="" selected="" disabled="">- pilih -</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select></div>
                    </td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir</th>
                    <td>:</td>
                    <td>
                    <div class="btn-group bootstrap-select form-control selectlive"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="- pilih -"><span class="filter-option pull-left">- pilih -</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off"></div><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="disabled selected"><a tabindex="-1" class="" style="" data-tokens="null" href="#"><span class="text">- pilih -</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Tidak Sekolah</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Tidak Tamat SD</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">SD</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">SMP</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">SMA</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">D1</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">D2</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">D3</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">S1</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">S2</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">S3</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control selectlive" name="pendidikan_terakhir_warga" required="" tabindex="-98">
                        <option value="" selected="" disabled="">- pilih -</option>
                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                        <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select></div>
                    </td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>:</td>
                    <td><input type="text" class="form-control" name="pekerjaan_warga"></td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>:</td>
                    <td>
                    <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="- pilih -"><span class="filter-option pull-left">- pilih -</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="disabled selected"><a tabindex="-1" class="" style="" data-tokens="null" href="#"><span class="text">- pilih -</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Kawin</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Tidak Kawin</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control selectpicker" name="status_perkawinan_warga" required="" tabindex="-98">
                        <option value="" selected="" disabled="">- pilih -</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Tidak Kawin">Tidak Kawin</option>
                    </select></div>
                    </td>
                </tr>
                <tr>
                    <th>Status Tinggal</th>
                    <td>:</td>
                    <td>
                    <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="- pilih -"><span class="filter-option pull-left">- pilih -</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="disabled selected"><a tabindex="-1" class="" style="" data-tokens="null" href="#"><span class="text">- pilih -</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Tetap</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Kontrak</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="form-control selectpicker" name="status_warga" required="" tabindex="-98">
                        <option value="" selected="" disabled="">- pilih -</option>
                        <option value="Tetap">Tetap</option>
                        <option value="Kontrak">Kontrak</option>
                    </select></div>
                    </td>
                </tr>
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']['id_user']; ?>">
                </tbody>
            </table>
        
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-floppy-save"></i> Simpan
                </button>
            </form>
            </div>


    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>