<div class="row">
    <div class="col-md-8">
        {form}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Event</h3>
            </div>
            <div class="card-body row">
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Image</label>
                    <input type="file" name="field1" class="form-control" required>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required" required>Event Name</label>
                    <input type="text" required name="field2" class="form-control" placeholder="Enter Event Name">
                </div>
                <div class="form-group mb-4 col-md-12">
                    <label for="" class="form-label required" required>Description</label>
                    <textarea required name="field3" maxlength="100" class="form-control" placeholder="Enter Description"></textarea>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Timings</label>
                    <input type="text" name="field4" class="form-control" placeholder="17:00 - 18:00" required>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required" required>Date</label>
                    <input type="date" required name="field5" class="form-control" placeholder="Enter Event Name">
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Button Title</label>
                    <input type="text" name="field6" class="form-control" placeholder="Button Title" required>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required" required>Button Link </label>
                    <input type="text" required name="field7" class="form-control" placeholder="Enter Link">
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
                        <input class="form-control" name="<?= $type ?>_page_title"
                            value="<?= ES($type . '_page_title', '') ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control"
                            name="<?= $type ?>_page_description"><?= ES($type . '_page_description', '') ?></textarea>
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
                <h3 class="card-title">List Event(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Date</th>
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
                                            <?= $this->ki_theme->parse_string($row->field5) ?> , <?= $this->ki_theme->parse_string($row->field4) ?>
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