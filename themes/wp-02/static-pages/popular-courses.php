
<div class="row">
    <div class="col-md-8">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Course</h3>
            </div>
            <div class="card-body row">
                
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Image</label>
                    <input type="file" name="field1" class="form-control" required>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required" required>Title</label>
                    <input type="text" required name="field2" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group mb-4 col-md-12">
                    <label for="" class="form-label required" required>Description</label>
                    <textarea required name="field3" class="form-control" maxlength="100" placeholder="Enter Description"></textarea>
                </div>
                <div class="form-group mb-4 col-md-4">
                    <label for="button_title" class="form-label mb-1 required">Course Duration</label>
                    <input type="text" class="form-control" name="field4" placeholder="Course Duration">
                </div>
                <div class="form-group mb-4 col-md-4">
                    <label for="button_link" class="form-label mb-1 required">Eligibility</label>
                    <input type="text" class="form-control" name="field5" placeholder="CEligibility">
                </div>
                <div class="form-group mb-4 col-md-4">
                    <label for="button_link" class="form-label mb-1 required">Fee</label>
                    <input type="text" class="form-control" name="field6" placeholder="Fee">
                </div>
            </div>
            <div class="card-footer">
                {save_button}
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Section Tag Name</label>
                        <input type="text" name="<?= $type ?>_title" class="form-control"
                            value="<?= ES("{$type}_tag", 'Education') ?>"
                            placeholder="Enter Tag">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Title</label>
                        <input type="text" name="<?= $type ?>_title" class="form-control"
                            value="<?= ES("{$type}_title", 'Popular Courses') ?>"
                            placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Button Title</label>
                        <input type="text" name="<?= $type ?>_btn_title" class="form-control"
                            value="<?= ES("{$type}_btn_title", 'View All Coures') ?>"
                            placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Button Link</label>
                        <input type="text" name="<?= $type ?>_btn_link" class="form-control"
                            value="<?= ES("{$type}_btn_link", '#') ?>"
                            placeholder="Enter Title">
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Course(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
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
                                            <img src="<?= base_url('upload/' . $row->field1) ?>" style="width:100px">
                                        </td>
                                        <td>
                                            <?= $this->ki_theme->parse_string($row->field2) ?>
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
