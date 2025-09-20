<div class="vc_row-full-width vc_clearfix"></div>
<div class="vc_row wpb_row vc_row-fluid vc_custom_1528900356612 vc_row-o-content-middle vc_row-flex">
    <div class="wpb_column vc_column_container vc_col-sm-6">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="section-heading"> <span
                        class="section-subtitle"><?= ES("{$type}_tag", 'Categories') ?></span>
                    <h2 class="section-title"><?= ES("{$type}_title", '') ?></h2>
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
<style>
    .course-categories .course-grid-box {
        width: 25% !important
    }
</style>
<div class="vc_row wpb_row vc_row-fluid vc_custom_1528900654922">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="course-categories">
                    <?php
                    $data = $this->SiteModel->get_contents($type);
                    if ($data->num_rows()) {
                        foreach ($data->result() as $row) {
                            $link = $row->field3 ? $row->field3 : "#";
                            ?>
                            <div class="course-grid-box ">
                                <div class="category-holder">
                                    <div class="category-holder-inner">
                                        <a href="<?= $link ?>" class="category_link"></a>
                                        <span class="category-bg"
                                            style="background-image:url({base_url}assets/file/<?= $row->field1 ?>)"></span>
                                        <div class="info-on-hover">
                                            <h4 class="category-title">
                                                <a href="<?= $link ?>">
                                                    <?= $this->ki_theme->parse_string($row->field2) ?>
                                                </a>
                                            </h4>
                                            <span class="category-count">
                                                <?= $this->db->where([
                                                    'category_id' => $row->field4,
                                                    'status' => 1,
                                                    'isDeleted' => 0
                                                ])->get('course')->num_rows() ?> Courses
                                            </span>
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