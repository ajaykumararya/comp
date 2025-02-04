<form action="" class="change-center-setting">
    <input type="hidden" name="center_id" value="{id}">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-cog fs-2 me-3 text-dark"></i> Setting</h3>
            <div class="card-toolbar">
                        <?php
                        echo $this->ki_theme
                            ->with_icon('setting-2')
                            ->with_pulse('success')
                            ->outline_dashed_style('success')
                            ->button('Change Setting', 'submit');
                        ?>
                    </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Certificate Create From</label>
                        <input type="date" name="certificate_create_from" value="{certificate_create_from}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Certificate Create To</label>
                        <input type="date" name="certificate_create_to" value="{certificate_create_to}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>