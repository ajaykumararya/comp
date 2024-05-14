<style>
    /* facility-section STYLING
-------------------------------------------------- */
    .facility-section { background: #e8e8e8;  }
    .imageGallery { margin: 0 -5px; }
    .imageGallery a{ float: left; width: -webkit-calc(25% - 10px); width: calc(25% - 10px);
        border: 1px solid #ddd; box-shadow: 0 0 2px #ddd; margin: 5px;
    }
    .imageGallery a img {width: 100%; border: 0; }
    .fancybox-content { border: 10px solid #fff; }
    .fancybox-caption{ font-size: 20px; font-weight: 400; text-transform: capitalize; text-align: center; }
    .fancybox-caption::after { display: none; }

    /* GALLERY CAROUSEL STYLING
    -------------------------------------------------- */
    .gallery-carousel-wrap{ margin: 30px 0 0; }
    .galpic { height: 300px;display: block; position: relative; border: 1px solid rgb(19,72,125); padding: 5px;}
    .galpic img { border: 3px solid rgb(19,72,125); width: 100%; height: 100%;}
    .galpic .galpic-hover { transition: all ease .5s; opacity: 0; position: absolute; top: 0; left: 0; right: 0;
        width: 100%; height: 0; background-color: rgba(247, 147, 29, .8); color: #fff; padding: 15px;
    }
    .galpic:hover .galpic-hover { opacity: 1; height: 100%; }
    .galpic .galpic-hover h3{ text-align: center; font-weight: 600; border-top: 1px solid #fff; border-bottom: 1px solid #fff; text-transform: uppercase; letter-spacing: 1px; }
    .galpic .galpic-hover .fa { font-size: 50px; }
    .grid-padding{ padding:10px;}

</style>
<div class="row">
    <?php
    $list = $this->db->get('gallery_images');
    if($list->num_rows()):
        foreach($list->result() as $image):
            $img = base_url('upload/'.$image->image);
    ?>
    <div class="grid-padding col-xs-12 col-sm-12 col-md-3">
        <a data-fancybox="gallery" href="<?=$img?>"
            data-thumbnail="<?=$img?>"
            class="galpic img-responsive" data-caption="excurtion">
            <img src="<?=$img?>" >
            <div class="galpic-hover d-flex align-items-center justify-content-center"><?=$image->title?></div>
        </a>
        <div class="card text-center">
            <div class="card-body"><?=$image->title?></div>
        </div>
    </div>
    <?php
        endforeach;
    endif;
    ?>
</div>