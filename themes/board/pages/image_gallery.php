
    <div class="container mt-4">
        <div class="text-center">
            <h1>Image <span>Gallery</span></h1>
        </div>
        <div class="container">
            <div class="row">

                <div class="image-gallery">
                    <?php
                    foreach ($gallery as $img):
                        ?>
                        <div class="image-item">
                            <a href="{base_url}upload/<?= $img['image'] ?>" data-lightbox="nceb-gallery">
                            <img src="{base_url}upload/<?= $img['image'] ?>"
                                data-full="{base_url}upload/<?= $img['image'] ?>"></a>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <!-- Modal Structure -->
                <div id="imageModal" class="modal" role="dialog" aria-label="Image View Modal">
                    <button class="close" aria-label="Close" tabindex="0">&times;</button>
                    <img class="modal-content" id="fullImage">
                </div>

            </div>
        </div>
    </div>

<style>
    .image-gallery {
        display: flex;
        flex-wrap: wrap;
        /* justify-content: center; */
        gap: 10px;
        align-items: center;
        min-height: 50vh;
    }

    .image-item img {
        width: 100%;
        border-radius: 5px;
        width: 200px;
        height: 200px;
        cursor: pointer;
        transition: 0.25s;
        border: 2px groove #0b0f34!important;
    }

    .image-item img:hover {
        transform: scale(0.97);
    }

</style>
<link href="{theme_url}assets/vendor/lightbx2/css/lightbox.min.css" rel="stylesheet" />
<script src="{theme_url}assets/vendor/lightbx2/js/lightbox.min.js"></script>