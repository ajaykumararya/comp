<div class="row">
    <div class="col-md-5">
        <form id="add_topic">
            <div class="{card_class}">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible">
                    <h3 class="card-title">Add Topic</h3>
                    <div class="card-toolbar rotate-180">
                        <i class="ki-duotone ki-down fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible" class="collapse show">
                    <input type="hidden" name="id" value="2">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label required">Enter Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="card-footer">
                        {publish_button}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="{card_class}">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#list">
                <h3 class="card-title">List Topic(s)</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="list" class="collapse show">
                <div class="card-body">

                    <div class="table-responsive">
                        <!--begin::Datatable-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" data-table>
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Topic</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                <?php
                                $list = $this->exam_model->list_topics();
                                if ($list->num_rows()) {
                                    foreach ($list->result() as $row) {
                                        echo '<tr>
                                            <td>' . $row->title . '</td>
                                            <td>
                                                <div class="btn-group"  data-id="' . $row->id . '">
                                                    <button class="btn btn-sm btn-info edit-topic"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-sm btn-danger delete-topic"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--end::Datatable-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="formTemplate" type="text/x-handlebars-template">
    <input type="hidden" name="id" value="{{id}}">
    <div class="form-group">
        <label for="" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" placeholder="enter Title" value="{{title}}">
    </div>
</script>
<script>
    $(document).on('submit', '#add_topic', function (e) {
        e.preventDefault();
        var form = $(this);
        $.AryaAjax({
            url: 'add-topic',
            data: { title: form.find('input[name="title"]').val() },
            success_message: 'Added Successfully.',
            page_reload: true
        }).then((r) => {
            fform.trigger('reset');
            showResponseError(r)
        });
        // $('#list').append(html);


    });
    $(document).on('click', '.edit-topic', function (e) {
        e.preventDefault();
        var id = $(this).parent().data('id');
        var td = $(this).closest('tr').find('td:first-child');
        var title = td.text();
        var template = Handlebars.compile($('#formTemplate').html());
        var data = {
            id: id,
            title: title
        };
        var html = template(data);
        ki_modal.find('.title').html(`Update Topic`);
        ki_modal.find('.body').html(html);
        ki_modal.find('form').submit(function (r) {
            r.preventDefault();
            $.AryaAjax({
                url: 'update-topic',
                data: new FormData(this),
                success_message: 'Data Update Successfully..',
            }).then((res) => {
                log(res);
                if (res.status) {
                    ki_modal.modal('hide');
                    td.text(ki_modal.find('input[name="title"]').val());
                }
                showResponseError(res)
            });
        });
        // loadSomeFuncation();
        ki_modal.modal('show');
        ki_modal.on('hidden.bs.modal', function () {
            ki_modal.find('form').off('submit');
            ki_modal.find('.body').html('').removeClass('pb-0 pt-3');
        });
    })
    /*


    */
</script>