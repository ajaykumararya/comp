<div class="row">
    <?php
$box = ['First','Second','Third'];
foreach($box as $in => $b):
    $i = ($in + 1);
    ?>
    <div class="col-md-4">
        <form action="" class="extra-setting">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title"><?=$b?> Button</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <?php
                        echo inconPickerInput('button_'.$i.'_icon', ES('button_'.$i.'_icon'));
                        $button1theme = ES('button_'.$i.'_theme');
                        // echo $button1theme;
                        ?>
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="form-label required">Title</label>
                        <input type="text" placeholder="Enter Title" required name="button_<?=$i?>_title" class="form-control"
                            value="<?= ES('button_'.$i.'_title') ?>">
                    </div>
                    <div class="form-group mb-4">
                        <label for="" class="form-label required">Theme</label>
                        <select name="button_<?=$i?>_theme" id="" data-control="select2" class="form-control">
                            <option value="box__1" <?= ($button1theme == 'box__1' ? 'selected' : '') ?>>Blue</option>
                            <option value="box__2" <?= ($button1theme == 'box__2' ? 'selected' : '') ?>>Orange</option>
                            <option value="box__3" <?= ($button1theme == 'box__3' ? 'selected' : '') ?>>Green</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label required">Redirect Link</label>
                        <textarea class="form-control" name="button_<?=$i?>_link" required placeholder="Enter Link"
                            id=""><?= ES('button_'.$i.'_link') ?></textarea>
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