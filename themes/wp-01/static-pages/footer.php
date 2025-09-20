<style>
    .office-hours input[name="value[]"] {
        display: none;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">

            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Footer Note</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input type="text" value="<?= ES('footer_note_title') ?>" name="footer_note_title" required
                            class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea type="text" name="footer_note_description" required class="form-control"
                            placeholder="Description"><?= ES('footer_note_description') ?></textarea>
                    </div>
                    <?php
                    // echo $this->ki_theme->extra_setting_button_input("footer_note_button", "Footer Note Button");
                    
                    ?>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <?php
    $index = 'footer_first_section';
    $data_index = "{$index}_links";
    $title = 'Quick Links';
    ?>
    <div class="col-md-4">
        <form action="" class="extra-setting-form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">
                        <input name="<?= $index ?>_text" class="custom_setting_input"
                            value="<?= $this->SiteModel->get_setting($index . '_text', $title) ?>">

                    </h3>
                </div>
                <div class="card-body field-area p-3" data-index="<?= $data_index ?>">
                    <?php
                    $fields = $this->SiteModel->get_setting($data_index, '', true);
                    if ($fields) {
                        foreach ($fields as $value) {
                            $my_index = $value->title;
                            $value = $value->link;
                            echo '<div class="form-group position-relative mb-4">
                                            <input type="text" name="title[]" placeholder="Enter Title" class="form-control border border-primary border-bottom-0 br-none p-2" value="' . $my_index . '">
                                               <input type="text" name="value[]" placeholder="Enter Value" class="form-control border border-primary border-bottom-0 br-none p-2" autocomplete="off" value="' . $value . '">
                                            <a href="javascript:;" class="btn border-1 border-danger border btn-light-danger h-25px lh-0 w-100 br-none p-2"><i class="ki-outline ki-trash"></i> Delete</a>
                                        </div>';
                        }
                    }
                    ?>
                </div>
                <div class="card-footer">
                    {save_button}
                    <button type="button" class="btn btn-light-primary add-new-field"><i class="ki-outline ki-plus"></i>
                        Add new Link</button>
                </div>
            </div>
        </form>
    </div>
    <?php
    $index = 'footer_second_section';
    $data_index = "{$index}_links";
    $title = 'Office Hours';
    ?>
    <div class="col-md-4">
        <form action="" class="extra-setting-form office-hours">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">
                        <input name="<?= $index ?>_text" class="custom_setting_input"
                            value="<?= $this->SiteModel->get_setting($index . '_text', $title) ?>">

                    </h3>
                </div>
                <div class="card-body p-1">
                    Ex: - <b>Monday: 09:00 - 17:00</b>
                </div>
                <div class="card-body field-area p-3" data-index="<?= $data_index ?>">
                    <?php
                    $fields = $this->SiteModel->get_setting($data_index, '', true);
                    if ($fields) {
                        foreach ($fields as $value) {
                            $my_index = $value->title;
                            $value = $value->link;
                            echo '<div class="form-group position-relative mb-4">
                                            <input type="text" name="title[]" placeholder="Enter Open Hours" class="form-control border border-primary border-bottom-0 br-none p-2" value="' . $my_index . '">
                                               <input type="text" name="value[]" placeholder="Enter Value" class="form-control border border-primary border-bottom-0 br-none p-2" autocomplete="off" value="' . $value . '">
                                            <a href="javascript:;" class="btn border-1 border-danger border btn-light-danger h-25px lh-0 w-100 br-none p-2"><i class="ki-outline ki-trash"></i> Delete</a>
                                        </div>';
                        }
                    }
                    ?>
                </div>
                <div class="card-footer">
                    {save_button}
                    <button type="button" class="btn btn-light-primary add-new-field"><i class="ki-outline ki-plus"></i>
                        Add new Link</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mt-3">
        <?php
        $section_type = 'quick_assistance';
        $hideShowField = $section_type . '_hide_or_show';
        $hideShowFieldValue = ES($hideShowField, 'hide');
        $icon = $section_type . '_icon';
        $iconValue = ES($icon);
        $ext = $section_type . '_text';

        $btn = $section_type . '_button_title';
        $btnValue = ES($btn, '');
        $btnLink = $section_type . '_button_link';
        $btnLinkValue = ES($btnLink, '');
        ?>
        <form action="" class="extra-setting">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Assistance Section</h3>
                </div>
                <div class="card-body row">
                    <div class="form-group col-md-4">
                        <label for="" name="" class="form-label">Hide / Show</label>
                        <select class="form-select" name="<?=$hideShowField?>">
                            <option value="hide" <?= $hideShowFieldValue == 'hide' ? 'selected' : '' ?>>Hide</option>
                            <option value="show" <?= $hideShowFieldValue == 'show' ? 'selected' : '' ?>>Show</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="form-label d-flex">Chhoose Icon</label>
                        <?php
                        echo inconPickerInput($icon, $iconValue);
                        ?>
                    </div>
                    <div class="form-group col-md-12 mb-4">
                        <label for="" class="form-label">TExt</label>
                        <textarea name="<?= $ext ?>" id="" class="form-control">
                            <?php echo ES($ext, ''); ?> 
                        </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="form-label">Button Title</label>
                        <input type="text" name="<?= $btn ?>" value="<?= $btnValue ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="form-label">Button Link</label>
                        <input type="text" name="<?= $btnLink ?>" value="<?= $btnLinkValue ?>" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>