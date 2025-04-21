<div class="row">
    <?php
    foreach (['first', 'second', 'third'] as $section):
        $icon = ES($section . '_icon');
        ?>
        <div class="col-md-4">
            <form action="" class="extra-setting">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= ucfirst($section) ?> Section</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        echo inconPickerInput($section . '_icon', $icon);
                        ?>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" id="" placeholder="Enter title"
                                value="<?= ES($section . '_title') ?>" name="<?= $section ?>_title">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Description</label>
                            <textarea type="text" class="form-control" name="<?= $section ?>_description"
                                placeholder="Enter Description"><?= ES($section . '_description') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Button Title</label>
                            <input type="text" value="<?= ES($section . '_button_title') ?>"
                                name="<?= $section ?>_button_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Button Link</label>
                            <input type="text" value="<?= ES($section . '_button_link') ?>"
                                name="<?= $section ?>_button_link" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        {publish_button}
                    </div>
                </div>
            </form>
        </div>
        <?php
    endforeach;
    ?>
</div>