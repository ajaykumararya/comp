<div class="row">
    <div class="col-md-12">
        <div class="overflow-auto pb-5 mb-2">
            <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed flex-shrink-0 p-6">
                <i class="ki-duotone ki-notification-bing text-danger fs-2tx">
                    <span class="path1"></span>
                    <span class="path2"></span><span class="path3"></span>
                </i>&nbsp;
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <div class="mb-3 mb-md-0 fw-semibold">
                        <h4 class="text-gray-900 fw-bold">These details are taken from the settings only</h4>

                        <div class="fs-6 text-gray-700 pe-7">
                            <i class="ki-duotone ki-black-right fs-2 mt-1 text-danger"></i> <span class="text-danger">If
                                you update from here then I will be troubled with the settings also.</span>
                        </div>
                    </div>
                    <div>
                        <?=$this->ki_theme->with_icon('setting-2')->with_pulse('danger')->outline_dashed_style('danger')->set_class('text-danger')->add_action('Go To Setting','cms/setting')?>
                    </div>
                </div>
            </div>
        </div>
        <form action="" class="setting-update">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Update Details</h3>
                </div>
                <div class="card-body p-3">
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
</div>