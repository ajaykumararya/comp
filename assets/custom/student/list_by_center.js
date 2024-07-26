document.addEventListener('DOMContentLoaded', function (e) {
    const institue_box = $('select[name="center_id"]');
    var table;
    institue_box.select2({
        placeholder: "Select a Center",
        templateSelection: optionFormatSecond,
        templateResult: optionFormatSecond,
    }).on('change', function () {
        // alert('yes');
        var center_id = $(this).val();
        // session_id.html(emptyOption);
        
        if (center_id) {
            if ( $.fn.dataTable.isDataTable('#list-students') ) {
                // console.log(table);
                table.destroy();
            }
            table = list_students('all',center_id);
            // log(table);
        }
    });
});