<?php
$data = $this->SiteModel->get_contents($type);
$added = $data->num_rows() ? array_column($data->result_array(),'field4') : [];               
?>
<div class="row">
    <div class="col-md-6">
        {form}
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">Add Category Image</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="form-label required">Course Category</label>
                    <select name="field4" value="#" class="form-control" data-control="select2" data-placeholder="Select Category"> 
                        <option value=""></option>
                        <?php                        
                        $get = $this->db->get('course_category');
                        $cats = [];
                        if ($get->num_rows()) {
                            foreach ($get->result() as $row) {
                                if(in_array($row->id,$added)){
                                    $cats[$row->id] = $row->title;
                                    continue;
                                }
                                echo '<option value="' . $row->id . '">' . $row->title . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <div class="text-end"> <a href="{base_url}course/category" class="btn-link"><i class="fa fa-plus"></i> Add Category</a></div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label required">Image</label>
                    <input type="file" name="field1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="" class="form-label" required>Title</label>
                    <input type="text" required name="field2" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Enter Url</label>
                    <input type="text" name="field3" required value="#" class="form-control">
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

<div class="row">
    <div class="col-md-12 mt-5">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Category Image(s)</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" setting-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($data->num_rows()):
                                $index = 1;
                                foreach ($data->result() as $row):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $index++ ?>.
                                        </td>
                                        <td><?=$cats[$row->field4]?></td>
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