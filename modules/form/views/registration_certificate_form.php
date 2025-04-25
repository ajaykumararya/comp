<section class="small_pt gray-bg" data-aos="fade-left">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fa fa-list-alt"></i> Registration Verification
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php echo THEME == 'theme-07' ? '' : '<div class="col-md-3"></div>'; ?>
            <div class="col-md-6 col-md-offset-3 mb-4 mt-4">
                <form action="" class="student-registration-form-verification animation animated fadeInLeft">
                    <div class="<?= themeCard('main', 'panel-primary') ?>">
                        <div class="<?= themeCard('body') ?>">
                            <div class="form-group">
                                <label for="" class="form-label mt-2">Registration Number</label>
                                <input type="text" placeholder="Enter Registration Number" name="registration_no"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="<?= themeCard('footer') ?>">
                            <div class="btn-wrapper btn-wrapper2">
                                <?= $this->ki_theme->set_class('btn btn-outline-success')->save_button('<span><i class="fa fa-search"></i> Verify</span>', false) ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row student-registration-data-response"></div>
    </div>
</section>