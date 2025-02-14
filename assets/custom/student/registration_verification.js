document.addEventListener('DOMContentLoaded', function () {
    // alert(4);
    const registrationVerificationData = $('#registrationVerificationData');

    var dt = registrationVerificationData.DataTable({
        ajax: {
            url: `${ajax_url}student/registration-verification`
        },
        columns: [
            { 'data': 'registration_no' },
            { 'data': 'name' },
            { 'data': 'email' },
            { 'data': 'mobile' },
            { 'data': 'father_name' },
            { 'data': 'mother_name' },
            { 'data': 'exam_roll_no' },
            { 'data': 'enrollment_no' },
            { 'data': 'exam_or_course' },
            { 'data': 'institute_name' },
            { 'data': 'exam_centre_name' },
            { 'data': 'year' },
            { 'data': 'pass_or_fail' },
            { 'data': 'dob' },
            { 'data': 'training_period' },
            { 'data': 'address' },
            { 'data': 'status' },
            { 'data': null },
        ],
        columnDefs: [
            {
                targets: -2,
                render: function (data, type, row) {
                    return `${data == '1' ? badge('Verified', 'success') + generate_link_btn(row.id, 'registeration_certificate') : badge('Unverified', 'warning')}`;
                }
            },
            {
                targets: -1,
                orderable: false,
                render: function (data, type, row) {
                    return `<div class="btn-group">
                        <button class="btn btn-sm btn-xs btn-info check-docs"
                            data-10th_marksheet="${row['10th_marksheet']}"
                            data-photo="${row['photo']}"
                            data-12th_marksheet="${row['12th_marksheet']}"
                            data-1st_year_marksheet="${row['1st_year_marksheet']}"
                            data-2nd_year_marksheet="${row['2nd_year_marksheet']}"
                            data-diploma="${row['diploma']}"
                            data-college_no_due_slip="${row['college_no_due_slip']}"
                            data-aadhar_card="${row['aadhar_card']}"
                            data-id="${row.id}"
                            data-status="${row.status}"
                            data-examinationbody="${row.examination_body}"
                        >
                        Docs
                        </button>
                        <a  class="btn btn-sm btn-xs btn-primary" href="${base_url}student/registration-edit/${btoa(row.id)}"><i class="fa fa-edit"></i></a>
                        ${deleteBtnRender(1, row.id)}
                    </div>`;
                }
            }
        ]
    }).on('draw', function () {
        handleDeleteRows('student/delete-registration-upstate').then((res) => {
            $('#registrationVerificationData').DataTable().ajax.reload();
        })
        $(document).on('click', '.check-docs', function (r) {
            r.preventDefault();
            var data = $(this).data();
            log(data);
            var id = $(this).data('id')
            var examinationBody = $(this).data('examinationbody');
            // alert(examinationBody);
            delete data.id;
            delete data.examinationbody;
            data = Object.keys(data).sort().reduce((result, key) => {
                result[key] = data[key];
                return result;
            }, {});
            var main = mydrawer(`Document Verification`);
            let body = main.find('.card-body');
            var html = `<table class="table table-bordered table-striped table-hover">`;
            $.each(data, function (key, value) {
                key = key.split('_').map(function (word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');
                html += `<tr>
                            <th class="text-capitalize">${key}</th>
                            <td class="text-capitalize">${(key == 'Status'
                        ? `<div class="form-check form-switch">
                                            <input ${value == 1 ? 'checked' : ''} data-id="${id}" class="form-check-input change-status" type="checkbox" role="switch">
                                         </div>` : `
                                    <a class="btn btn-xs btn-sm btn-primary" href="${base_url}upload/${value}" target="_blank">View</a>         
                                `)}</td>
                        </tr>`;

            });
            html += `<tr>
                        <th>
                            <div class="form-group">
                                <textarea class="form-control examaination-body" placeholder="Examination Body">${examinationBody}</textarea>
                            </div>
                        </th>
                        <td><button class="btn btn-xs btn-sm btn-success examaination-body-button" data-id="${id}"><i class="fa fa-save"></i></button></td>
                    </tr>`;
            html += `</table>`;
            body.html(html);
        })
    });

    $(document).on('click', '.examaination-body-button', function () {
        var id = $(this).data('id');
        var examination = $(this).closest('tr').find('.examaination-body').val();
        // alert(examination);
        $.AryaAjax({
            url: 'student/update-registration-data',
            data: { id, examination },
            success_message: 'Data update successfully..'
        }).then((res) => {
            $('#registrationVerificationData').DataTable().ajax.reload();
        });
    })
    $(document).on('change', '.change-status', function () {
        // alert(3);
        var data = $(this).data();
        data.status = $(this).is(':checked') ? '1' : '0';
        // alert(data.status);
        log(data);
        $.AryaAjax({
            url: 'student/update-registration-verification-status',
            data: data
        }).then((res) => {
            // log(res);
            SwalSuccess('Updated!', `Registration Status Updated Successfully...`);
            $('#registrationVerificationData').DataTable().ajax.reload();
        });
    })


})