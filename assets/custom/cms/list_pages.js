document.addEventListener('DOMContentLoaded', async function (e) {
    const table = $('#list-pages');
    table.DataTable({
        columnDefs: [
            {
                target: 2,
                render: function (data, type, row) {
                    var myObj = jsonToObj(row[4]);
                    return badge(isLink(myObj.link) ? 'Link' : 'Content', isLink(myObj.link) ? 'light-primary' : 'light-success');
                }
            },
            {
                target: 3,
                render: function (data, type, row) {
                    var myObj = jsonToObj(row[4]);
                    if(isLink(myObj.link))
                        return ``;
                    return `<div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input clicktosetPrimary" type="radio" value="${myObj.id}" ${data ? 'checked' : ''} name="a" id="flexRadioDefault_${row[0]}"/>
                                <label class="form-check-label text-${data ? 'info' : 'primary'}" for="flexRadioDefault_${row[0]}">
                                    ${data ? '' : 'Set Is'} Primary
                                </label>
                            </div>`;
                }
            },
            {
                target: -1,
                orderable: false,
                render: function (data, type, row, meta) {
                    // log(row);
                    var myObj = jsonToObj(data);
                    return `${ (isLink(myObj.link)) ? ``: `
                            <a href="${base_url}cms/manage-page-schema/${myObj.link}" class="btn btn-light-warning btn-sm">Manage Schema</a>
                            `}
                            <a href="${myObj.url}" class="btn btn-icon btn-light-info btn-sm" target="_blank">
                                <i class="ki-outline ki-eye"></i>
                            </a>
                            ${ !isLink(myObj.link) ? 
                            `<a href="${base_url}cms/manage-page-content/${myObj.link}" class="btn btn-sm btn-icon btn-light-primary">
                                <i class="ki-outline ki-pencil"></i>
                            </a>` : ``}
                            <button class="btn btn-light-danger btn-icon btn-sm delete-page" data-id="${myObj.id}" data-isprimary="${row[3]}">
                                <i class="ki-outline ki-trash"></i>
                            </button>
                            `;
                }
            }
        ]
    });

    $('.table-card').removeClass('fade');
    $(document).on('click','.delete-page', function() {
        var id  = $(this).data('id'),
            isPrimary = $(this).data('isprimary');
            
        if(isPrimary){
            SwalWarning('Sorry, This is a Primary Page So can\'t Delete it.');
            return false;
        }
        // alert(id);
        SwalWarning('Notice','Are You sure you want to remove this Page.',true).then((r) => {
            if (r.isConfirmed) {
                $.AryaAjax({
                    url : 'cms/delete-page',
                    data : {id},
                    success_message : 'Page Deleted Successfully.',
                    page_reload : true
                }).then( (r) => {
                    if(!r.status){
                        SwalWarning('Notice',r.html);
                    }
                });
            }
        })
    })
    $(document).on('change', '.clicktosetPrimary', function () {
        // table.reload();
        var page_id = $(this).val();
        $.AryaAjax({
            url: 'cms/update-default-page',
            data: { page_id },
            success_message: 'Updated Default Page..',
            page_reload: true, //After Swal Success function
        });
    });
});
