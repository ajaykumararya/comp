<style>
    /* facility-section STYLING
-------------------------------------------------- */
    .facility-section {
        background: #e8e8e8;
    }

    .imageGallery {
        margin: 0 -5px;
    }

    .imageGallery a {
        float: left;
        width: -webkit-calc(25% - 10px);
        width: calc(25% - 10px);
        border: 1px solid #ddd;
        box-shadow: 0 0 2px #ddd;
        margin: 5px;
    }

    .imageGallery a img {
        width: 100%;
        border: 0;
    }

    .fancybox-content {
        border: 10px solid #fff;
    }

    .fancybox-caption {
        font-size: 20px;
        font-weight: 400;
        text-transform: capitalize;
        text-align: center;
    }

    .fancybox-caption::after {
        display: none;
    }

    /* GALLERY CAROUSEL STYLING
    -------------------------------------------------- */
    .gallery-carousel-wrap {
        margin: 30px 0 0;
    }

    .galpic {
        height: 300px;
        display: block;
        position: relative;
        border: 1px solid var(--primary-color);
        padding: 5px;
    }

    .galpic img {
        border: 3px solid var(--primary-color);
        width: 100%;
        height: 100%;
    }


</style>
<section class="small_pb">
<div class="container">
    <div class="row">
        <?php
        $list = $this->db->get('gallery_images');
        if ($list->num_rows()):
            foreach ($list->result() as $image):
                $img = base_url('upload/' . $image->image);
                ?>
                <div class="grid-padding col-xs-12 col-sm-12 col-md-3">
                    <a data-fancybox="gallery" href="<?= $img ?>" data-thumbnail="<?= $img ?>" class="galpic img-responsive"
                        data-caption="<?= $image->title ?>">
                        <img src="<?= $img ?>">
                        <div class="galpic-hover d-flex align-items-center justify-content-center"><?= $image->title ?></div>
                    </a>
                    <?php
                    if ($image->title != ''):
                        ?>
                        <div class="card text-center">
                            <div class="card-body"><?= $image->title ?></div>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </div>
</div>
</section>