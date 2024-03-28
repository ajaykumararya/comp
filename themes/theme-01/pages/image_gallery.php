<section id="counter" class="sec_padd">
    <div class="container">
        <div class="text-center">
            <h1>Image <span>Gallery</span></h1>
            <div class="mt-separator_center"><img src="{theme_url}assets/images/title.webp" alt="graduation.webp">
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="image-gallery">
                    <?php
                    foreach ($gallery as $img):
                        ?>
                        <div class="image-item">
                            <img src="{base_url}upload/<?= $img['image'] ?>" data-full="{base_url}upload/<?= $img['image'] ?>">
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
</section>

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
        border:2px groove #b93538
    }

    .image-item img:hover {
        transform: scale(0.97);
    }

    .modal {
        position: fixed;
        z-index: 9999;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.9);
        -webkit-backdrop-filter: blur(7px);
        backdrop-filter: blur(7px);
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 500px;
        border-radius: 5px;
    }

    .close {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        padding: 0px 0px 6px 0px;
        top: 35px;
        right: 35px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: transform 0.3s;
    }

    button {
        background: none;
        border: none;
    }

    .close:hover {
        transform: scale(0.9);
    }
</style>

<script>

    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("fullImage");
    const captionText = document.getElementById("caption");
    const imageGallery = $(".image-gallery");

    imageGallery.on("click", function (event) {
        const target = event.target;
        log(target.closest(".image-item"));
        if (target.tagName === "IMG" && target.closest(".image-item")) {
            showModal(target);
        }
    });

    function showModal(img) {


        modalImg.src = img.dataset.full;
        $('#imageModal').modal('show');


        $(document).on("keydown", handleEscape, false);
    }

    function handleEscape(event) {
        if (event.key === "Escape" || event.key === "Esc") {
            closeModal();
        }
    }

    const span = document.querySelector(".close");

    span.addEventListener("click", closeModal);
    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    function closeModal() {
        $('#imageModal').modal('hide');
        document.removeEventListener("keydown", handleEscape, false);
    }
</script>