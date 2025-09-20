<?php
$checkField = $this->build_db->field_exists('content', 'field8');
if (!$checkField) {
    $this->build_db->add_field('content', [
        'field8' => [
            'type' => 'longtext',
            'default' => null
        ]
    ]);
}
$enrtyCourseType = $this->SiteModel->get_contents('course_type');
?>
<div class="row">
    <div class="col-md-8">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Course</h3>
            </div>
            <div class="card-body row">
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Category</label>
                    <select name="field7" id="" data-control="select2" class="form-control"
                        data-placeholder="Select Category">
                        <option value=""></option>
                        <?php
                        $get = $this->db->get('course_category');
                        if ($get->num_rows()) {
                            foreach ($get->result() as $row) {
                                echo '<option value="' . $row->id . '">' . $row->title . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Course Type</label>
                    <select class="form-select" data-control="select2" required name="field8"
                        data-placeholder="Select Course Type">
                        <option value=""></option>
                        <?php
                        foreach ($enrtyCourseType->result() as $rr) {
                            echo '<option value="' . $rr->id . '">' . $rr->field1 . '</option>';
                        }
                        ?>
                    </select>
                </div>
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
                    <textarea required name="field3" class="form-control" placeholder="Enter Description"></textarea>
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
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Section Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="" class="form-label">Title</label>
                        <input class="form-control" name="popular_course_page_title"
                            value="<?= ES('popular_course_page_title', 'About Us') ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control"
                            name="popular_course_page_description"><?= ES('popular_course_page_description', 'Description') ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Price Button Url</label>
                        <textarea class="form-control"
                            name="popular_course_page_btn_url"><?= ES('popular_course_page_btn_url', '') ?></textarea>
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
