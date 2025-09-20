<section class="small_pt gray-bg" data-aos="fade-left">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fa fa-list-alt"></i>
                            <?= PATH == 'upstate' ? 'Result Verification' : $this->ki_theme->get_form_title('result_verification_form_title', 'Marksheet Verification') ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php echo THEME == 'theme-07' ? '' : '<div class="col-md-3"></div>'; ?>
            <div class="col-md-6 col-md-offset-3 mb-4 mt-4">
                <form action="" class="student-result-verification-form animation animated fadeInLeft">
                    <div class="<?= themeCard('main', 'panel-primary') ?>">
                        <div class="<?= themeCard('body') ?>">
                            <?php
                            if (CHECK_PERMISSION('RESULT_VERIFICATION_WITH_SESSION')) {
                                ?>
                                <div class="form-group">
                                    <label for="" class="form-label mt-2 required">Session</label>
                                    <select required name="session" class="form-control" data-control="select2"
                                        data-placeholder="Session">
                                        <option value=""></option>
                                        <?php
                                        $sessions = $this->SiteModel->get_session();
                                        foreach ($sessions->result() as $session) {
                                            echo '<option value="' . $session->id . '">' . $session->title . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label for="" class="form-label mt-2">{rollno_text}</label>
                                <input type="text" placeholder="Enter {rollno_text}." name="roll_no"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label mt-2">Date Of Birth</label>
                                <input value="<?= date('1999-01-01') ?>" type="date" name="dob"
                                    class="form-control select-dob">
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
        <div class="row show-student-details"></div>
    </div>
</section>