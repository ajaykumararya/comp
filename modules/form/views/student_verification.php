
<section class="small_pt gray-bg"  data-aos="fade-left">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fas fa-user-check"></i>  Student Verification</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-md-offset-3 mb-4 mt-4">
                <form action="" class="student-verification-form animation animated fadeInLeft">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label mt-2">Roll Number</label>
                                <input type="text" placeholder="Enter Roll No." name="roll_no" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label mt-2">Date Of Birth</label>
                                <input value="<?=$this->ki_theme->date('1999-01-01')?>" type="date" name="dob" class="form-control select-dob">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-wrapper btn-wrapper2">
                            <?=$this->ki_theme->set_class('btn btn-outline-success')->save_button('<span><i class="fa fa-search"></i> Verify</span>',false)?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class=" show-student-details"></div>
    </div>
</section>