<section class="small_pt gray-bg" data-aos="fade-right">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center animation animated fadeInUp" data-aos="fade-up" data-animation="fadeInUp"
                    data-animation-delay="0.01s" style="animation-delay: 0.01s; opacity: 1;">
                    <div class="heading_s1 text-center">
                        <h2 class="main-heading center-heading"><i class="fa fa-search"></i> 
                        <?=$this->ki_theme->get_form_title('search_form_title','Search Center')?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php echo THEME == 'theme-07' ? '' : '<div class="col-md-3"></div>'; ?>

            <div class="col-md-6 col-md-offset-3 mb-4 mt-4">
                <form action="" class="seach-study-center-form animation animated fadeInLeft">
                    <div class="<?=themeCard('main','panel-theme')?>">
                        <div class="<?=themeCard('body')?>">
                            <div class="form-group mb-4">
                                <label class="form-label required">Select State </label>
                                <select class="form-control get_city" name="state_id" data-control="select2"
                                    data-placeholder="Select a State">
                                    <option value="">--Select--</option>
                                    <option></option>
                                    <?php
                                    $state = $this->db->order_by('STATE_NAME', 'ASC')->get('state');
                                    if ($state->num_rows()) {
                                        foreach ($state->result() as $row)
                                            echo '<option value="' . $row->STATE_ID . '">' . $row->STATE_NAME . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-4 form-group-city">
                                <label class="form-label required">Select District <span id="load"></span></label>
                                <select class="form-control list-cities" name="city_id" data-control="select2"
                                    data-placeholder="Select a City">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="<?=themeCard('footer')?>">
                            <div class="btn-wrapper btn-wrapper2">
                                <?= $this->ki_theme->set_class('btn btn-outline-success')->button('<span><i class="fa fa-search"></i> Search</span>', 'submit') ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3 list-study-centers">

        </div>
    </div>
</section>