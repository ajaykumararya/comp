<div class="row">
    <div class="col-md-6">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Manage Blog Category</h3>
            </div>
            <div class="card-body">
                <?php
                $type = 'blog_category';
                echo cms_content_form($type);
                ?>
                <div class="form-group">
                    <label class="form-label required">Category</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" required name="field1" id="a"
                            placeholder="Enter Category" autocomplete="off">
                        <span class="input-group-text p-0">
                            {save_button}
                        </span>
                    </div>
                </div>
                </form>
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