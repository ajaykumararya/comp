document.addEventListener('DOMContentLoaded', function () {
    const list_forms = $('#list_forms').DataTable();
    $(document).find('.student-admission-setting').on('click', function () {
        // alert(2);
        const type = $(this).data('type');
        // my_model()
        $.AryaAjax({
            url: 'cms/form-setting',
            data: { type }
        }).then(res => {
            log(res);
            var drawerEl = document.querySelector("#kt_drawer_view_details_box");
            KTDrawer.getInstance(drawerEl, { overlay: true }).hide();
            drawerEl.setAttribute('data-kt-drawer-width', "{default:'300px', 'md': '900px'}");
            const box = mydrawer('Student Admission Form Setting on Front');
            // box.find('.card-body').html(res.html)
            const details = res.results;
            if (details) {
                var html = `<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Institite Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>`;
                $.each(details, function (key, value) {

                    html += `<tr>
                                <th class="text-capitalize">${value.institute_name}</th>
                                <td class="text-capitalize">
                                    
                                    <div class="form-check form-switch form-check-custom form-check-solid me-10">
                                        <input class="form-check-input h-20px w-30px show-in-front" ${value.show_in_front == 1 ? 'checked' : ''} type="checkbox" value="${value.id}"/>
                                    </div>
                                </td>
                            </tr>`;
                });
                html += `</table>`;
            }
            else {
                var html = `<div class="alert alert-danger">Details Not Found.</div>`;
                toastr.error('Detail not found');
            }
            box.find('.card-body').html(html).css('padding', 0);
            box.find('.table').DataTable({
                paging: false,
                dom: small_dom
            });
            box.find('.show-in-front').on("change", function () {
                const id = $(this).val();
                const status = $(this).is(':checked') ? 1 : 0;
                $.AryaAjax({
                    url: 'cms/center-show-in-front',
                    data: { id, status },
                    success_message: 'Status Changed Successfully..'
                });
            })
        });
    })
})