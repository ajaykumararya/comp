<div class="row">
    <div class="col-md-6">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Testimonial</h3>
            </div>
            <div class="card-body">
                <div class="form-group mt-4">
                    <label for="field1" class="form-label required">Title</label>
                    <input type="text" required name="field1" id="field1" value="" class="form-control"
                        placeholder="Enter Title">
                </div>
                <div class="form-group mt-4">
                    <label for="field2" class="form-label required">Description</label>
                    <textarea type="text" required name="field2" id="field2" value="" class="form-control"
                        placeholder="Enter Description"></textarea>
                </div>
                <div class="form-group mt-4">
                    <label for="field1" class="form-label">Button Text</label>
                    <input type="text" name="field3" id="field1" value="" class="form-control"
                        placeholder="Enter Button Text">
                    <label for="field2" class="form-label">Button link</label>
                    <textarea type="text" name="field4" id="field2" value="" class="form-control"
                        placeholder="Enter Url"></textarea>
                </div>
            </div>
            <div class="card-footer">
                {save_button}
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action="" class="extra-setting" data-page_reload="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input name="testimonial_title" value="<?= ES('testimonial_title') ?>" class="form-control"
                            placeholder="Enter Form Title">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Sub Title</label>
                        <input name="testimonial_sub_title" value="<?= ES('testimonial_sub_title') ?>"
                            class="form-control" placeholder="Enter Form Title">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Testimonial</h3>
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
                                            <?= $row->field1 ?>
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