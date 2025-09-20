<div class="vc_row-full-width vc_clearfix"></div>


<div class="vc_row wpb_row vc_row-fluid vc_custom_1528904308830 vc_row-o-content-middle vc_row-flex">
    <div class="wpb_column vc_column_container vc_col-sm-6">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="section-heading"> <span
                        class="section-subtitle"><?= ES("{$type}_tag", 'Education') ?></span>
                    <h2 class="section-title"><?= ES("{$type}_title", 'Popular Courses') ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right wpb_column vc_column_container vc_col-sm-6 vc_hidden-sm vc_hidden-xs">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <?php
                if ($btnTitle = ES("{$type}_btn_title", false)) {
                    echo '<a href="' . ES("{$type}_btn_link", '#') . '" class="btn btn-border lg "
                    title="' . $btnTitle . '">' . $btnTitle . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="vc_row wpb_row vc_row-fluid vc_custom_1528900661859">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="products grid-view courses-4-columns">

                    <?php
                    $data = $this->SiteModel->get_contents($type);
                    if ($data->num_rows()) {
                        foreach ($data->result() as $row) {
                            $link = $row->field3 ? $row->field3 : "#";
                            $image = base_url("assets/file/{$row->field1}");
                            ?>
                            <div
                                class="course-item post-86 product type-product status-publish has-post-thumbnail product_cat-design product_cat-web-design first instock shipping-taxable purchasable product-type-simple">
                                <div class="course-item-inner">
                                    <div class="course-thumbnail-holder">
                                        <img decoding="async" style="height: 200px;" src="<?= $image ?>"
                                            class="img-fluid wp-post-image" alt="" />
                                    </div>
                                    <div class="course-content-holder">
                                        <div class="course-content-main">
                                            <h4 class="course-title">
                                                Introduction
                                                Web Design with HTML
                                            </h4>
                                            <div class="course-rating-teacher">
                                                <div class="star-rating has-ratings" title="Rated 5.00 out of 5"> 
                                                    <span style="width:100%"> 
                                                        <span class="rating "><i class="fas fa-graduation-cap"></i> <?=$row->field5?></span> 
                                                        <!-- <span class="votes-number"></span> -->
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="course-description" style="display: block;"> 
                                                <?=$row->field3?>
                                            </div>
                                        </div>
                                        <div class="course-content-bottom">
                                            <div class="course-students"> <i class="fa fa-clock-o"></i> <span><?=$row->field4?></span>
                                            </div>
                                            <div class="course-price"> <span><i class="fa fa-inr"></i><?=$row->field6?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>