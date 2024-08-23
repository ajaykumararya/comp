<div class="row">
    <div class="col-md-6">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Facility</h3>
            </div>
            <div class="card-body">
                <?php
                $cats = [];
                $getCats = $this->SiteModel->get_contents('faculty_category');
                echo '<div class="form-group mb-4">
                            <label class="form-label">Select Category</label>
                            <select class="form-control" data-control="select2" data-placeholder="Select Category" required name="field3">
                                <option></option>';
                if ($getCats->num_rows()) {
                    foreach ($getCats->result() as $row) {
                        $cats[$row->id] = $row->field1;
                        echo '<option value="' . $row->id . '">' . $row->field1 . '</option>';
                    }
                }
                echo '</select>
                        </div>';
                if (PATH == 'sewaedu') {
                    ?>
                    <div class="form-group mb-4">
                        <label for="" class="form-label required">Select Icon Image</label>
                        <input type="file" required name="field1" class="form-control">
                    </div>
                    <?php
                } else
                    echo inconPickerInput('field1');
                ?>
                <div class="form-group mt-4">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="field2" id="field2" value="" class="form-control"
                        placeholder="Enter Title">
                </div>
                <div class="form-group mt-4">
                    <label for="field4" class="form-label">Url or Link</label>
                    <textarea type="text" name="field4" id="field4" value="" class="form-control"
                        placeholder="Enter Link"></textarea>
                </div>
            </div>
            <div class="card-footer">
                {save_button}
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-6 mb-5">
        <form action="" class="type-setting-form" data-type="faculty_category" enctype="multipart/form-data"
            data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Category</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Category Title</label>
                        <input type="text" name="field1" required class="form-control" placeholder="Enter Title">
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
        <div class="{card_class} mt-3">
            <div class="card-header">
                <h3 class="card-title">List Category</h3>
            </div>
            <div class="card-body">

                <table class="table-bordered table table-striped" setting-table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Set</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($getCats->num_rows()):
                            $index = 1;
                            foreach ($getCats->result() as $row):
                                ?>
                                <tr>
                                    <td>
                                        <?= $index++ ?>.
                                    </td>
                                    <td>
                                        <?= $row->field1 ?>
                                    </td>
                                    <td><?= $this->ki_theme->drawer_button('faculty_category', $row->id, 'Faculty Category') ?>
                                    </td>

                                    <td>
                                        <?= base64_encode($row->id) ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Notice Facilities Data</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $this->SiteModel->get_contents($type);
                            if ($data->num_rows()):
                                $index = 1;
                                foreach ($data->result() as $row):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $index++ ?>.
                                        </td>
                                        <td>
                                            <?= isset($cats[$row->field3]) ? $cats[$row->field3] : badge('Deleted', 'danger') ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (PATH == 'sewaedu')
                                                echo img('upload/' . $row->field1, true, ['width' => 30]);
                                            else
                                                echo ('<i class="' . $row->field1 . ' text-dark" style="font-size: 30px"></i>');
                                            ?>
                                        </td>
                                        <td>
                                            <?= $row->field2 ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row->field4)
                                                echo anchor($row->field4, $row->field4, [
                                                    'target' => '_blank'
                                                ]);
                                            else
                                                echo '<i class="text-danger">Empty</i>';
                                            ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm btn-xs edit-faculty"><i
                                                    class="fa fa-edit"></i></button>
                                        </td>
                                        <td>
                                            <?= base64_encode($row->id) ?>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="formTemplate" type="text/x-handlebars-template">
    <div class="row"> 
    <input type="hidden" name="id" value="{{id}}">
    <div class="form-group mb-4">
        <label class="form-label required required">Title</label>
        <input type="text" name="title" class="form-control" value="{{title}}" placeholder="Enter title">
    </div>
    <div class="form-group mb-4">
        <label class="form-label required required">Link</label>
        <textarea type="text" name="link" class="form-control" placeholder="Enter Link">{{link}}</textarea>
    </div>
    </div>
</script>