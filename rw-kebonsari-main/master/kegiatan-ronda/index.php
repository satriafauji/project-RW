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
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <!-- FullCalendar CSS -->
      <link rel="stylesheet" href="../../assets/vendor/fullcalendar-3.4.0/fullcalendar.css">
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
                    <h2 class="page-header">Kegiatan Ronda</h2>
                </div>
                <div class="content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="CalendarModal" tabindex="-1" aria-labelledby="CalendarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="CalendarModalLabel">Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <strong>Judul Ronda : </strong>
                <p id="title"></p>
                <strong>Anggota Ronda : </strong>
                <p id="description"></p>
                <strong>Tanggal & Waktu Mulai Ronda : </strong>
                <p id="start"></p>
                <strong>Tanggal & Waktu Selesai Ronda : </strong>
                <p id="end"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    
    <!-- FullCalendar JS -->
    <script src="../../assets/vendor/fullcalendar-3.4.0/lib/jquery.min.js"></script>
    <script src="../../assets/vendor/fullcalendar-3.4.0/lib/moment.min.js"></script>
    <script src="../../assets/vendor/fullcalendar-3.4.0/fullcalendar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(function() {

            var calendar = $('#calendar').fullCalendar({
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: 'load_schedule.php',
                timeFormat: 'H(:mm)',
                eventClick: function(event,jsEvent, view) {
                    var modal = $('#CalendarModal');
                    modal.find('#title').text(event.title);
                    modal.find('#description').text(event.description);
                    modal.find('#start').text(moment(event.start).format('DD MMMM YYYY HH:mm A'));
                    modal.find('#end').text(moment(event.end).format('DD MMMM YYYY HH:mm A'));
                    modal.modal('show');
                },
                eventRender: function(event,element) {
                    element.find('.fc-title').append("<br/> Anggota : <br/>" + event.description);
                },
                selectable:true,
                selectHelper:true,
            })

            // $('#calendar').fullCalendar({
            //     events: 
            //     [ 
            //         { 
            //             id: 1, 
            //             title: 'First Event', 
            //             start: '2022-12-09',
            //             description: 'first description' 
            //         }, 
            //         { 
            //             id: 2, 
            //             title: 'Second Event', 
            //             start: '2022-12-10',
            //             description: 'second description'
            //         }
            //     ], 
            //     eventRender: function(event, element) { 
            //         element.find('.fc-title').append("<br/>" + event.description); 
            //     } 
            // })
        })
    </script>
  </body>
</html>