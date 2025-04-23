<div class="row">
    <div class="col-md-12">
        <form action="" class="update-ebbok-user-profile">
            <div class="<?= themeCard('main', 'panel-theme') ?>">
                <div class="<?= themeCard('header') ?>">
                    <h3 class="panel-title text-white">My Profile</h3>
                </div>
                <div class="<?= themeCard('body') ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" value="<?=$user['name']?>" name="name" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?=$user['email']?>" name="email" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Mobile</label>
                                <input type="tel" class="form-control" name="mobile"
                                    placeholder="Enter your mobile number" value="<?=$user['mobile']?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Address</label>
                                <textarea class="form-control" name="address"
                                    placeholder="Enter your address"><?=$user['address']?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="<?= themeCard('footer') ?>">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>