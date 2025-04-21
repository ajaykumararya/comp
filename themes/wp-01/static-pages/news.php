<div class="row">
    <div class="col-md-8">
        {form}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add News</h3>
            </div>
            <div class="card-body row">
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Image</label>
                    <input type="file" name="field1" class="form-control" required>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required" required>Category Title</label>
                    <input type="text" required name="field2" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group mb-4 col-md-12">
                    <label for="" class="form-label required" required>Title</label>
                    <input required name="field3" class="form-control" placeholder="Enter Title"/>
                </div>
                <div class="form-group mb-4 col-md-12">
                    <label for="" class="form-label required" required>Description</label>
                    <textarea required name="field4" maxlength="300" class="form-control" placeholder="Enter Description"></textarea>
                </div>  
                
                <div class="form-group mb-4 col-md-12">
                    <label for="" class="form-label required" required>Button Title</label>
                    <input required name="field5" class="form-control" placeholder="Enter Button Title"/>
                </div>
                <div class="form-group mb-4 col-md-12">
                    <label for="" class="form-label required" required>Button Link</label>
                    <textarea required name="field6" maxlength="300" class="form-control" placeholder="Enter Link"></textarea>
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
                <h3 class="card-title">List News</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Category</th>
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
                                            <?= $this->ki_theme->parse_string($row->field3) ?>
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