<section class="small_pt gray-bg"  data-aos="fade-right">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp"  data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fa fa-sign-in"></i> Student Login</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-md-offset-3 mb-4 mt-4">
                <form action="" class="student-login-form animation animated fadeInLeft">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label mt-2 required">Roll Number</label>
                                <input type="text" name="roll_no" placeholder="Enter Roll No." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label required">Password</label>
                                <input type="text" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <p><i class="fa fa-bell"></i> If the password has not been created or changed, then enter 2 letters of your name and the year of your date of birth. <br>Password Example : <code> AJ1998</code> </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-wrapper btn-wrapper2">
                                <?= $this->ki_theme->set_class('btn btn-outline-success')->button('<span><i class="fa fa-sign-in"></i> Login in</span>','submit') ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>