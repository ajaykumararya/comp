<div class="row">
    <div class="col-md-12">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Icon Box</h3>
            </div>
            <div class="card-body row">
                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required">Icon & Color</label>
                    <div class="input-group mb-5">                        
                        <?=inconPickerInput(
                            'field1'
                        )?>
                        <span class="input-group-text" id="basic-addon2">
                            <input type="color" name="field4" value="<?=sprintf('#%06X', mt_rand(0, 0xFFFFFF))?>">
                        </span>
                    </div>
                </div>

                <div class="form-group mb-4 col-md-6">
                    <label for="" class="form-label required" required>Title</label>
                    <input type="text" required name="field2" class="form-control"
                        placeholder="Enter Title">
                </div>
                <div class="form-group mb-4 col-md-12">
                    <label for="" class="form-label required" required>Description</label>
                    <textarea type="text" required name="field3" class="form-control"
                        placeholder="Enter Title"></textarea>
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
                <h3 class="card-title">List Icon Box(s)</h3>
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
                                            <i class="<?= $row->field1?> fs-1 text-dark"></i>
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