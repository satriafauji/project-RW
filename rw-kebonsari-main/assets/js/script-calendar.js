var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];

$(function() {
    if (!!scheds) {
        Object.keys(scheds).map(k => {
            var row = scheds[k]
            events.push({ id: row.id, title: row.title, extendedProps: {id: row.id},  description: row.description, start: row.start_datetime, end: row.end_datetime })
        })
    }

    var date = new Date()
        d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    calendar = new Calendar(document.getElementById('calendar'), {
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
        },
        selectable: true,
        themeSystem: 'bootstrap',
        //Random default events
        events: events,
        eventClick: function(info) {
            var _details = $('#CalendarModal');
            var id = info.event.id 
            if (!!scheds[id]) {
                _details.find('#title').text(scheds[id].title)
                _details.find('#description').text(scheds[id].description)
                _details.find('#start').text(scheds[id].sdate)
                _details.find('#end').text(scheds[id].edate)
                _details.find('#edit,#delete').attr('data-id', id)
                _details.modal('show')
            } else {
                alert("Jadwal Ronda Tidak Ada");
            }
        },
        eventDidMount: function(info) {
            var _waw = $('.fc-daygrid-event');
            descna = info.event.extendedProps.description;
            _waw.find('.fc-event-title').attr('data-description', descna);
            _waw.find('.fc-event-time').hide();
            console.log(info.event.extendedProps.description);
        },
        editable: true
    });
    calendar.render();

    // Form reset 
    $('#schedule-form').on('reset', function() {
        $(this).find('input:hidden').val('');
        $(this).find('input:visible').first().focus()
    })

    // Edit Button
    $('#edit').click(function() {
        var id = $(this).attr('data-id')
        if (!!scheds[id]) {
            var _form = $('#schedule-form')
            console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
            _form.find('[name="id"]').val(id)
            _form.find('[name="title"]').val(scheds[id].title)
            _form.find('[name="description"]').val(scheds[id].description)
            _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
            _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
            $('#CalendarModal').modal('hide')
            _form.find('[name="title"]').focus()
        } else {
            alert("Jadwal Ronda Tidak Ada");
        }
    })

    // Delete Button / Deleting an Event
    $('#delete').click(function() {
        var id = $(this).attr('data-id')
        if (!!scheds[id]) {
            var _conf = confirm("Are you sure to delete this scheduled event?");
            if (_conf === true) {
                location.href = "../../master/kegiatan-ronda/delete_schedule.php?id=" + id;
            }
        } else {
            alert("Event is undefined");
        }
    })

})