<?php
$type = 'events';
?>
<div class="row">
    <div class="col-md-8">
        <form action="{base_url}cms/static-page/<?= $type ?>" class="type-setting-form" data-type="<?= $type ?>"
            enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Event</h3>
                </div>
                <div class="card-body row">
                    <div class="form-group mb-4 col-md-12">
                        <label for="" class="form-label required">Title</label>
                        <input required type="text" placeholder="Enter Title" name="field2" class="form-control">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="" class="form-label required">Date</label>
                        <input required type="text" class="form-control selectdate" name="field1"
                            value="{current_date}">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="" class="form-label required">City</label>
                        <input required type="text" name="field3" placeholder="Enter City" class="form-control">
                    </div>
                    <div class="form-group mb-4 col-md-12">
                        <label for="" class="form-label required">Description</label>
                        <textarea required name="field4" placeholder="Enter Description" id=""
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="" class="extra-setting" enctype="multipart/form-data">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Event Section Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="" class="form-label d-flex">Icon</label>
                        <?= inconPickerInput($type . '_section_icon', ES($type . '_section_icon')) ?>
                    </div>
                    <div class="form-group">
                        <label for="r" class="form-label mb-4 required">Section Title</label>
                        <input type="text" name="<?= $type ?>_section_title" id="r"
                            value="<?= ES($type . '_section_title') ?>" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-3">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Event(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>City</th>
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
                                            <?= $this->ki_theme->parse_string($row->field2) ?>
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

<hr/>

<?php
$type = 'faq';
?>
<div class="row">
    <div class="col-md-8">
        <form action="{base_url}cms/static-page/<?= $type ?>" class="type-setting-form" data-type="<?= $type ?>"
            enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add FAQ</h3>
                </div>
                <div class="card-body row">
                    <div class="form-group mb-4 col-md-12">
                        <label for="" class="form-label required">Title</label>
                        <input required type="text" placeholder="Enter Title" name="field1" class="form-control">
                    </div>
                    <div class="form-group mb-4 col-md-12">
                        <label for="" class="form-label required">Description</label>
                        <textarea required name="field2" placeholder="Enter Description" id=""
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="" class="extra-setting" enctype="multipart/form-data">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">FAQ Section Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label for="" class="form-label d-flex">Icon</label>
                        <?= inconPickerInput($type . '_section_icon', ES($type . '_section_icon')) ?>
                    </div>
                    <div class="form-group">
                        <label for="r" class="form-label mb-4 required">Section Title</label>
                        <input type="text" name="<?= $type ?>_section_title" id="r"
                            value="<?= ES($type . '_section_title') ?>" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-3">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List FAQ(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
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
                                            <?= $row->field2 ?>
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