<!-- ==============================================
    ** Our Cources **
    =================================================== -->
<section class="our-cources padding-lg">
    <div class="container">
        <h2>
            <span><?= ES('popular_course_page_description', '') ?></span>
            <?= ES('popular_course_page_title', 'Courses') ?>
        </h2>
        <ul class="course-list owl-carousel">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                foreach ($data->result() as $row):
                    ?>
                    <li>
                        <div class="inner">
                            <figure><img src="{base_url}upload/<?= $row->field1 ?>" alt=""></figure>
                            <h3><?= $row->field2 ?></h3>
                            <p><?= $row->field3 ?></p>
                            <div class="bottom-txt clearfix">
                                <div class="duration">
                                    <h4><?= $row->field4 ?></h4>
                                    <span> Courses</span>
                                </div>
                                <a href="<?= $row->field5 ?? '#' ?>"><span class="icon-more-icon"></span></a>
                            </div>
                        </div>
                    </li>
                    <?php
                endforeach;
            endif;
            ?>
        </ul>
    </div>
</section>