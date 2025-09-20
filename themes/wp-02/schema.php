<?php
if ($isPrimary) {
    $sliders = $this->SiteModel->slider();
    if ($sliders->num_rows()) {
        ?>
        <div class="slider" id="slider">
            <div class="slides">
                <?php
                foreach ($sliders->result() as $slider) {
                    ?>

                    <div class="slide <?= $slider === $sliders->first_row() ? 'active' : '' ?>">
                        <img src="<?= base_url('upload/' . $slider->image) ?>" alt="Slide 1">
                        <!-- <div class="caption">
                        <h2>First Slide</h2>
                        <p>Description for first slide.</p>
                    </div> -->
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Controls -->
            <button class="prev" onclick="prevSlide()">&#10094;</button>
            <button class="next" onclick="nextSlide()">&#10095;</button>

            <!-- Indicators -->
            <div class="indicators" id="indicators"></div>
        </div>

        <style>
            /* Slider Container */
            .slider {
                position: relative;
                width: 100%;
                height: 70vh;
                /* 🔥 Full screen ke bajaye 70% */
                overflow: hidden;
            }

            /* Slides wrapper */
            .slides {
                display: flex;
                transition: transform 0.6s ease-in-out;
                height: 100%;
            }

            /* Single Slide */
            .slide {
                flex: 0 0 100%;
                position: relative;
            }

            .slide img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }

            /* Caption */
            .caption {
                position: absolute;
                bottom: 10%;
                left: 8%;
                color: #fff;
                background: rgba(0, 0, 0, 0.45);
                padding: 12px 18px;
                border-radius: 6px;
                max-width: 35%;
                font-size: 1rem;
                line-height: 1.4;
            }

            /* Controls */
            .prev,
            .next {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(0, 0, 0, 0.5);
                color: white;
                font-size: 26px;
                border: none;
                padding: 8px 12px;
                cursor: pointer;
                border-radius: 50%;
                z-index: 2;
            }

            .prev {
                left: 10px;
            }

            .next {
                right: 10px;
            }

            .prev:hover,
            .next:hover {
                background: rgba(0, 0, 0, 0.8);
            }

            /* Indicators */
            .indicators {
                position: absolute;
                bottom: 15px;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 6px;
            }

            .indicators span {
                width: 10px;
                height: 10px;
                background: rgba(255, 255, 255, 0.6);
                border-radius: 50%;
                cursor: pointer;
                transition: 0.3s;
            }

            .indicators .active {
                background: #fff;
                transform: scale(1.2);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .slider {
                    height: 50vh;
                }

                .caption {
                    max-width: 80%;
                    font-size: 14px;
                }
            }

            @media (max-width: 480px) {
                .slider {
                    height: 40vh;
                }

                .caption {
                    max-width: 90%;
                    font-size: 12px;
                    padding: 6px 10px;
                }
            }
        </style>

        <script>
            let currentIndex = 0;
            const slides = document.querySelectorAll(".slide");
            const totalSlides = slides.length;
            const indicators = document.getElementById("indicators");

            // Create indicators dynamically
            slides.forEach((_, i) => {
                const dot = document.createElement("span");
                dot.addEventListener("click", () => showSlide(i));
                if (i === 0) dot.classList.add("active");
                indicators.appendChild(dot);
            });

            function showSlide(index) {
                if (index >= totalSlides) currentIndex = 0;
                else if (index < 0) currentIndex = totalSlides - 1;
                else currentIndex = index;

                const offset = -currentIndex * 100;
                document.querySelector(".slides").style.transform = `translateX(${offset}%)`;

                // Update indicators
                document.querySelectorAll(".indicators span").forEach((dot, i) => {
                    dot.classList.toggle("active", i === currentIndex);
                });
            }

            function nextSlide() { showSlide(currentIndex + 1); }
            function prevSlide() { showSlide(currentIndex - 1); }

            // Auto Slide
            setInterval(() => {
                nextSlide();
            }, 5000);
        </script>

        <?php
    }
} else {
    ?>
    <div class="page-title">
        <div class="container">
            <h1 class="h2">{page_name}</h1>
            <nav class="woocommerce-breadcrumb" aria-label="Breadcrumb"><a href="{base_url}">Home</a><i
                    class="fa fa-angle-right"></i>{page_name}</nav>
        </div>
    </div>
    <?php
}
?>
<div class="main-page-content" id="content">


    <div class="site-content-inner vc-container" role="main">
        <article id="post-17" class="post-17 page type-page status-publish hentry">
            <div class="entry-content">
                <div class="wpb-content-wrapper">


                    <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"
                        class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner">
                            </div>
                        </div>
                    </div>
                    <div class="vc_row-full-width vc_clearfix"></div>
                    <div class="col-md-12 pt-3 pb-4">{content}</div>

                </div>
            </div>
        </article><!-- #post -->
    </div>
</div>