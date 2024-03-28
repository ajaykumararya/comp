<?php
$data_index = 'important_link_page';
$title = 'Our Importent Link';
?>
<div class="row">
    <div class="col-md-4">
        <form action="" class="extra-setting-form">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">
                        
                        <input name="<?= $data_index ?>_title" class="custom_setting_input"
                                    value="<?= $this->SiteModel->get_setting($data_index . '_title', $title) ?>">
                                
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
</div>