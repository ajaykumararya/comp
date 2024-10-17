document.addEventListener('DOMContentLoaded', function (e) {
    const institue_box = $('select[name="session"]');
    var table;
    institue_box.select2({
        placeholder: "Select a Session",
    }).on('change', function () {
        // alert('yes');
        var session_id = $(this).val();
        // session_id.html(emptyOption);
        // alert(session_id);
        if (session_id) {
            if ( $.fn.dataTable.isDataTable('#list-students') ) {
                // console.log(table);
                table.destroy();
            }
            table = list_students('session',session_id);
            // log(table);
        }
    });
});