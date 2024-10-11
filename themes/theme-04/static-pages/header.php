<div class="row">
    <div class="col-md-12 mb-5">
        <form action="" class="extra-setting" enctype="multipart/form-data" data-page_load="true">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Header Setting</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Marquee</label>
                        <textarea name="header_marquee" class="form-control"
                            placeholder="Enter Marquee Data"><?= ES('header_marquee', '') ?></textarea>

                    </div>

                </div>
                <div class="card-footer">
                    {save_button}
                </div>
            </div>
        </form>
    </div>
</div>