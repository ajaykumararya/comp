<style>
    .news-container {
        /*position: fixed;*/
        /*top: 0;*/
        /*left: 0;*/
        /*right: 0;*/
        font-family: "Roboto", sans-serif;
        box-shadow: 0 4px 8px -4px rgba(0, 0, 0, 0.3);
        height: 40px;
        overflow: hidden;
        border-radius: 36px;
        background: #0b0a07;
        /*border:1px solid #55410e;*/
    }

    .news-container .title {
        position: absolute;
        background: #b68814;
        height: 40px;
        display: flex;
        align-items: center;
        padding: 20px 25px;
        color: #0b0a07;
        font-weight: bold;
        z-index: 200;
    }

    .news-container ul {
        display: flex;
        list-style: none;
        margin: 0;
        animation: scroll 25s infinite linear;
    }

    .news-container ul li {
        white-space: nowrap;
        padding: 5px;
        font-size: 25px;
        color: #ffc739;
        position: relative;
        line-height: 1;
    }

    .news-container ul li a {
        color: black !important;
    }

    .news-container ul li::after {
        content: "";
        width: 1px;
        height: 100%;
        background: #b8b8b8;
        position: absolute;
        top: 0;
        right: 0;
    }

    .news-container ul li:last-child::after {
        display: none;
    }

    @keyframes scroll {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(-1083px);

        }
    }

    html {
        overflow-x: hidden;
    }

    .news-container ul.paused {
        animation-play-state: paused;
    }
</style>
<section class="sec_padd">
    <div class="row" style="
    flex-direction: column;
    padding-left: 47px;
    padding-right: 45px;
">

        <div class="news-container">
            <!-- <div class="title">
        <i class="fa fa-newspaper me-2" aria-hidden="true"></i> <?= ES('latest_update_title') ?>
    </div> -->

            <ul class="">
                <li><?= ES('latest_update_desc') ?></li>
            </ul>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const newsContainer = document.querySelector('.news-container');
        const newsList = newsContainer.querySelector('ul');

        newsContainer.addEventListener('mouseenter', function () {
            newsList.classList.add('paused');
        });

        newsContainer.addEventListener('mouseleave', function () {
            newsList.classList.remove('paused');
        });
    });
</script>