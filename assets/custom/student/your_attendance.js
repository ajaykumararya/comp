$(document).ready(function () {
    
    function parseDMY(dateStr) {
    var parts = dateStr.split('-'); // [DD, MM, YYYY]
    return new Date(parts[2], parts[1] - 1, parts[0]); // YYYY, MM-1, DD
}

function formatYMD(dateStr) {
    var parts = dateStr.split('-'); // [DD, MM, YYYY]
    return parts[2] + "-" + parts[1] + "-" + parts[0]; // YYYY-MM-DD
}

    const roll_no = $('[name="roll_no"]').val();
    // alert(roll_no);
    $.ajax({
        url: `${base_url}ajax/website/fetch_attendance`,
        type: 'POST',
        dataType: 'json',
        data : {roll_no},
        success: function (res) {
            var data = res.data;
            console.log(res)
            var minDate = null;
            var maxDate = null;

            if (data.length > 0) {
                // Convert start date of each event into YYYY-MM-DD
                data = data.map(function (event) {
                    return {
                        title: event.title,
                        start: formatYMD(event.start), 
                        color: event.color,
                        type: event.type
                    };
                });
        
                // Min-Max nikalne ke liye parseDMY use karo
                var dates = data.map(function (event) {
                    return new Date(event.start);
                });
        
                 minDate = new Date(Math.min.apply(null, dates));
                 maxDate = new Date(Math.max.apply(null, dates));
        
                console.log("min:", minDate, "max:", maxDate);
        var minDateAdjusted = new Date(minDate);
        minDateAdjusted.setDate(minDateAdjusted.getDate() - 1);
                // Initialize Calendar
                $('#attendanceCalendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'
                    },
                    editable: false,
                    events: data, 
                    defaultDate : maxDate,
                    validRange: {
                        start: minDateAdjusted,
                        end: maxDate
                    },
                    defaultView: 'month',
                    height: 'auto'
                });
            } else {
                alert("Record Not Found..");
            }

        },
        error: function () {
            alert('There was an error fetching attendance data.');
        }
    });
});