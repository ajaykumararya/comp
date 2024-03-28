<!------------counter section start----------------->
<section id="counter" class="sec_padd">
    <div class="container">
        <div class="text-center">
            <h1>{our_acheivements_title}</h1>
            <div class="mt-separator_center"><img src="{theme_url}assets/images/title.webp" alt="graduation.webp">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $fet = $this->SiteModel->get_our_acheivements();
                if ($fet->num_rows()) {
                    foreach ($fet->result() as $row) {
                        preg_match_all('/\d+/', $row->counter, $matches);

                        $numbers = $matches[0];
                        $counter = '';
                        $plus_sign = $row->counter;
                        if ($numbers) {
                            $counter = $numbers[0];
                            $plus_sign = str_replace($counter, '', $plus_sign);
                        }
                        ?>
                <div class="col-md-3 col-sm-6">
                    <div class="counter" data-aos="zoom-in">
                        <!-- <span class="counter-value"><?= $row->counter ?></span> -->
                                <span class="counter-value">
                                    <?= $counter ?>
                                </span><span class="plus_sign">
                                    <?= $plus_sign ?>
                                </span>
                                <h3><?= $row->description ?></h3>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!------------counter section end----------------->