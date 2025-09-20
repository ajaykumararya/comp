<section class="small_pt gray-bg" data-aos="fade-right">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading">
                            <?= ES('event_form_page_title', 'प्रतिभा विद्यार्थी सम्मान समारोह') ?>
                        </h2>
                        <p><?= ES('event_form_page_description', '') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="" class="gray-bg event-data-send animation animated fadeInLeft">
                    <div class="<?= themeCard('main', 'panel-primary') ?>">
                        <div class="<?= themeCard('body') ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Full Name (पूरा नाम):</label>
                                        <input type="text" name="name" placeholder="Enter Full Name (पूरा नाम):"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Father's Name (पिता का नाम):</label>
                                        <input type="text" name="father_name" required
                                            placeholder="Enter Father's Name (पिता का नाम):" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Current Education (वर्तमान एजुकेशन ):</label>
                                        <input type="text" name="course" required
                                            placeholder="Enter Current Education (वर्तमान एजुकेशन ):" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Passing Year (पासींग एयर ): </label>
                                        <input type="text" name="duration"
                                            placeholder="Enter Passing Year (पासींग एयर ):" required
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Roll Number / Enrollment Number (रोल नंबर /
                                            नामांकन संख्या):</label>
                                        <input type="text" name="roll_no" required
                                            placeholder="Enter Roll Number / Enrollment Number (रोल नंबर / नामांकन संख्या):"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Contact Number (संपर्क नंबर):</label>
                                        <input name="mobile" type="number" required
                                            placeholder="Enter Contact Number (संपर्क नंबर):" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Email ID (ईमेल आईडी):</label>
                                        <input type="email" name="email" required
                                            placeholder="Enter Email ID (ईमेल आईडी):" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">D.O.B</label>
                                        <input type="date" name="dob" class="form-control"
                                            placeholder="Select date of birth" required name="dob">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Image (परोफ़ील इमेज ):</label>
                                        <input type="file" name="image" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label required">Educational Document (एजुकेशनल डाक्यमेन्ट
                                            )</label>
                                        <input type="file" name="educational_doc" class="form-control" required
                                            name="dob">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Other Information (अन्य विवरण):</label>
                                        <input type="text" name="other_information"
                                            placeholder="Enter Other Information (अन्य विवरण):" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="<?= themeCard('footer') ?>">
                            <div class="btn-wrapper btn-wrapper2">
                                <?= $this->ki_theme->set_class('btn btn-outline-success')->button('<span><i class="fa fa-save"></i> Submit</span>', 'submit') ?>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<script>
    $(document).on('submit', '.event-data-send', function (e) {
        e.preventDefault();
        $.AryaAjax({
            url: 'event/add-user',
            data: new FormData(this),
            success_message: 'User Added Successfully...'
        }).then((res) => {
            if (res.status) {
                $('.event-data-send')[0].reset();
            }
            showResponseError(res);
        });
    })
</script>