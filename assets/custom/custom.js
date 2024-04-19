// const dateFormat = 'd-m-Y';
// console.log(moment());
const course_duration_url = 'course/fetch-duration';
const driver = window.driver.js.driver;
const enable_console = true;
const inr = '₹';
const emptyOption = '<option></option>';
const driverObj = driver();
const myeditor = $(".aryaeditor");
const ki_modal = $('#mymodal');
const defaultStudent = base_url + 'assets/media/student.png';
// console.log(typeof content_css);
var MYEditorCss = [];
// $.each(content_css, function (i, n) {
//     MYEditorCss.push(n);
// });
// KTApp.hideLoading();
if (myeditor.length) {
    var useDarkMode = document.documentElement.getAttribute("data-bs-theme") == 'dark';
    //powerpaste casechange tinydrive advcode mediaembed checklist
    tinymce.init({
        selector: 'textarea.aryaeditor',
        extended_valid_elements: 'i[class],span[style]',
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', `${base_url}admin/upload_editor_file`);
            xhr.onload = function () {
                var json;
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);
                console.log(json);
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                // alert(json.location);
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        },
        branding: false,
        plugins: ' importcss  preview   importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  codesample table charmap pagebreak nonbreaking anchor  insertdatetime advlist lists  wordcount   help    charmap   quickbars  emoticons  ',
        //   tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
        //   tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
        //   tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
        //   tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
        mobile: {
            plugins: ' preview   importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  codesample table charmap pagebreak nonbreaking anchor  insertdatetime advlist lists  wordcount   help   charmap  quickbars  emoticons '
        },
        // content_css: MYEditorCss,
        menu: {
            tc: {
                title: 'Comments',
                items: 'addcomment showcomments deleteallconversations'
            }
        },
        style_formats: [
            {
                title: 'Headers', items: [
                    { title: 'h1', block: 'h1' },
                    { title: 'h2', block: 'h2' },
                    { title: 'h3', block: 'h3' },
                    { title: 'h4', block: 'h4' },
                    { title: 'h5', block: 'h5' },
                    { title: 'h6', block: 'h6' }
                ]
            },
            {
                title: 'Blocks', items: [
                    { title: 'p', block: 'p' },
                    { title: 'div', block: 'div' },
                    { title: 'pre', block: 'pre' }
                ]
            },
            {
                title: 'Containers', items: [
                    { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
                    { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
                    { title: 'blockquote', block: 'blockquote', wrapper: true },
                    { title: 'hgroup', block: 'hgroup', wrapper: true },
                    { title: 'aside', block: 'aside', wrapper: true },
                    { title: 'figure', block: 'figure', wrapper: true }
                ]
            }
        ],
        visualblocks_default_state: false,
        end_container_on_empty_block: true,
        menubar: 'edit view insert format tools table ',
        toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify| fontselect fontsizeselect formatselect  | outdent indent |  numlist bullist checklist | forecolor backcolor casechange  formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [],
        table_class_list: [
            { title: 'None', value: '' },
            { title: 'Bootstrap class', value: 'table table-bordered table-striped table-hover' },
        ],
        importcss_append: true,
        templates: all_templates,
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
        tinycomments_mode: 'embedded',
        contextmenu: 'link image table configurepermanentpen',
        a11y_advanced_options: true,
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
    });
    /*
    tinymce.init({
        themes : 'dark',
        selector: 'textarea.aryaeditor',
        plugins: 'template anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'template | undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        templates : all_templates,
        content_css :MYEditorCss,
        branding: false
    });
    */
}

if ($.isFunction($.fn.maxlength)) {
    $('[maxlength]').maxlength({
        warningClass: "badge badge-primary",
        limitReachedClass: "badge badge-success"
    });
}
const numberFormat = (number) => {
    return number.toLocaleString();
}
const timeConvert = (n) => {
    var num = n;
    var hours = (num / 60);
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    return num + " minutes = " + rhours + " hour(s) and " + rminutes + " minute(s).";
}
const hourConvert = (timeString) => {
    var timeParts = timeString.split(":");
    // Extract the hour and minute parts
    var hours = parseInt(timeParts[0]); // Convert the hour part to an integer
    var minutes = parseInt(timeParts[1]); // Convert the minute part to an integer
    // Convert hours to words
    var hourText = (hours === 1) ? 'hour' : 'hours';
    // Convert minutes to words
    var minuteText = (minutes === 1) ? 'minute' : 'minutes';
    // Construct the output string
    var output = '';
    if (hours > 0) {
        output += hours + ' ' + hourText;
    }
    if (minutes > 0) {
        if (hours > 0) {
            output += ' and ';
        }
        output += minutes + ' ' + minuteText;
    }
    return output;
}
const template = (selectorId, Data = false) => {
    var deferred = $.Deferred();
    var templateSource = document.getElementById(selectorId);
    if (Data == false) {
        warn('Enter Data Please');
        deferred.reject('Enter Data Please');
    }
    else if (templateSource) {
        templateSource = templateSource.innerHTML;
        var template = Handlebars.compile(templateSource);
        var data = template(Data);
        // $('.answer-area').append(formTemplate);
        deferred.resolve(data);
    }
    else {
        warn('Template Not Found');
        deferred.reject('Template Not Found');
    }
    return deferred.promise();
}
const select2Student = (element) => {
    $(element).select2({
        templateSelection: optionsAjaxStudents,
        templateResult: optionsAjaxStudents,
        ajax: {
            url: ajax_url + 'student/filter-for-select',
            type: 'POST',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                // log(data);
                return data;
            },
            error: function (x, v, c) {
                log(x.responseText, v, c);
            },
            cache: true,
            minimumInputLength: 3, // Set the minimum number of characters before making a request
            placeholder: 'Search for Students...',
            escapeMarkup: function (markup) { return markup; } // Allows markup for formatting results
        }
    });
}
const handleImageError = (element) => {
    element.src = `${base_url}assets/dark-placeholder.png`; // Replace with the path to your placeholder image
    element.alt = 'Deleted File';
    $(element).parent().prepend('<div class="alert alert-danger mt-3">This Image Not Found.</div>');
}
const viewImage = (image) => {
    return image == null ?
        `<i class="text-danger">Empty</i>`
        : `<button data-view_image="${image}" class="btn btn-outline btn-info btn-sm">
                    <i class="fa fa-eye"></i> View File
                </button>`;
}
const isLink = (string) => {
    return string.startsWith('http');
}
const jsonToObj = (json_string) => {
    var obj = JSON.parse(json_string);
    return obj;
}
const MyConsole = (message, logType = 'log') => {
    if (enable_console) {
        switch (logType) {
            case 'warn':
                console.warn(message);
                break;
            case 'error':
                console.error(message);
                break;
            default:
                console.log(message);
        }
    }
}
const validateAmount = (amount) => {
    // Regular expression to allow numeric values with optional decimal places
    const regex = /^\d+(\.\d{1,2})?$/;
    // Check if the amount is numeric and matches the regular expression
    return $.isNumeric(amount) && regex.test(amount);
}
const createSlug = (text) => {
    return text.toLowerCase()
        .replace(/[^\w\s-]/g, '') // Remove non-word characters
        .replace(/\s+/g, '-')      // Replace spaces with hyphens
        .replace(/--+/g, '-');     // Replace multiple hyphens with a single hyphen
}
const warn = (message) => {
    MyConsole(message, 'warn');
}
const formDataObject = (form) => {
    var formDataArray = $(form).serializeArray();
    // Convert the array into a single object
    var formDataObject = {};
    $.each(formDataArray, function (i, field) {
        formDataObject[field.name] = field.value;
    });
    return formDataObject;
}
const myModel = async (title, body, submitUrl = 0) => {
    var deferred = $.Deferred();
    if (typeof submitUrl == 'string' && submitUrl) {
        ki_modal.find('form').submit(function (r) {
            r.preventDefault();
            $.AryaAjax({
                url: submitUrl,
                data: new FormData(this),
                success_message: 'Record Update Successfully.'
            }).then((res) => {
                log(res)
                deferred.resolve(res);
            });
        });
    }
    else
        deferred.resolve({ 'status': true, 'modal': ki_modal, 'form': ki_modal.find('form') });
    ki_modal.find('.title').html(title);
    ki_modal.find('.body').html(body);
    loadSomeFuncation();
    SuccessSound();
    ki_modal.modal('show');
    if (typeof submitUrl == 'boolean' && submitUrl != 0) {
        ki_modal.find('.save-btn').remove();
    }
    return deferred.promise();
}
$(document).on('click', '[data-view_image]', function () {
    var image = $(this).data('view_image');
    var title = $(this).data('title');
    title = title ? title : 'View File';
    image = `${base_url}upload/${image}`;
    ki_modal.find('.title').html('<i class="fa fa-eye fs-1 text-dark"></i> ' + title);
    ki_modal.find('.body').html(`<img src="${image}" style="width:100%;height:100%" onerror="handleImageError(this)">`);
    ki_modal.find('.modal-footer').hide();
    ki_modal.modal('show');
    ki_modal.on('hidden.bs.modal', function () {
        ki_modal.find('form').off('submit');
        ki_modal.find('.modal-footer').show();
    })
});
const EditForm = (table, url, title = 'Edit Record') => {
    table.EditForm(url, title);
}
$.fn.EditAjax = function (url, title = 'Form', model_Class = 'fullscreen') {
    var table = this;
    this.find('.edit-form-btn').on('click', function (r) {
        r.preventDefault();
        var id = $(this).data('id');
        $.AryaAjax({
            url: url,
            data: { id },
            loading_message: 'Loading Edit Form...'
        }).then((response) => {
            log(response);
            if (response.status) {
                ki_modal.find('.title').html(`Update ${title}`);
                ki_modal.find('.body').html(response.form).addClass('pb-0 pt-3');
                ki_modal.find('.modal-dialog').addClass('modal-' + model_Class);
                // ki_modal.find('').html(response.form);
                if ('url' in response) {
                    ki_modal.find('form').submit(function (r) {
                        r.preventDefault();
                        $.AryaAjax({
                            url: response.url,
                            data: new FormData(this),
                            success_message: 'Data Update Successfully..',
                        }).then((res) => {
                            log(res);
                            if (res.status) {
                                ki_modal.modal('hide');
                                table.DataTable().ajax.reload();
                            }
                            else {
                                if ('errors' in res) {
                                    toastr.clear();
                                    $.each(res.errors, function (i, v) {
                                        toastr.error(v);
                                    });
                                }
                                else {
                                    mySwal('Something Went Wrong.', 'Record not Update.', 'error')
                                }
                            }
                        });
                    });
                }
                loadSomeFuncation();
                ki_modal.modal('show');
                ki_modal.on('hidden.bs.modal', function () {
                    ki_modal.find('form').off('submit');
                    ki_modal.find('.body').html('').removeClass('pb-0 pt-3');
                    ki_modal.find('.modal-dialog').removeClass('modal-' + model_Class);
                });
            }
        });
    })
}
$.fn.DeleteEvent = function (table_name, title = '', id = 'id') {
    var table = this;
    if (table) {
        table.find('.delete-btn').on('click', function (r) {
            r.preventDefault();
            var rowData = table.DataTable().row($(this).closest('tr')).data();
            if (id in rowData) {
                SwalWarning('Confirmation', 'Are you sure for delete it.', true).then((res) => {
                    if (res.isConfirmed) {
                        $.AryaAjax({
                            url: 'deleted',
                            data: { field: id, field_value: rowData[id], table_name },
                            success_message: 'Record deleted successfully..'
                        }).then((e) => table.DataTable().ajax.reload());
                    }
                    else {
                        toastr.clear();
                        toastr.warning('Request canceled..')
                    }
                })
            }
            else
                SwalWarning('Notice', `<b class="text-danger">${field}</b> field is not exists in this table.`);
        })
    }
    return table;
}
$.fn.unDeleteEvent = function (table_name, title = '', id = 'id') {
    var table = this;
    if (table) {
        table.find('.undelete-btn').on('click', function (r) {
            r.preventDefault();
            var myTable = table.DataTable();
            var ttlRecord = myTable.rows().count();
            var rowData = myTable.row($(this).closest('tr')).data();
            if (id in rowData) {
                SwalWarning('Confirmation', 'Are you sure for moved it to main list.', true).then((res) => {
                    if (res.isConfirmed) {
                        $.AryaAjax({
                            url: 'undeleted',
                            data: { field: id, field_value: rowData[id], table_name },
                        }).then((e) => {
                            mySwal('', 'Record moved successfully..').then((res) => {
                                if (res.isConfirmed) {
                                    if (ttlRecord == 1) {
                                        location.reload();
                                    }
                                    else
                                        table.DataTable().ajax.reload();
                                }
                            })
                        });
                    }
                    else {
                        toastr.clear();
                        toastr.warning('Request canceled..')
                    }
                })
            }
            else
                SwalWarning('Notice', `<b class="text-danger">${field}</b> field is not exists in this table.`);
        })
    }
    return table;
}
$.fn.EditForm = function (url, title = 'Edit Record') {
    var table = this;
    if (table) {
        table.find('.edit-record').on('click', function (e) {
            e.preventDefault();
            var rowData = table.DataTable().row($(this).closest('tr')).data();
            if (rowData) {
                var templateSource = document.getElementById('formTemplate');
                if (templateSource) {
                    templateSource = templateSource.innerHTML;
                    var template = Handlebars.compile(templateSource);
                    var formTemplate = template(rowData);
                    myModel(title, formTemplate, url).then((d) => {
                        // log(d);

                        if (d.status) {
                            table.DataTable().ajax.reload();
                            ki_modal.modal('hide');

                        }
                        else {
                            // alert('hi');
                            if ('errors' in d) {
                                log(d.errors);
                                $.each(d.errors, function (i, v) {
                                    toastr.error(v);
                                });
                            }
                            else {
                                mySwal('Something Went Wrong.', 'Record not Update.', 'error')
                            }
                        }
                    });
                }
                else
                    SwalWarning('Template not found.', `${title} form template not found.`);
            }
        })
    }
    else
        SwalWarning('Table is Not Defined.');
    return table;
}
// $(document).on('click','.edit-record',function(){
//     var rowData = table.DataTable().row($(this).closest('tr')).data();
//     if(rowData){
//         var templateSource = document.getElementById('formTemplate').innerHTML;
//         var template = Handlebars.compile(templateSource);
//         var formTemplate = template(rowData);
//         // log(formTemplate);
//         myModel('Edit Category',formTemplate,'course/edit-category');
//         // mymodal.modal('show');
//         // const modal = new bootstrap.Modal(modalEl);
//         // modal.show();
//     }
// });
const log = (message) => {
    MyConsole(message);
}
const showPageLoading = () => {
    KTApp.showPageLoading();
}
const hidePageLoading = () => {
    KTApp.hidePageLoading();
}
const formDataToObject = (formData) => {
    const object = {};
    formData.forEach((value, key) => {
        object[key] = value;
    });
    return object;
}
const serializeFormToObject = (form) => {
    const formDataArray = $(form).serializeArray();
    const formDataObject = {};
    formDataArray.forEach(item => {
        formDataObject[item.name] = item.value;
    });
    return formDataObject;
}
const scrollToDiv = (targetDiv) => {
    $('html, body').animate({
        scrollTop: $(targetDiv).offset().top
    }, 1000); // Adjust the duration as needed
}
var optionFormat = function (item) {
    if (!item.id) {
        return item.text;
    }
    var span = document.createElement('span');
    var imgUrl = item.element.getAttribute('data-kt-select2-user');
    imgUrl = imgUrl != 'null' ? 'uploads/' + imgUrl : 'assets/media/student.png';
    var template = '';
    template += '<img src="' + base_url + imgUrl + '" class="rounded-circle h-30px me-2" alt="image"/>';
    template += item.text;
    span.innerHTML = template;
    return $(span);
}
const frontCourseOptions = (item) => {
    if (!item.id) {
        return item.text;
    }
    var span = document.createElement('span');
    var template = '';
    var imageTemplate = '';
    if (item.element.hasAttribute('data-kt-rich-content-icon')) {
        var imgUrl = item.element.getAttribute('data-kt-rich-content-icon');
        // if(im)
        imgUrl = (imgUrl && imgUrl != 'NULL' && imgUrl != 'null') ? 'upload/' + imgUrl : 'assets/media/avatars/300-1.jpg';
        imageTemplate = '<img src="' + base_url + imgUrl + '" class="rounded-circle h-40px me-3" alt="' + item.text + '"/>';
    }
    var subtitleClass = 'text-dark';
    if (item.element.hasAttribute('data-subtitle-class'))
        subtitleClass = item.element.getAttribute("data-subtitle-class")
    template += '<div class="d-flex align-items-center">';
    template += imageTemplate;
    template += '<div class="d-flex flex-column">'
    template += '<span class="fs-4 fw-bold lh-1 text-capitalize">' + item.text + '</span>';
    template += '<span class=" fs-5 text-capitalize ' + subtitleClass + '">' + item.element.getAttribute('data-kt-rich-content-subcontent') + ' <b>Total Fee ' + item.element.getAttribute('data-fee') + ' ₹</b></span>';
    template += '</div>';
    template += '</div>';
    span.innerHTML = template;
    return $(span);
}
// Format options
const optionFormatSecond = (item) => {
    if (!item.id) {
        return item.text;
    }
    var span = document.createElement('span');
    var template = '';
    var imageTemplate = '';
    if (item.element.hasAttribute('data-kt-rich-content-icon')) {
        var imgUrl = item.element.getAttribute('data-kt-rich-content-icon');
        // if(im)
        imgUrl = (imgUrl && imgUrl != 'NULL' && imgUrl != 'null') ? 'upload/' + imgUrl : 'assets/media/avatars/300-1.jpg';
        imageTemplate = '<img src="' + base_url + imgUrl + '" class="rounded-circle h-40px me-3" alt="' + item.text + '"/>';
    }
    var subtitleClass = 'text-muted';
    if (item.element.hasAttribute('data-subtitle-class'))
        subtitleClass = item.element.getAttribute("data-subtitle-class")
    template += '<div class="d-flex align-items-center">';
    template += imageTemplate;
    template += '<div class="d-flex flex-column">'
    template += '<span class="fs-4 fw-bold lh-1 text-capitalize">' + item.text + '</span>';
    template += '<span class=" fs-5 text-capitalize ' + subtitleClass + '">' + item.element.getAttribute('data-kt-rich-content-subcontent') + '</span>';
    template += '</div>';
    template += '</div>';
    span.innerHTML = template;
    return $(span);
}
const optionsAjaxStudents = (item) => {
    if (!item.id) {
        return item.student_name;
    }
    var span = document.createElement('span');
    var imageTemplate = '';
    var imgUrl = item.image;
    imgUrl = (imgUrl && imgUrl != 'NULL' && imgUrl != 'null') ? 'upload/' + imgUrl : 'assets/media/avatars/300-1.jpg';
    imageTemplate = '<img src="' + base_url + imgUrl + '" class="rounded-circle h-60px w-60px me-3" alt="' + item.student_name + '"/>';
    var template = `<div class="d-flex align-items-center">
                        ${imageTemplate}
                        <div class="d-flex flex-column">   
                            <span class="fs-4 fw-bold lh-1 text-capitalize">${item.student_name}</span>
                            <span class=" fs-5 text-capitalize "> ${item.roll_no}</span>
                            <span class=" fs-5 text-capitalize "> ${item.contact_number} ${item.alternative_mobile ? `, ` + item.alternative_mobile : ''}</span>
                        </div>
                    </div>
                    `;
    span.innerHTML = template;
    return $(span);
}
$.fn.mySelect2 = function () {
    // 'this' refers to the jQuery object containing the selected element(s)
    return this.each(function () {
        // 'this' now refers to the individual DOM element
        $(this).select2({
            templateSelection: optionFormatSecond,
            templateResult: optionFormatSecond,
        });
    });
};
// console.log(driverObj);
const loadSomeFuncation = () => {
    // SuccessSound();
    const currentDate = new Date().toISOString().split('T')[0];
    if ($.isFunction($.fn.flatpickr)) {
        // alert(dateForma);
        $(".date-with-time").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
        $(".timer").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
        // $(".selectRange-with-time").flatpickr({
        //     altInput: true,
        //     altFormat: "F j, Y",
        //     dateFormat: "Y-m-d",
        //     mode: "range",
        //     enableTime: true,
        // });
        var inputValue = $(".selectRange-with-time").val();
        if (inputValue) {
            var startDate = moment().startOf("hour");
            var endDate = moment().startOf("hour").add(32, "hour");
            // Split the value into start and end date strings using the separator "-"
            var dateRangeArray = inputValue.split(' - ');
            // Parse the start and end date strings into Moment.js objects
            startDate = moment(dateRangeArray[0], "DD-MM-YYYY hh:mm A");
            endDate = moment(dateRangeArray[1], "DD-MM-YYYY hh:mm A");
        }
        if ($.isFunction($.fn.daterangepicker)) {
            $(".selectRange-with-time").daterangepicker({
                timePicker: true,
                startDate: startDate,
                endDate: endDate,
                locale: {
                    format: "DD-MM-YYYY hh:mm A"
                }
            });
        }
        $('.select-date-month-year').flatpickr({
            dateFormat: 'M Y'
        })
        var x = $('input[name="dob"],.select-dob').flatpickr({
            dateFormat: dateFormat,
            // $("#kt_datepicker_4").flatpickr({
            onReady: function () {
                // alert(2);
                this.jumpToDate("01-01-1999")
            }
        });
        let d_DOB = false;
        if (d_DOB = $(x.input).data('value')) {
            x.setDate(d_DOB);
        }
        // console.log('date',new Date().toISOString().split('T')[0]);
        $('.current-date').flatpickr({
            maxDate: 'today',
            dateFormat: dateFormat
        });
        if ($('.selectdate').length) {
            $('.selectdate').flatpickr({
                dateFormat: dateFormat
            });
        }
        $(".single-year").flatpickr({
            enableTime: false, // Disable time selection
            dateFormat: "Y",   // Format to show only the year
            mode: "single",    // Select a single date (year)
            minDate: "1990-01-01", // Set a minimum date if needed
            maxDate: "today"  // Set a maximum date if needed
            // Additional options can be set as needed
        });
    }
    $('[data-control="select2"]').select2();
    $(document).on('change', 'input[type="checkbox"][name="schedule_status"]', function () {
        $('.selectRange-with-time').prop('disabled', !$(this).is(':checked'));
    });
    $(document).on('change', 'input[type="checkbox"][name="timer_status"]', function () {
        $('.timer').prop('disabled', !$(this).is(':checked'));
    });
};
const isWalletSystem = () => {
    return login_type == 'center' && wallet_system;
}
const isValidWallet = () => {
    if (isWalletSystem()) {
        return wallet_balance >= 0;
    }
    return true;
}
const low_balance_message = () => {
    SwalWarning('Uh oh!','Your wallet balance is running low.');
}
document.addEventListener('DOMContentLoaded', loadSomeFuncation);
// loadSomeFuncation();
const checkSound = () => {
    if (localStorage.getItem("sound-setting") !== null) {
        return localStorage.getItem("sound-setting") == 1;
    }
    return true;
}
$(document).on('click', '.set-sound-setting', function (e) {
    // alert(0);
    e.preventDefault();
    checkAndSetSound();
    console.log('yes');
});
// checkAndSetSound();
if (checkSound()) {
    $('.sound-no').addClass('hide');
    $('.sound-yes').removeClass('hide');
}
else {
    $('.sound-yes').addClass('hide');
    $('.sound-no').removeClass('hide');
}
function checkAndSetSound() {
    // toastr.options.positionClass = 'toast-top-left my-7';
    if (checkSound()) {
        localStorage.setItem('sound-setting', 0);
        $('.sound-yes').addClass('hide');
        $('.sound-no').removeClass('hide');
        toastr.error('Sound Off Successfully.');
    }
    else {
        localStorage.setItem('sound-setting', 1);
        $('.sound-no').addClass('hide');
        $('.sound-yes').removeClass('hide');
        toastr.success('Sound On Successfully.');
        SuccessSound();
    }
}
const playSound = (soundSrc) => {
    if (checkSound()) {
        var audio = new Audio(soundSrc);
        audio.volume = 0.06;
        audio.play();
    }
}
const errorSound = () => {
    playSound(base_url + 'assets/sound/error.mp3');
}
const SuccessSound = () => {
    playSound(base_url + 'assets/sound/success.mp3');
}
const generateSHA1Hash = (input) => {
    // Convert the input string to an array buffer
    const encoder = new TextEncoder();
    const data = encoder.encode(input);
    // Use SubtleCrypto API to generate SHA-1 hash
    return crypto.subtle.digest('SHA-1', data).then(buffer => {
        // Convert the hash buffer to hexadecimal representation
        const hashArray = Array.from(new Uint8Array(buffer));
        const hashHex = hashArray.map(byte => byte.toString(16).padStart(2, '0')).join('');
        return hashHex;
    });
}
const small_dom = "<'row'" +
    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
    ">" +
    "<'table-responsive'tr>" +
    "<'row'" +
    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
    ">";
