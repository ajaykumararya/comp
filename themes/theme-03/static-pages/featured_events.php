<div class="row">
    <div class="col-md-6 mb-5">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Featured Box Data</h3>
            </div>
            <div class="card-body">
                <div class="form-group mb-4">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="field1" required placeholder="Enter Title" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="field2" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Link</label>
                    <input type="text" name="field3" required placeholder="Enter Link" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                {publish_button}
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-6 mb-5">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Section Title</label>
                        <input type="text" name="title_of_featured_box" class="form-control"
                            value="<?= ES('title_of_featured_box', 'Our <span>Featured</span> Events') ?>"
                            placeholder="Enter Title">

                        <?php
                        $status = ES('notice_board_with_featured_box', 'hide');
                        ?>
                        <div class="form-group">
                            <label for="title" class="form-label mt-4">Notice Board</label>
                            <select data-control="select2" placeholder="Enter Principal Name"
                                name="notice_board_with_featured_box" class="form-control">
                                <option value="hide" <?= $status == 'hide' ? 'selected' : '' ?>>Hide</option>
                                <option value="show" <?= $status == 'show' ? 'selected' : '' ?>>Show</option>
                            </select>
                        </div>

                        <?php
                        echo $this->ki_theme->extra_setting_button_input("{$type}_button","Bottom Right Button");
                        ?>

                    </div>
                    <div class="card-footer">
                        {save_button}
                    </div>
                </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Featured Box Data</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Link</th>
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
                                            <?= $row->field1 ?>
                                        </td>
                                        <td>
                                            <?= symbol($row->field2) ?>
                                        </td>
                                        <td>
                                            <?= $row->field3 ?>
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