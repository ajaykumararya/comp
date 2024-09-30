$(document).ready(function () {
    const roll_no = $('[name="roll_no"]').val();
    // Initialize FullCalendar
    // $('#attendanceCalendar').fullCalendar({
    //     header: {
    //         left: 'prev,next today',
    //         center: 'title',
    //         right: 'month,agendaWeek,agendaDay'
    //     },
    //     editable: false,
    //     events: {
    //         url: `${base_url}ajax/website/fetch_attendance`,
    //         type: 'POST',
    //         data : {roll_no},
    //         error: function () {
    //             alert('There was an error fetching attendance data.');
    //         }
    //     }
    // });

    $.ajax({
        url: `${base_url}ajax/website/fetch_attendance`,
        type: 'POST',
        dataType: 'json',
        data : {roll_no},
        success: function (res) {
            var data = res.data;
            var minDate = null;
            var maxDate = null;

            if (data.length > 0) {
                // Determine the minimum and maximum dates from the attendance data
                var dates = data.map(function (event) {
                    return event.start;
                });

                minDate = new Date(Math.min.apply(null, dates.map(function (d) { return new Date(d); })));
                maxDate = new Date(Math.max.apply(null, dates.map(function (d) { return new Date(d); })));
            }

            // Initialize FullCalendar
            $('#attendanceCalendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
                editable: false,
                events: data,  // Events fetched via AJAX
                validRange: {
                    start: minDate,
                    end: maxDate
                },
                defaultView: 'month', // or you can use 'basicWeek' or 'basicDay' for simpler views
                height: 'auto',
            });
        },
        error: function () {
            alert('There was an error fetching attendance data.');
        }
    });
});