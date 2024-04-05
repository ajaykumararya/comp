<div class="row">
    <div class="col-md-4">
        <form action="" id="update-logo">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Update Logo</h3>
                </div>
                <div class="card-body p-3">
                    <div class="form-group">
                        <label for="image" class="form-label mb-4 required">Logo</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">
                            <img src="<?= base_url('upload/') . $this->SiteModel->get_setting('logo') ?>" alt=""
                                id="logo" class="img-fluid w-100 h-300px">
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="" class="setting-update">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Update Title</h3>
                </div>
                <div class="card-body p-3">
                    <div class="form-group mb-4">
                        <label for="image" class="form-label required">Enter Title</label>
                        <textarea name="title" id="image" class="form-control"
                            placeholder="Enter Title"><?= $this->SiteModel->get_setting('title') ?></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email" class="form-label required">Enter Email</label>
                        <input value="<?= $this->SiteModel->get_setting('email') ?>" type="email" required name="email"
                            id="email" placeholder="Enter Email" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="number" class="form-label required">Enter Mobile</label>
                        <input value="<?= $this->SiteModel->get_setting('number') ?>" type="text" required name="number"
                            id="number" placeholder="Enter Mobile" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="wnumber" class="form-label required">Enter Whatsapp No.</label>
                        <input value="<?= $this->SiteModel->get_setting('whatsapp_number') ?>" type="text" required
                            name="whatsapp_number" id="wnumber" placeholder="Enter Whatsapp Number"
                            class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="address" class="form-label required">Enter Address</label>
                        <textarea name="address" id="address" class="form-control"
                            placeholder="Enter Address"><?= $this->SiteModel->get_setting('address') ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <form action="" class="setting-update">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Social Links</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <label class="form-label">Facebook Link</label>
                        <div class="input-group">
                            <div class="input-group-text"><img
                                    src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-facebook-m.png"
                                    width=""></div>
                            <input type="text" class="form-control" name="facebook"
                                value="<?= $this->SiteModel->get_setting('facebook') ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Instagram Link</label>
                        <div class="input-group">
                            <div class="input-group-text"><img
                                    src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-instagram-m.png"
                                    width=""></div>
                            <input type="text" class="form-control" name="instagram"
                                value="<?= $this->SiteModel->get_setting('instagram') ?>">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Twitter Link</label>
                        <div class="input-group">
                            <div class="input-group-text"><img
                                    src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-twitter-m.png"
                                    width=""></div>
                            <input type="text" class="form-control" name="twitter"
                                value="<?= $this->SiteModel->get_setting('twitter') ?>">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">LinkedIn Link</label>
                        <div class="input-group">
                            <div class="input-group-text"><img
                                    src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-linkedin-m.png"
                                    width=""></div>
                            <input type="text" class="form-control" name="linkedin"
                                value="<?= $this->SiteModel->get_setting('linkedin') ?>">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Youtube Link</label>
                        <div class="input-group">
                            <div class="input-group-text"><img
                                    src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-youtube-m.png"
                                    width=""></div>
                            <input type="text" class="form-control" name="youtube"
                                value="<?= $this->SiteModel->get_setting('youtube') ?>">
                        </div>
                    </div>
                    <!-- <div class="form-group mb-4">
                        <label class="form-label">Pinterest Link</label>
                        <div class="input-group">
                            <div class="input-group-text"><img
                                    src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-pinterest-m.png"
                                    width=""></div>
                            <input type="text" class="form-control" name="pinterest" value="">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Telegram Link</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="30" fill="currentColor"
                                    class="bi bi-telegram" viewBox="0 0 20 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z">
                                    </path>
                                </svg>
                            </div>
                            <input type="text" class="form-control" name="telegram" value="">
                        </div>
                    </div> -->
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if (THEME == 'theme-03') {
    echo '<div class="row mb-4 mt-4">
            <div class="col-md-12">
                <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-success">This is an Information</h4>
                        <span>
                        If you put <code>{newicon}</code> in the title, you will get a blinking image in the output.
                        <code>Example:- <img src="'.base_url('themes/newicon.gif').'"></code>
                        </span>
                    </div>
                </div>
            </div>    
        </div>';
}


$header_sections = $this->ki_theme->config('header_sections');
if ($header_sections) {
    ?>
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="anchor fw-bold mb-5">Header Section</h1>
        </div>
        <?php
        foreach ($header_sections as $index => $title) {
            $data_index = $index . '_links';
            ?>
            <div class="col-md-4">
                <form action="" class="extra-setting-form mb-4">
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
        }
        ?>
    </div>
    <?php
}
?>
<?php
$footer_sections = $this->ki_theme->config('footer_sections');
if ($footer_sections) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <h1 class="anchor fw-bold mb-5">Footer Section</h1>
        </div>
        <?php
        foreach ($footer_sections as $index => $title) {
            $data_index = $index . '_links';
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
        }
        ?>
    </div>
    <?php
}
?>
<!-- <div class="form-group bg-primary p-2 position-relative mb-4">
                                <input type="text" placeholder="Enter Title" class="form-control br-none p-2">
                                <input type="text" placeholder="Enter Value" class="form-control br-none p-2" autocomplete="off">
                                <a href="javascript:;" class="btn btn-light-danger h-25px lh-0 w-100 br-none p-2"><i class="ki-outline ki-trash"></i> Delete</a>
                            </div> -->