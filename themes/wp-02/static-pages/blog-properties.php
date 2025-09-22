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
    <?php
    $type = 'manage-blog';
    ?>
    <div class="col-md-6 mb-5">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Section Tag Name</label>
                        <input type="text" name="<?= $type ?>_title" class="form-control"
                            value="<?= ES("{$type}_tag", 'Categories') ?>"
                            placeholder="Enter Tag">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Title</label>
                        <input type="text" name="<?= $type ?>_title" class="form-control"
                            value="<?= ES("{$type}_title", '') ?>"
                            placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Button Title</label>
                        <input type="text" name="<?= $type ?>_btn_title" class="form-control"
                            value="<?= ES("{$type}_btn_title", '') ?>"
                            placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Section Button Link</label>
                        <input type="text" name="<?= $type ?>_btn_link" class="form-control"
                            value="<?= ES("{$type}_btn_link", '#') ?>"
                            placeholder="Enter Title">
                    </div>
                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>