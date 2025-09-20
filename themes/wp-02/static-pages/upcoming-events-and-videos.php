<?php
$type = 'upcoming-events';
?>
<div class="row">
    <div class="col-md-8">
        <form class="type-setting-form" data-type="<?= $type ?>" enctype="multipart/form-data" method="post"
            accept-charset="utf-8">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Event</h3>
                </div>
                <div class="card-body row">

                    <div class="form-group mb-4 col-md-6">
                        <label for="" class="form-label required">Date</label>
                        <input type="text" name="field1" class="form-control selectdate" value="<?= date('Y-m-d') ?>"
                            required>
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="" class="form-label required" required>Time</label>
                        <input type="text" required name="field2" class="form-control" placeholder="Enter Time Ex: 6:00 am - 12:00 pm ">
                    </div>
                    <div class="form-group mb-4 col-md-12">
                        <label for="" class="form-label required" required>Title</label>
                        <textarea required name="field3" class="form-control" maxlength="100"
                            placeholder="Enter Title"></textarea>
                    </div>
                    <div class="form-group mb-4 col-md-12">
                        <label for="button_title" class="form-label mb-1 required">Address <code>In-Short</code></label>
                        <input type="text" class="form-control" name="field4"
                            placeholder="Ex. Agra, Uttar Pradesh, India">
                    </div>
                    <div class="form-group mb-4 col-md-12">
                        <label for="button_link" class="form-label mb-1 required">Link</label>
                        <textarea type="text" class="form-control" name="field5" placeholder="Link">#</textarea>
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
                            value="<?= ES("{$type}_tag", 'Events') ?>" placeholder="Enter Tag">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Title</label>
                        <input type="text" name="<?= $type ?>_title" class="form-control"
                            value="<?= ES("{$type}_title", 'Upcoming Events') ?>" placeholder="Enter Title">
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

<hr>
<?php
$type = 'events_videos';
?>
<div class="row">
    <div class="col-md-8 row">
        <?php
        foreach (['first', 'second', 'third'] as $box):
            ?>
            <div class="col-md-12">
                <form action="" class="extra-setting">
                    <div class="{card_class} mb-4">
                        <div class="card-header">
                            <h3 class="card-title"><?= ucfirst($box) ?> Video Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="form-label">Video Title</label>
                                <input required type="text" name="<?= $type . "_{$box}_title" ?>" class="form-control"
                                    value="<?= ES("{$type}_{$box}_title", '') ?>" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="title" class="form-label">Video Link</label>
                                <input required type="text" name="<?= $type . "_{$box}_link" ?>" class="form-control"
                                    value="<?= ES("{$type}_{$box}_link", '#') ?>" placeholder="Enter Link">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            {save_button}
                        </div>
                    </div>
                </form>
            </div>
            <?php

        endforeach;
        ?>
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
                            value="<?= ES("{$type}_tag", 'Watch Video') ?>" placeholder="Enter Tag">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Title</label>
                        <input type="text" name="<?= $type ?>_title" class="form-control"
                            value="<?= ES("{$type}_title", 'Learn Anywhere') ?>" placeholder="Enter Title">
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>