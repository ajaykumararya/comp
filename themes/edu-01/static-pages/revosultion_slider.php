<div class="row">
    <div class="col-md-12">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Slider</h3>
            </div>
            <div class="card-body row">
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Image</label>
                    <input type="file" name="field1" class="form-control" required>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required" required>Title</label>
                    <input type="text" required name="field2" maxlength="20" class="form-control"
                        placeholder="Enter Title">
                </div>
                <div class="form-group mb-4 col-md-12">
                    <label for="" class="form-label required" required>Description</label>
                    <textarea type="text" required name="field3" maxlength="100" class="form-control"
                        placeholder="Enter Title"></textarea>
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="button_title" class="form-label mb-1 required">Button Title</label>
                    <input type="text" class="form-control" name="field4" placeholder="Button Title">
                </div>
                <div class="form-group mb-4 col-md-6">
                    <label for="button_link" class="form-label mb-1 required">Button Link</label>
                    <input type="text" class="form-control" name="field5" placeholder="Button Link">
                </div>

                <div class="form-group col-md-12">
                    <label for="" class="form-label">Animate Content</label>
                    <select name="field6" class="form-control" id="">
                        <option value="left">Left Side show Content with Animate</option>
                        <option value="right">Right Side show Content with Animate</option>
                    </select>
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
                <h3 class="card-title">List Slider(s)</h3>
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
    <div class="col-md-12 mt-4">
        <form action="" class="extra-setting">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Slider Bottom Sections</h3>
                </div>
                <div class="card-body row">
                    <div class="form-group col-md-12">
                        <label for="" class="form-label">Hide / Show</label>
                        <select name="slider_bottom_activation" id="" class="form-control">
                            <option value="hide" <?= ES('slider_bottom_activation', 'hide') == 'hide' ? 'selected' : '' ?>>
                                Hide
                            </option>
                            <option value="show" <?= ES('slider_bottom_activation', 'hide') == 'show' ? 'selected' : '' ?>>
                                Show
                            </option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-boredered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Url</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 1; $i <= 3; $i++) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?>.</td>
                                            <td>
                                                <input type="text" name="slider_bottom_<?= $i ?>_title"
                                                    class="custom_setting_input" placeholder="Title.." value="<?=ES('slider_bottom_'.$i.'_title')?>">
                                            </td>
                                            <td>
                                                <textarea type="text" name="slider_bottom_<?= $i ?>_description"
                                                    maxlength="150" class="custom_setting_input"
                                                    placeholder="Description.."><?=ES('slider_bottom_'.$i.'_description')?></textarea>

                                            </td>
                                            <td>
                                                <input type="text" name="slider_bottom_<?= $i ?>_link"
                                                    class="custom_setting_input" placeholder="LInk.." value="<?=ES('slider_bottom_'.$i.'_link')?>">

                                            </td>
                                        </tr>
                                        <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>