<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="" class="update-ebbok-user-password">
            <div class="<?= themeCard('main', 'panel-theme') ?>">
                <div class="<?= themeCard('header') ?>">
                    <h3 class="panel-title text-white">Change Password</h3>
                </div>
                <div class="<?= themeCard('body') ?>">

                    <div class="form-group mb-4">
                        <label for="" class="form-label">Current Password</label>
                        <input type="text" class="form-control" name="current_password"
                            placeholder="Enter Current Password">
                    </div>

                    <div class="form-group mb-4">
                        <label for="" class="form-label">New Password</label>
                        <input type="text" class="form-control" name="new_password" placeholder="Enter New Password">
                    </div>

                    <div class="form-group mb-4">
                        <label for="" class="form-label">Repeat New Password</label>
                        <input type="text" class="form-control" name="repeat_new_password"
                            placeholder="Repeat New Password">
                    </div>
                </div>
                <div class="<?= themeCard('footer') ?>">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>