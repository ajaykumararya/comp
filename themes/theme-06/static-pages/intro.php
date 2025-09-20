<div class="row">
    <div class="col-md-6">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Inro</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="form-label" required>Title</label>
                    <input type="text" required name="field1" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Enter Description</label>
                    <textarea type="text" name="field2" required class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                {save_button}
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
                        <input type="text" name="<?= $type ?>_title" class="form-control"
                            value="<?= ES("{$type}_title", '') ?>" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Description</label>
                        <textarea type="text" name="<?= $type ?>_description" class="form-control"
                            placeholder="Enter Description"><?= ES("{$type}_description", '') ?></textarea>
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
                <h3 class="card-title">List INRO Data</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
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