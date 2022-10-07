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
                <h1>Dashbor</h1>
            <div>

        </div>
    </div>
    <div class="row">
                <div class="col-sm-6 col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-body">
                      <h3>Data Warga</h3>
                      <p>
                        Total ada <?php echo $jumlah_warga['total'] ?> data warga. <?php echo $jumlah_warga_l['total'] ?> di antaranya laki-laki, dan <?php echo $jumlah_warga_p['total'] ?> diantaranya perempuan.
                      </p>
                      <p>
                        Warga di atas 17 tahun berjumlah <?php echo $jumlah_warga_ld_17['total'] ?> orang, dan di bawah 17 tahun berjumlah <?php echo $jumlah_warga_kd_17['total'] ?> orang.
                      </p>
                    </div>
                    <div class="panel-footer">
                      <a href="../warga" class="btn btn-primary" role="button">
                        <span class="glyphicon glyphicon-book"></span> Detil »
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-body">
                      <h3>Data Mutasi</h3>
                      <p>
                        Total ada <?php echo $jumlah_mutasi['total'] ?> data mutasi. <?php echo $jumlah_mutasi_l['total'] ?> di antaranya laki-laki, dan <?php echo $jumlah_mutasi_p['total'] ?> diantaranya perempuan.
                      </p>
                      <p>
                        Warga di atas 17 tahun berjumlah <?php echo $jumlah_mutasi_ld_17['total'] ?> orang, dan di bawah 17 tahun berjumlah <?php echo $jumlah_mutasi_kd_17['total'] ?> orang.
                      </p>
                    </div>
                    <div class="panel-footer">
                      <a href="../mutasi" class="btn btn-primary" role="button">
                        <span class="glyphicon glyphicon-export"></span> Detil »
                      </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>