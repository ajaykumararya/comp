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
$type = 'course_type';
$enrtyCourseType = $this->SiteModel->get_contents($type);
?>
<div class="row">
    <div class="col-md-6 mt-3 mb-3">
        <form action="{base_url}cms/static-page/<?= $type ?>" class="type-setting-form" data-type="<?= $type ?>"
            enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Course Type</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input type="text" required name="field1" placeholder="Enter Title..." class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
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
                        <input class="form-control" name="search_course_page_title"
                            value="<?= ES('search_course_page_title', 'About Us') ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control"
                            name="search_course_page_description"><?= ES('search_course_page_description', 'Description') ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-3">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Course Type(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if ($enrtyCourseType->num_rows()):
                                $index = 1;
                                foreach ($enrtyCourseType->result() as $row):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $index++ ?>.
                                        </td>
                                        <td>
                                            <?= $this->ki_theme->parse_string($row->field1) ?>
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