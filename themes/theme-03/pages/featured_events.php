<style>
    .galleryWrap {
        display: -webkit-flex;
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .galleryWrap .fancybox2 {
        width: 25%;
        position: relative;
        border: 1px solid #888888;
    }

    @media (max-width: 600px) {
        .galleryWrap .fancybox2 {
            width: 50%;
        }
    }

    .galleryWrap .fancybox2 .overlay {
        position: absolute;
        overflow: hidden;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(247, 147, 29, .8);
        opacity: 0;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all .4s ease-in-out;
        -o-transition: all .4s ease-in-out;
        transition: all .4s ease-in-out;
        text-align: center;
    }

    .galleryWrap .fancybox2 .overlay .fa {
        display: block;
        text-align: center;
        text-transform: uppercase;
        color: #fff;
        position: absolute;
        width: 100%;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        font-size: 16px;
    }

    .galleryWrap .fancybox2 .overlay::after {
        content: "";
        position: absolute;
        border: 1px solid #fff;
        left: 10px;
        right: 10px;
        top: 10px;
        bottom: 10px;
    }

    .galleryWrap .fancybox2:hover>.overlay {
        opacity: 1;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }


    .btn-default {
        float: right;
    }
</style>
<?php
$noticeBoard = ES('notice_board_with_featured_box', 'hide') == 'show';
$col = $noticeBoard ? 8 : 12;
$imageHEight = $noticeBoard ? 170 : 250;
?>
<div class="clearfix row">
    <div class="col-lg-<?= $col ?>">
        <div class="clearfix title-wrap">
            <h2 class="secTitle">
                <?= ES('title_of_featured_box', 'Our <span>Featured</span> Events') ?>
            </h2>
        </div>
        <div class="clearfix galleryWrap">
            <?php
            $data = content($type);
            if ($data->num_rows()) {
                foreach ($data->result() as $row) {
                    echo '<a class="fancybox2" href="' . $row->field3 . '" title="">
                            ' . img([
                            'src' => UPLOAD . $row->field2,
                            'style' => 'width:100%;height:' . $imageHEight . 'px'
                        ]) . '
                            <span class="overlay">
                                <p style="margin-top:50px;">' . $row->field1 . '</p>
                            </span>
                        </a>';
                }
            }
            ?>

        </div>
        <div class="clearfix text-right">
            <?php
            if ($buttonTitle = ES("{$type}_button_text")):
                ?>
                <a href="<?= ES("${type}_button_link") ?>" class="btn btn-default">
                    <span>
                        <span class="hvr-bounce-to-right"><?= $buttonTitle ?></span>
                    </span>
                </a>
                <?php
            endif;
            ?>
        </div>
    </div>
    <?php
    if ($noticeBoard):
        echo '<div class="col-lg-4">';
        echo notice_board();
        echo '</div>';
    endif;
    ?>

</div>