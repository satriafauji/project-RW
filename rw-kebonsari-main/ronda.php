<?php require_once('koneksi.php'); ?>
<!doctype html>
<html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Project RW 06</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- Calendar CSS -->
      <link rel="stylesheet" href="assets/vendor/fullcalendar/lib/main.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="assets/css/style.css">
      <style>
        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
      </style>
    </head>
  <body>
    
    <?php include ('layouts/header.php') ?>

    <section class="pt-5 pb-5">
        <div class="container">
            <div class="title mb-5">
              <h1>Kegiatan Ronda</h1>
            </div>
            <div id="calendar"></div>
        </div>
    </section>

    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Jadwal Ronda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Judul</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Deskripsi</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Mulai</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Selesai</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php include ('layouts/footer.php') ?>

    <?php 
      $schedules = $db->query("SELECT * FROM schedule_list");
      $sched_res = [];
      foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
          $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
          $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
          $sched_res[$row['id']] = $row;
      }
    ?>
    <?php 
      if(isset($db)) $db->close();
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendor/fullcalendar/lib/main.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
  </body>
</html>