$.extend(true, $.fn.dataTable.defaults, {
    // Your default options go here
    // dom: 'Blfrtip', // Example: Include buttons and length changing input
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    paging: true,
    lengthMenu: [10, 25, 50, 100],
    pageLength: 10,
    language: {
        emptyTable: "Data not found",
        zeroRecords: "No matching records found"
        // You can customize other language options as needed
    },
    searchBuilder: {
        columns: ':visible', // Include only visible columns in SearchBuilder
    },
    "language": {
        "lengthMenu": "Show _MENU_",
        // "infoEmpty":     "<div class='alert alert-danger'>No data available in table.</div>"
    },
    "dom":
        "<'row'" +
        "<'col-sm-3 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-3 d-flex align-items-center justify-content-end'f>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'B>" +
        ">" +
        "<'table-responsive'tr>" +
        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
    // Add more default options as needed
});
// Function to focus on the text after the existing text
const focusOnTextAfter = (input) => {
    // Replace 'textInput' with the actual ID of your input field
    const inputField = $(input);
    if (inputField.length) {
        const inputValue = inputField.val();
        if (inputValue.trim().length > 0) {
            // Find the position to focus after
            const positionToFocusAfter = inputValue.length;
            // Set the selection range to focus after the existing text
            inputField[0].setSelectionRange(positionToFocusAfter, positionToFocusAfter);
        }
        // Focus on the input field
        inputField.focus();
    }
}
const duration_colors = {
    month: 'info',
    year: 'primary',
    semester: 'warning'
};
const duration_badge = (type) => {
    return ($.inArray(type, duration_colors)) ? duration_colors[type] : 'danger';
}
const SwalShowloading = (message = '') => {
    Swal.fire({
        title: 'Loading....',
        html: message,
        allowOutsideClick: false,
        showCancelButton: false,
        showConfirmButton: false
    });
    Swal.showLoading();
}
const mySwal = (title = '', message, type = 'success', cancelButton = false, confirmButtonText = 'Ok') => {
    return Swal.fire({
        title: title,
        icon: type,
        html: message,
        confirmButtonText: confirmButtonText,
        showCancelButton: cancelButton,
        allowOutsideClick: false
    });
}
const SwalSuccess = (title = 'Success', message, cancelButton = false, confirmButtonText = 'OK') => {
    return mySwal(title, message, 'success', cancelButton, confirmButtonText);
}
const SwalWarning = (title = 'Notice', message, cancelButton = false, confirmButtonText = 'Ok') => {
    return mySwal(title, message, 'warning', cancelButton, confirmButtonText);
}
const badge = (html = '', my_class = 'info') => {
    return `<label class="badge badge-${my_class}">${html}</label>`;
}
const currentYear = () => {
    var currentYear = new Date().getFullYear();
    return currentYear;
}
const generateRollNumberPrefix = (instituteName) => {
    // Adjust the number of characters based on your requirement
    // return instituteName.slice(0, 2).toUpperCase();
    var initials = instituteName.match(/\b\w/g) || [];
    return initials.join('').toUpperCase();
}
const ordinal_number = (i) => {
    var suffixes = ['st', 'nd', 'rd'];
    var suffix = (i <= 3 && i >= 1) ? suffixes[i - 1] : 'th';
    return i + suffix;
}
jQuery.ucfirst = function (str) {
    // return str.charAt(0).toUpperCase() + str.slice(1);
    if (str != null)
        return str.charAt(0).toUpperCase() + str.slice(1);
    return;
};
const course_duration_humnize = (duration, duration_type, flag = true) => {
    duration_type = (duration_type + (flag ? (duration > 1 ? 's' : '') : ''));
    return (ordinal_number(duration) + ` ` + $.ucfirst(duration_type));
}
const course_duration_humnize_without_ordinal = (duration, duration_type, flag = true) => {
    duration_type = (duration_type + (flag ? (duration > 1 ? 's' : '') : ''));
    return (duration + ` ` + $.ucfirst(duration_type));
}
const SwalHideLoading = () => {
    Swal.hideLoading();
    Swal.close();
}
var deleteBtnRender = (td = 0, id = 0, message = '') => {
    return `<buton class="btn btn-danger btn-sm" data-message="${message}" data-table-filter="delete_row" data-target="${td}" data-id="${id}"><i class="ki-outline ki-trash"></i> Delete</buton>`;
}
const generate_link_btn = (id, type) => {
    return `<button data-id="${id}" data-type="${type}" class="btn click-to-view-link btn-light-primary pulse btn-sm">
    <span class="pulse-ring"></span>
        <i class="ki-outline ki-eye fs-1"></i> View
    </button>`;
}
const showResponseError = (response) => {
    if (!response.status) {
        SwalWarning('Notice', response.error);
        if (response.errors) {
            toastr.clear();
            $.each(response.errors, function (i, v) { toastr.error(v); })
        }
    }
}
const MyFormValidation = (form) => {
    return FormValidation.formValidation(
        form,
        {
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".form-group",
                    eleInvalidClass: "",
                    eleValidClass: ""
                }),
                // excluded: new FormValidation.plugins.Excluded({
                //     excluded: function (field, ele, eles) {
                //         if (form.querySelector('[name="' + field + '"]') === null) {
                //             return true;
                //         }
                //     },
                // }),
            }
        }
    );
}
var handleDeleteRows = (url) => {
    // Select all delete buttons
    var deferred = $.Deferred();
    const deleteButtons = document.querySelectorAll('[data-table-filter="delete_row"]');
    deleteButtons.forEach(d => {
        // Delete button on click
        d.addEventListener('click', function (e) {
            e.preventDefault();
            // log();
            const target = $(this).data('target');
            // Select parent row
            const parent = e.target.closest('tr');
            var id = $(this).data('id');
            if (id == 0) {
                Swal.fire({
                    html: 'Check it, Action Id Not Found.',
                    icon: 'warning'
                });
                return false;
            }
            // log(target);
            // Get customer name
            var customerName = parent.querySelectorAll('td')[target].innerHTML;
            customerName = `${customerName} ${$(this).data('message')}`;
            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            Swal.fire({
                html: "Are you sure you want to delete <b>" + customerName + "</b>?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    SwalShowloading();
                    axios.post(
                        ajax_url + url + '/' + id
                    ).then(function (e) {
                        log(e);
                        // console.log(e);  
                        deferred.resolve(e.data);
                        if (e.data.status) {
                            toastr.success('Record Deleted Successfully.');
                            parent.remove();
                        }
                        else {
                            Swal.fire({
                                text: 'Please Check It.',
                                html: e.data.html,
                                icon: "warning",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    })
                        .catch(function (t) {
                            warn(t.message);
                            warn(t.response.data);
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" },
                            });
                        })
                        .then(() => {
                            SwalHideLoading();
                        });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        html: customerName + " was not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        })
    });
    return deferred.promise();
}
function DataTableEmptyMessage(table, message = 0) {
    if (message == 0)
        message = 'No data available in table';
    table.find('.dataTables_empty').html(message);
}
$(document).on('click', '.click-to-view-link', function (r) {
    r.preventDefault();
    var id = $(this).data('id'),
        type = $(this).data('type');
    // alert(id);
    if (id && type) {
        $.AryaAjax({
            data: { id, type },
            url: 'ajax/generate-link',
            loading_message: 'Please Wait.., Generting your Link..'
        }).then((res) => {
            log(res);
            if (res.status) {
                Swal.fire('Link Generated Successfully..', '', 'success');
                window.open(res.link, '_blank');
            }
            // Swal.close();
        });
    }
});
document.addEventListener('DOMContentLoaded', function (e) {
    const fetch_duration = $('.fetch-duration');
    fetch_duration.on('change', function () {
        var selectedOption = $(this).find(':selected');
        var course_id = selectedOption.val();
        var duration = selectedOption.data('duration');
        var durationType = selectedOption.attr('data-durationType');
        // alert(durationType);
        var html = '<option></option>';
        if (durationType == 'month') {
            html += `<option value="${duration}">${course_duration_humnize(duration, durationType)}</option>`;
        }
        else {
            for (var i = 1; i <= duration; i++) {
                html += `<option value="${i}">${course_duration_humnize(i, durationType, false)}</option>`;
            }
        }
        $('.set-duration > select').html(html);
        $('.set-duration > input').val(durationType);
    });
    $(document).on('change', '.get_city', function () {
        var state_id = $(this).val();
        $('.list-cities').val(null);
        $('#load').html('<i class="text-danger"><i class="fa fa-spinner fa-spin"></i> Loading...</i>');
        $.AryaAjax({
            url: "website/get-city/option",
            data: { state_id },
            loading_message: 'Please Wait... Fetch all cities..'
        }).then((response) => {
            $('.form-group-city > select').html(response.html);
            $('#load').html('<i class="text-success"> Complete <i class="fa fa-check-circle"></i></i>');
        });
    });
});
$(document).ajaxError(function (event, jqxhr, settings, thrownError) {
    // console.log('Global AJAX Error:');
    // console.log('XHR Status:', jqxhr.status);
    // console.log('Status Text:', jqxhr.statusText);
    // console.log('Response Text:', jqxhr.responseText);
    // console.log('Settings:', settings);
    // console.log('Thrown Error:', thrownError);
    // Swal.fire({
    //     text: "Sorry, looks like there are some errors detected, please try again.",
    //     icon: "error",
    //     buttonsStyling: !1,
    //     confirmButtonText: "Ok, got it!",
    //     customClass: { confirmButton: "btn btn-primary" },
    // });
    // $('button').removeAttr('data-kt-indicator').prop('disabled', false);
    // You can add your custom error handling logic here, such as displaying a message to the user.
    // For example, you might use a library like Toastr or Swal to show a notification.
});
const filemanager = $('#filemanager_button');
if (filemanager) {
    filemanager.on('click', function () {
        var drawerEl = document.querySelector("#kt_drawer_view_details_box");
        KTDrawer.getInstance(drawerEl, { overlay: true }).hide();
        drawerEl.setAttribute('data-kt-drawer-width', "{default:'300px', 'md': '900px'}");
        var main = mydrawer(`Filemanager`);
        let body = main.find('.card-body');
        body.html('<center><i class="fa fa-spin fa-spinner"></i> Load Files..</center>')
        load_filemanager_data(body)
    });
    const load_filemanager_data = async (body) => {
        var deferred = $.Deferred();
        await $.AryaAjax({
            url: 'filemanager/files'
        }).then((data) => {
            log(data)
            deferred.resolve(data);
            if ('status' in data) {
                if (data.status) {
                    body.html('');
                    let response = data.files;
                    let div = $('<div>').attr('id', 'file-list').addClass('row');
                    if (response && response.length) {
                        for (let i = 0; i < response.length; i++) {
                            const file = response[i];
                            let id = `text_input_${i}`;
                            let img = '';
                            // var fileName = filePath.split('\\').pop().split('/').pop();
                            let extension = file.split('.').pop().toLowerCase();
                            // log(extension)
                            if (['jpg', 'jpeg', 'png', 'gif'].indexOf(extension) !== -1) {
                                img = `${base_url}${file}`;
                            } else {
                                img = 'https://via.placeholder.com/150?text=' + extension.toUpperCase();
                            }
                            div.append(`
                        <div class="col-md-3 mb-4">
                            <div class="card shadow border border-primary">
                                <div class="card-body p-0" style="width:100%;height:150px">
                                    <img src="${img}" style="width:100%;height:100%;border-radius: 8px 8px 0 0;">
                                </div>
                                <div class="card-footer btn-group p-0">
                                    <button class="btn btn-sm btn-primary copy-button" style="border-radius:0 0 0 7px" data-clipboard-target="#${id}"><i class="fa fa-copy"></i></button>
                                    <input type="hidden" id="${id}" value="${base_url}${file}">
                                    <a href="${base_url}${file}" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <button style="border-radius:0  0 7px 0" class="btn btn-sm btn-danger delete-file-button" data-file="${file}"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                            </div>
                        `);
                        }
                    }
                    else {
                        div.append(`<div class="col-md-3 mb-4">
                                <div class="card card-image shadow border border-danger">
                                    <div class="card-body p-0 p-10" style="width:100%;height:198px">
                                        <div class="text-center mt-10" style="">
                                            <img style="width:100%;height:83px" class="mx-auto " src="${base_url}assets/media/illustrations/unitedpalms-1/18.png" alt="">
                                            <center>
                                                <i class="text-danger fs-3">File not available.</i>
                                            </center>
                                        </div>                                        
                                    </div>
                                </div>
                                </div>`);
                    }
                    div.append(`<div class="col-md-3 mb-4">
                                <div class="card shadow border border-primary">
                                    <div class="card-body p-0 p-10" style="width:100%;height:198px">
                                        <div class="text-center mt-10" style="
                                        display: flex;
                                        align-content: flex-start;
                                        flex-wrap: nowrap;
                                        justify-content: space-evenly;
                                        padding-top: 55px;
                                    ">
                                            <label for="fileInput" class="btn btn-sm btn-info upload"><i class="fa fa-plus"></i> Upload FIle
                                                <input type="file" id="fileInput" style="display: none;">
                                            </label>
                                        </div>                                        
                                    </div>
                                </div>
                                </div>`);
                    body.append(div);
                    body.find('.delete-file-button').on('click', function () {
                        // alert('yes');
                        let file = $(this).data('file');
                        SwalWarning('Confirmation!', 'Are you sure you want to delete this file from Server.', true, 'Yes Delete').then((res) => {
                            if (res.isConfirmed) {
                                $.AryaAjax({
                                    url: 'filemanager/remove-file',
                                    data: { file },
                                }).then((result) => {
                                    showResponseError(result);
                                    if (result.status) {
                                        SwalSuccess('Success', 'File Removed Successfully..').then((r) => {
                                            if (r.isConfirmed)
                                                load_filemanager_data(body)
                                        }
                                        );
                                    }
                                });
                            }
                        })
                    })
                    $(document).off('change', '#fileInput').on('change', '#fileInput', function (e) {
                        var selectedFile = e.target.files[0];
                        if (!selectedFile) {
                            SwalWarning('Please select a file to upload.');
                            return;
                        }
                        let data = new FormData();
                        data.append('image', selectedFile);
                        $.AryaAjax({
                            url: 'upload-file',
                            data
                        }).then((res) => {
                            showResponseError(res);
                            if (res.status)
                                load_filemanager_data(body);
                        });
                    });
                    return;
                }
            }
            body.html('<div class="alert alert-danger">Something Went Wrong Try Again</div>')
        });
        // deferred.resolve(returnData);
        return deferred.promise();
    }
}
function save_ajax(form, url, validator) {
    var deferred = $.Deferred();
    var returnData = null;
    var submitButton = form.getElementsByTagName('button')[0];
    // console.log(submitButton);
    // Validate form before submit
    if (validator) {
        // console.log(validator);
        validator.validate().then(function (status) {
            // console.log(status);
            if (status == 'Valid') {
                // $(submitButton).attr('data-kt-indicator', 'on').prop('disabled', true);
                submitButton.setAttribute("data-kt-indicator", "on");
                submitButton.disabled = true;
                axios
                    .post(
                        ajax_url + url,
                        new FormData(form)
                    )
                    .then(function (e) {
                        returnData = e.data;
                        // console.log(returnData);
                        deferred.resolve(returnData);
                        if (returnData.status) {
                            form.reset(),
                                Swal.fire({
                                    text: returnData.html,
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                        }
                        else {
                            Swal.fire({
                                text: 'Please Check It.',
                                html: returnData.html,
                                icon: "warning",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        }
                    })
                    .catch(function (t) {
                        warn(t.message);
                        warn(t.response.data);
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn btn-primary" },
                        });
                    })
                    .then(() => {
                        submitButton.removeAttribute("data-kt-indicator", "on");
                        submitButton.disabled = false;
                        // $(submitButton).removeAttr('data-kt-indicator').prop("disabled", false);
                    });
            }
        });
    }
    return deferred.promise();
}
$(document).keydown(function (e) { if ((e.ctrlKey && e.key === "u") || (e.ctrlKey && e.shiftKey) || (e.keyCode === 27)) { e.preventDefault(); } });
const mydrawer = (title) => {
    const drawerElement = document.querySelector("#kt_drawer_view_details_box");
    const drawer = KTDrawer.getInstance(drawerElement, { overlay: true });
    drawer.update();
    drawer.show();
    const main = $('#kt_drawer_view_details_box');
    main.find('.title').html(title);
    drawer.on("kt.drawer.after.hidden", function () {
        // alert(0);
        // console.log("kt.drawer.after.hidden event is fired");
        main.find('.card-body').html('');
        main.find('.card-footer').remove();
        $('.drawer-overlay').remove();
        $('#fileInput').off('change');
    });
    return main;
}
$(document).on('click', '.view-details-drawer-btn', function (e) {
    e.preventDefault();
    // alert('Yes');
    const main = mydrawer($(this).data('title'));
    // main.find('.title').html($(this).data('title'));
    var details = $(this).data('items');
    if (details) {
        var html = `<table class="table table-bordered table-hover">`;
        $.each(details, function (key, value) {
            if (key == 'id' || key.indexOf('id') !== -1)
                return true;
            key = key.split('_').map(function (word) {
                return word.charAt(0).toUpperCase() + word.slice(1);
            }).join(' ');
            html += `<tr>
                        <th class="text-capitalize">${key}</th>
                        <td class="text-capitalize">${value}</td>
                    </tr>`;
        });
        html += `</table>`;
    }
    else {
        var html = `<div class="alert alert-danger">Details Not Found.</div>`;
        toastr.error('Detail not found');
    }
    main.find('.card-body').html(html);
});
// log(typeof KTDrawer);
//then or catch
var AryaAjaxXhr;
const request_abort = () => {
    AryaAjaxXhr && AryaAjaxXhr.abort();
    log('Request Aborted!');
};
$.AryaAjax = function (options) {
    return new Promise(function (resolve, reject) {
        // log(options);
        // Default settings
        var settings = $.extend({
            type: 'POST',
            url: '',
            data: {},
            loading_message: 'Please Wait.., Until Process is completed.',
            success_message: false,
            dataType: 'json',
            validation: false,
            page_reload: false, //After Swal Success function
        }, options);
        if (settings.data instanceof FormData) {
            $.extend(settings, {
                processData: false,
                contentType: false,
            });
        }
        // log(typeof settings.success_message);
        // log(settings);
        // return false;
        if ('boolean' !== typeof settings.validation) {
            settings.validation.validate().then(function (status) {
                // log(status);
                if (status == 'Valid') {
                    callAjax(settings);
                }
            });
        }
        else {
            callAjax(settings);
        }
        function callAjax(settings) {
            // console.log(settings);
            SwalShowloading(settings.loading_message);
            // Make the Ajax request using $.ajax
            AryaAjaxXhr = $.ajax({
                type: settings.type,
                url: ajax_url + settings.url,
                data: settings.data,
                dataType: settings.dataType,
                contentType: settings.contentType,
                processData: settings.processData,
                success: function (data) {
                    SwalHideLoading();
                    // log(data);
                    if ('login_expired' in data) {
                        warn("Session Expired.");
                        SwalWarning('Session Expired!', data.html).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                        errorSound();
                        return false;
                    }
                    // console.log(data);
                    if (data.status) {
                        SuccessSound();
                        if (typeof settings.success_message === 'string' || (typeof settings.success_message === 'boolean' && settings.success_message)) {
                            let message = typeof settings.success_message === 'boolean' ? data.html : settings.success_message;
                            SwalSuccess('Success', message).then((re) => {
                                if (re.isConfirmed) {
                                    if (settings.page_reload) {
                                        location.reload();
                                    }
                                }
                            });
                        }
                    }
                    else
                        errorSound();
                    resolve(data);
                },
                error: function (xhr, status, error) {
                    // log(status)
                    SwalHideLoading();
                    if (status) {
                        if (typeof KTDrawer == 'function') {
                            var div = mydrawer(error).find('.card-body').html(xhr.responseText);
                            div.find('div > h4').addClass('text-danger p-8 fs-3');
                            div.find('#container > h1').addClass('text-danger p-8 fs-3');
                        }
                        else {
                            SwalWarning(error, xhr.responseText);
                        }
                    }
                    errorSound();
                    reject({ xhr, status, error, myerror: xhr.responseText });
                }
            });
        }
    });
};
const Arya_ajax = (url, data = {}, type = 'post') => {
    var deferred = $.Deferred();
    // deferred.resolve(returnData); //resolved and return data
    $.ajax({
        type: type,
        url: ajax_url + url,
        data: data,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (response) {
            deferred.resolve(response);
        },
        error: function (xhr, status, error) {
            // console.error('Ajax request failed:', status, error);
            if (xhr.status === 0) {
                //   console.error('Network error: Check your internet connection.');
                deferred.reject('Network error: Check your internet connection.');
            } else if (xhr.status == 404) {
                deferred.reject('Requested page not found (404).');
                //   console.error('Requested page not found (404).');
            } else if (xhr.status == 500) {
                deferred.reject('Internal Server Error (500).');
                //   console.error('Internal Server Error (500).');
            } else {
                deferred.reject('Uncaught Error: ' + xhr.responseText);
                //   console.error('Uncaught Error: ' + xhr.responseText);
            }
        }
    });
    return deferred.promise();
}
// Select elements
const target = document.getElementById('roll_no');
if (target) {
    const button = target.nextElementSibling;
    // Init clipboard -- for more info, please read the offical documentation: https://clipboardjs.com/
    clipboard = new ClipboardJS(button, {
        target: target,
        text: function () {
            return target.innerHTML;
        }
    });
    // Success action handler
    clipboard.on('success', function (e) {
        var checkIcon = button.querySelector('.ki-check');
        var copyIcon = button.querySelector('.ki-copy');
        // Exit check icon when already showing
        if (checkIcon) {
            return;
        }
        // Create check icon
        checkIcon = document.createElement('i');
        checkIcon.classList.add('ki-duotone');
        checkIcon.classList.add('ki-check');
        checkIcon.classList.add('fs-2x');
        // Append check icon
        button.appendChild(checkIcon);
        // Highlight target
        const classes = ['text-success', 'fw-boldest'];
        target.classList.add(...classes);
        // Highlight button
        button.classList.add('btn-success');
        // Hide copy icon
        copyIcon.classList.add('d-none');
        // Revert button label after 3 seconds
        setTimeout(function () {
            // Remove check icon
            copyIcon.classList.remove('d-none');
            // Revert icon
            button.removeChild(checkIcon);
            // Remove target highlight
            target.classList.remove(...classes);
            // Remove button highlight
            button.classList.remove('btn-success');
        }, 3000)
    });
}
// log(typeof ClipboardJS)
// console.log(($.isFunction(ClipboardJS)));
if (typeof ClipboardJS !== 'undefined') {
    new ClipboardJS('.copy-button').on('success', function (e) {
        let message = $(e.trigger).data("message") ?? 'File Copied!';
        toastr.success(message);
    });
}
const enquiry_data = $('#enquiry_data');
if (enquiry_data.length) {
    enquiry_data.DataTable({
        columnDefs: [
            {
                targets: 0,
                render: function (a, v, c, d) {
                    return `${d.row + 1}.`;
                }
            },
            {
                targets: -1,
                orderable: false,
                render: function (data, type, row) {
                    return deleteBtnRender(2, data);
                }
            }
        ]
    })
    handleDeleteRows('delete-enquiry');
}
$(document).on('click', '.copy-text-data', function () {
    var button = this;
    var clipboard = new ClipboardJS(button, {
        target: function (trigger) {
            return trigger.getAttribute('data-clipboard-target');
        }
    });
    // Success action handler
    clipboard.on('success', function (e) {
        toastr.success('copied');
        var checkIcon = button.querySelector('.ki-check');
        var copyIcon = button.querySelector('.ki-copy');
        // Exit check icon when already showing
        if (checkIcon) {
            return;
        }
        // Create check icon
        checkIcon = document.createElement('i');
        checkIcon.classList.add('ki-duotone');
        checkIcon.classList.add('ki-check');
        checkIcon.classList.add('fs-2x');
        // Append check icon
        button.appendChild(checkIcon);
        // Highlight target
        const classes = ['text-success', 'fw-boldest'];
        target.classList.add(...classes);
        // Highlight button
        button.classList.add('btn-success');
        // Hide copy icon
        copyIcon.classList.add('d-none');
        // Revert button label after 3 seconds
        setTimeout(function () {
            // Remove check icon
            copyIcon.classList.remove('d-none');
            // Revert icon
            button.removeChild(checkIcon);
            // Remove target highlight
            target.classList.remove(...classes);
            // Remove button highlight
            button.classList.remove('btn-success');
        }, 3000)
    });
});
$(document).on('click', '.copy-text', function (e) {
    var target = e.target;
    if (!$(this).hasClass('copied')) {
        clipboard = new ClipboardJS(this, {
            target: target,
            text: function () {
                return target.innerHTML;
            }
        });
        // Success action handler
        clipboard.on('success', function (e) {
            // toastr.success('Copied');
            var title = $(target).attr('data-bs-original-title');
            $(target).addClass('text-success copied').attr('data-bs-original-title', 'Copied!').tooltip();
            setTimeout(function () {
                $(target).removeClass('text-success copied').attr('data-bs-original-title', title).tooltip();
            }, 2000);
        });
    }
});
const icon_picker = $('.arya-icon-picker');
if (icon_picker.length) {
    IconPicker.Init({
        jsonUrl: `${base_url}assets/icon-picker/dist/iconpicker-1.5.0.json`,
        searchPlaceholder: 'Search Icon',
        showAllButton: 'Show All',
        cancelButton: 'Cancel',
        noResultsFound: 'No results found.',
        borderRadius: '20px'
    });
    IconPicker.Run('.arya-icon-picker');
}
const main_extra_setting_form = $('.type-setting-form');
main_extra_setting_form.on('submit', (e) => {
    e.preventDefault();
    let that = e.target;
    let type = $(that).data('type') ?? false;
    let data = new FormData(that);
    data.append('type', type);
    if (type) {
        $.AryaAjax({
            url: 'cms/insert-content',
            data,
            page_reload: true,
            success_message: 'Content Update Successfull.'
        });
    }
    else
        SwalWarning("Which type of form's data are you saving?");
});
const setting_table = $('[setting-table]');
if (setting_table.length) {
    setting_table.each(function () {
        $(this).DataTable({
            dom: small_dom,
            columnDefs: [
                {
                    targets: -1,
                    render: function (data, t, row) {
                        return `<button class="delete-btn btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>`;
                    }
                }
            ]
        });
    }).find('.delete-btn').on('click', (r) => {
        var data = setting_table.DataTable().row($(r.target).parents('tr')).data();
        let id = parseInt(atob(data[data.length - 1]));
        if (id) {
            SwalWarning('Confirmation!', 'Are you sure you want to delete it.', true, 'delete it').then((r) => {
                if (r.isConfirmed) {
                    $.AryaAjax({
                        url: 'cms/delete-content',
                        data: { id: id },
                        page_reload: true,
                        success_message: 'Data Deleted Successfully..'
                    }).then((e) => log(e));
                }
            })
        }
        else {
            SwalWarning('Delete Key is not valid.');
        }
    });
}
const exta_setting_form = $('.extra-setting-form');
if (exta_setting_form) {
    const add_new_fields = $('.add-new-field');
    add_new_fields.on("click", function () {
        var field_area = $(this).closest('.card').find('.field-area');
        var index = $(field_area).data('index');
        $(field_area).append(`<div class="form-group position-relative mb-4">
                                    <input type="text" name="title[]" placeholder="Enter Title" class="form-control border border-primary border-bottom-0 br-none p-2">
                                    <input type="text" name="value[]" placeholder="Enter Value" class="form-control border border-primary border-bottom-0 br-none p-2" autocomplete="off">
                                    <a href="javascript:;" class="btn border-1 border-danger border btn-light-danger h-25px lh-0 w-100 br-none p-2"><i class="ki-outline ki-trash"></i> Delete</a>
                                </div>`).find('input:first-child').focus();
    });
    exta_setting_form.on('submit', (r) => {
        r.preventDefault();
        let that = r.target;
        let index = $(that).find('.field-area').data('index');
        let data = new FormData(that);
        data.append('type', index);
        $.AryaAjax({
            data: data,
            url: 'cms/extra-setting',
            success_message: true,
            formData: true
        });
    });
}
$(document).on('click', '.field-area a', function (d) {
    d.preventDefault();
    SwalWarning('Confirmation', 'Are You sure you want to remove this link', true).then((r) => {
        if (r.isConfirmed) {
            $(d.target).closest('div').remove();
            SwalSuccess('Now Save This Form');
        }
    })
});
$(document).on('change', '[name="avatar"]', function (e) {
    // alert('Yes');
    e.preventDefault();
    var selectedFile = this.files[0];
    if (selectedFile) {
        var id = $('#student_id').val();
        var formData = new FormData();
        formData.append('id', id);
        formData.append("file", selectedFile);
        $.AryaAjax({
            url: 'website/update-student-profile-image',
            data: formData
        }).then((res) => {
            // log(res);
            if (res.status) {
                mySwal('Successful', 'Profile Image Uploaded Successfully..');
            }
            showResponseError(res);
        });
    }
    else {
        SwalWarning('Please Select A Valid Image.');
    }
})
const upload_syllabus = $('#upload-syllabus');
if (upload_syllabus.length) {
    var syllabusValidation = MyFormValidation(document.getElementById('upload-syllabus'));
    syllabusValidation.addField('title', {
        validators: {
            notEmpty: { message: 'Please Enter Title' }
        }
    });
    syllabusValidation.addField('file', {
        validators: {
            notEmpty: { message: 'Please Select a File' },
            file: {
                extension: 'jpg,jpeg,png,gif,pdf',
                type: 'image/jpeg,image/png,image/gif,application/pdf',
                maxSize: max_upload_size, // 5 MB
                message: 'The selected file is not valid. Allowed types: jpg, jpeg, png, gif and pdf. Maximum size: 2 MB.'
            }
        }
    });
    var syllabustable = $('#list-syllabus-table');
    syllabustable.DataTable({
        dom: small_dom,
        ajax: {
            url: ajax_url + 'cms/list-syllabus'
        },
        columns: [
            { 'data': null },
            { 'data': 'title' },
            { 'data': 'file' },
            { 'data': null },
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row, meta) {
                    // log(meta);
                    return `${meta.row + 1}.`;
                }
            },
            {
                targets: 2,
                orderable: false,
                render: function (data, type, row) {
                    return `<a href="${base_url}upload/${data}" target="_blank">${data}</a>`;
                }
            },
            {
                targets: -1,
                render: function (data, type, row) {
                    return deleteBtnRender(1, row.id);
                }
            }
        ]
    }).on('draw', function (r) {
        handleDeleteRows('cms/delete-syllabus').then((result) => {
            if (result.status) {
                syllabustable.DataTable().ajax.reload();
            }
        });
    });
    upload_syllabus.on('submit', function (res) {
        res.preventDefault();
        $.AryaAjax({
            url: 'cms/upload-syllabus',
            data: new FormData(this),
            validation: syllabusValidation
        }).then((r) => {
            showResponseError(r);
            if (r.status) {
                toastr.success('Syllabus Upload Successfully.');
                syllabustable.DataTable().ajax.reload();
            }
        });
    })
}
const importScript = (scriptPath) => {
    try {
        import(scriptPath)
            .then((module) => {
                // Module successfully imported
                log(`${scriptPath} has been imported`);
            })
            .catch((error) => {
                // Handle error (file not found or other import issues)
                console.error(`Error importing ${scriptPath}:`, error);
            });
    } catch (error) {
        // Handle synchronous errors
        console.error(`Error importing ${scriptPath}:`, error);
    }
}
var pathSegments = window.location.pathname.split('/').filter(function (segment) {
    return segment !== ''; // Remove empty segments
});
// Log or use the path segments as needed
// console.log("Path Segments:", pathSegments);
var currentHost = window.location.host;
if (currentHost === 'localhost') {
    pathSegments.shift();
}
const modulePath = pathSegments[0];
const module = pathSegments[1];
//   importScript(`./${modulePath}/${module}.js`);
const checkValue = (array, value) => {
    for (var i = 0; i < array.length; i++) {
        if (array[i].page_id === value) {
            return true; // Value found
        }
    }
    return false; // Value not found
}
const list_students = (admission_status = 0) => {
    // alert(2);
    var my__table = $(document).find('#list-students');
    var dt = my__table.DataTable({
        searching: true,
        'ajax': {
            'url': ajax_url + 'student/list',
            'data': {
                admission_status
            },
            'type': 'POST',
            success: function (d) {
                // console.log(d);
                if (d.data && d.data.length) {
                    dt.clear();
                    dt.rows.add(d.data).draw();
                }
                else {
                    toastr.error('Table Data Not Found.');
                    DataTableEmptyMessage(my__table);
                    SwalWarning('Notice', `
                        <b>${admission_status ?
                            ((admission_status == 2) ?
                                'Canceled' : 'Approved') :
                            'Pending'} students are not found..</b>
                    `)
                }
            },
            'error': function (xhr, error, thrown) {
                // Custom error handling
                console.log('DataTables Error:', xhr, error, thrown);
                // Show an alert or a custom message
                alert('An error occurred while loading data. Please try again.');
            }
        },
        'columns': [
            // Specify your column configurations
            { 'data': 'roll_no' },
            { 'data': 'student_name' },
            { 'data': 'contact_number' },
            { 'data': 'email' },
            { 'data': 'course_name' },
            { 'data': 'admission_type' },
            { 'data': null }
            // Add more columns as needed
        ],
        'columnDefs': [
            {
                targets: 0,
                render: function (data) {
                    return `<div class="d-flex align-items-center flex-wrap">
                                <div class="f fw-bold me-5 copy-text-data">${data}</div>
                            </div>`;
                }
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    return `${data}`;// <a href="javascript:;" class="student-details eye-btn"><i class="text-success fa fa-eye"></i></a>`;
                }
            },
            {
                targets: 2,
                render: function (data, type, row) {
                    return `<label class="badge badge-info">${data}</label>`;
                }
            },
            {
                targets: 4,
                render: function (data, type, v) {
                    var badgeClass = duration_badge(v.duration_type);
                    var duration = course_duration_humnize_without_ordinal(v.duration, v.duration_type);
                    return `<label class="badge badge-dark">${data}</label>
                            <label class="badge badge-${badgeClass}">${duration}</label>
                            `;
                }
            },
            {
                targets: 5,
                render: function (data, type, row) {
                    return `<label class="badge badge-danger">${data}</label>
                        <label class="badge badge-info text-capitalize">Via <b> &nbsp;${row.added_by}</b></label>`;
                }
            },
            {
                targets: -1,
                data: null,
                orderable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    var student_id = row.student_id;
                    // console.log(data);
                    var button_html = `<div class="btn-group" data-id="${student_id}">`;
                    button_html += `<a href="${base_url}student/profile/${student_id}" class="btn btn-light-primary btn-sm">
                                        <i class="fa fa-eye"></i> View
                                    </a>`;
                    if (admission_status == 1) {
                        button_html += `
                            <button class="btn btn-light-warning btn-sm pending change-status">
                                    <i class="fa fa-arrow-circle-left"></i> Pending
                            </button>
                            <button class="btn btn-light-danger btn-sm cancel change-status">
                                <i class="fa fa-trash"></i> Cancel
                            </button>`;
                    }
                    else if (admission_status == 2) {
                        button_html += `
                                <button class="btn btn-light-success btn-sm approve change-status">
                                    <i class="fa fa-check"></i> Approve
                                </button>
                                <button class="btn btn-light-warning btn-sm pending change-status">
                                    <i class="fa fa-arrow-circle-left"></i> Pending
                                </button>`;
                    }
                    else {
                        button_html += `
                                <button class="btn btn-light-success btn-sm approve change-status">
                                    <i class="fa fa-check"></i> Approve
                                </button>
                                <button class="btn btn-light-danger btn-sm cancel change-status">
                                    <i class="fa fa-trash"></i> Cancel
                                </button>`;
                    }
                    return `${button_html}</div>`;
                }
            }
        ]
    }).on('draw', function (e) {
        my__table.EditForm('student/edit-form', 'Update Student');
        ki_modal.find('.modal-dialog').addClass('modal-fullscreen');
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
    $(document).on('click', '.change-status', function (r) {
        r.preventDefault();
        var student_id = $(this).closest('div').data('id');
        var type = '',
            title = '';
        if ($(this).hasClass('approve')) {
            title = 'Approved';
            type = 1;
        }
        else if ($(this).hasClass('pending')) {
            title = 'Pending';
            type = 0;
        }
        else {
            title = 'Cancel';
            type = 2;
        }
        SwalWarning('Confirmation!', `
            Do you want to ${title}, this student?
        `, true, `Ok, Change it`).then((result) => {
            if (result.isConfirmed) {
                $.AryaAjax({
                    url: 'student/change-admission-status',
                    data: {
                        student_id,
                        type,
                        title
                    },
                    success_message: `Student Admission Status is changed Succssfully..`,
                    page_reload: true
                });
            }
        });
    })
}
$(document).on('click', '.advanced-set-page', function () {
    var drawerEl = document.querySelector("#kt_drawer_example_advanced");
    drawerEl.setAttribute('data-kt-drawer-width', "{default:'400px', 'md': '600px'}");
    var drawer = KTDrawer.getInstance(drawerEl);
    // drawer.trigger(drawer, "kt.drawer.show"); // trigger show drawer
    drawer.update();
    drawer.show();
    $pages = (JSON.parse(drawerEl.getAttribute('data-pages')));
    $schema_vars = (JSON.parse(drawerEl.getAttribute('data-schema-vars')));
    var event_button = this,
        type = $(event_button).data('event'),
        type_id = $(event_button).data('event_id'),
        type_title = $(event_button).attr('title'),
        schemas = JSON.parse($(event_button).attr('data-schema')),
        main = $('#kt_drawer_example_advanced'),
        body = main.find('.card-body'),
        title = main.find('.card-title');
    var event_name = $schema_vars[type];
    // console.log(title);
    title.html(type_title + ' <b class="text-success m-2"> ' + event_name + ' </b> Set In Page');
    // var html = '';
    body.html('');
    Object.keys($pages).forEach(function (key) {
        var page = $pages[key];
        var checked = checkValue(schemas, page.id) ? 'checked' : '';
        body.append(`<div class="py-1">
                        <div class="rounded border p-5">
                            <!--begin::Input group-->
                            <div class="d-flex flex-stack">
                                <!--begin::Label-->
                                <div class="me-5">
                                    <label class="fs-3 fw-semibold form-label" for="my_page_${page.id}">${page.title}</label>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input id="my_page_${page.id}" class="form-check-input select-input" type="checkbox" value="${page.id}" ${checked}>
                                    <span class="form-check-label fw-semibold text-nowrap text-muted">
                                        Set In Page
                                    </span>
                                </label>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>`);
    });
    body.find('.select-input').change(function () {
        var action_page_id = $(this).val(),
            page_name = $(this).closest('.py-1').find('.form-label').text(),
            message = type_title + '<b>( ' + event_name + ' )</b>';
        var exists = schemas.find(function (obj) {
            return obj.page_id === action_page_id;
        });
        if (!exists) {
            var newArray = { event: type, event_id: type_id, page_id: action_page_id };
            schemas.push(newArray);
            message += ' set in ';
        }
        else {
            schemas = schemas.filter(function (obj) {
                return obj.page_id !== action_page_id;
            });
            message += ' removed ';
        }
        message += page_name + ' page successfully..';
        $(event_button).attr('data-schema', JSON.stringify(schemas));
        // warn({event : type , event_id : type_id,page_id : action_page_id});
        $.AryaAjax({
            data: { event: type, event_id: type_id, page_id: action_page_id },
            url: 'cms/event-set-in-page'
        }).then((res) => {
            toastr.info(message, ' Set ' + event_name);
        });
    });
});
$(document).on("submit", 'form.extra-setting', function (d) {
    d.preventDefault();
    var formData = new FormData(this);
    var page_reload = $(this).data('page_load');
    page_reload = page_reload ? true : false;
    $.AryaAjax({
        url: 'cms/save-extra-setting',
        data: formData,
        success_message: 'Your Proccss Compeleted Successfully.',
        page_reload: page_reload
    });
})
function createListStyles(rulePattern, rows, cols) {
    var rules = [],
        index = 0;
    for (var rowIndex = 0; rowIndex < rows; rowIndex++) {
        for (var colIndex = 0; colIndex < cols; colIndex++) {
            var x = (colIndex * 100) + "%",
                y = (rowIndex * 100) + "%",
                transforms = "{ -webkit-transform: translate3d(" + x + ", " + y + ", 0); transform: translate3d(" + x + ", " + y + ", 0); }";
            rules.push(rulePattern.replace("{0}", ++index) + transforms);
        }
    }
    var headElem = document.getElementsByTagName("head")[0],
        styleElem = $("<style>").attr("type", "text/css").appendTo(headElem)[0];
    if (styleElem.styleSheet) {
        styleElem.styleSheet.cssText = rules.join("\n");
    } else {
        styleElem.textContent = rules.join("\n");
    }
}
var stylesToSnapshot = ["transform", "-webkit-transform"];
$.fn.snapshotStyles = function () {
    if (window.getComputedStyle) {
        $(this).each(function () {
            for (var i = 0; i < stylesToSnapshot.length; i++)
                this.style[stylesToSnapshot[i]] = getComputedStyle(this)[stylesToSnapshot[i]];
        });
    }
    return this;
};
$.fn.releaseSnapshot = function () {
    $(this).each(function () {
        this.offsetHeight; // Force position to be recomputed before transition starts
        for (var i = 0; i < stylesToSnapshot.length; i++)
            this.style[stylesToSnapshot[i]] = "";
    });
};
