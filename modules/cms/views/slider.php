<div class="row">
    <div class="col-md-5">
        <form action="" id="save-slider" enctype="multipart/form-data">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Add Slider</h3>
                </div>
                <div class="card-body p-3">
                    <div class="form-group">
                        <label for="image" class="form-label mb-4">Select Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="{card_class}">
            <div class="card-header">
                <h3 class="card-title">List Slider Image(s)</h3>
            </div>
            <div class="card-body p-3">
                <table id="list-slider" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
// echo PATH;
if (THEME == 'theme-03') {
    $status = ES('latest_update_show','0');
    ?>
    <div class="row mt-4">
        <div class="col-md-6">
            <form action="" class="extra-setting">
                <div class="{card_class}">
                    <div class="card-header">
                        <h3 class="card-title">Latest Update(s)</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Visibilty</label>
                            <select class="form-control" name="latest_update_show" data-control="select2">
                                <option value="1" <?= $status == '1' ? 'selected' : '' ?>>Show</option>
                                <option value="0" <?= $status == '0' ? 'selected' : '' ?>>Hide</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="title">Title</label>
                            <input type="text" value="<?= ES('latest_update_title') ?>" name="latest_update_title" id="title"
                                class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group mt-3">
                            <label for="d">Description</label>
                            <textarea name="latest_update_desc" id="d" class="form-control"
                                placeholder="Description"><?= ES('latest_update_desc') ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        {publish_button}
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
}
?>
