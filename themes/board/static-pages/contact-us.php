<div class="row">
    <div class="col-md-12">
        <form action="" class="setting-update">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Update Title</h3>
                </div>
                <div class="card-body p-3 row">
                    <?php
                    $sitetitle = $this->SiteModel->get_setting('title');
                    ?>
                    <div class="form-group mb-4 col-md-6">
                        <label for="image" class="form-label required">Enter Title</label>
                        <textarea name="title" id="image" class="form-control"
                            placeholder="Enter Title"><?= $sitetitle ?></textarea>
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="email" class="form-label required">Enter Email</label>
                        <input value="<?= $this->SiteModel->get_setting('email') ?>" type="email" required name="email"
                            id="email" placeholder="Enter Email" class="form-control">
                    </div>
                    <div class="form-group mb-4 col-md-6">
                        <label for="number" class="form-label required">Enter Mobile</label>
                        <input value="<?= $this->SiteModel->get_setting('number') ?>" type="text" required name="number"
                            id="number" placeholder="Enter Mobile" class="form-control">
                    </div>
                    <div class="form-group mb-4 col-md-6">
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
                    <div class="form-group mt-3">
                        <label for="" class="form-label">Google Map Url</label>
                        <textarea name="google_map_url" rows="7"
                            class="form-control"><?= $this->SiteModel->get_setting('google_map_url') ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {publish_button}
                </div>
            </div>
        </form>
    </div>
</div>