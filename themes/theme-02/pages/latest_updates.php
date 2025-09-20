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
        width: 100%;
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
        border-radius: 36px;
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
<?php
if (PATH == 'zcc') {
    ?>
    <section class="sec_padd">
        <div class="row" style="
    flex-direction: column;
    padding-left: 47px;
    padding-right: 45px;
">

            <div class="news-container">
                <?php
                if (ES('latest_update_title') != '') {
                    ?>
                    <div class="title">
                        <i class="fa fa-newspaper me-2" aria-hidden="true"></i> &nbsp;<?= ES('latest_update_title') ?>
                    </div>
                    <?php
                }
                ?>

                <ul class="">
                    <li><?= ES('latest_update_desc') ?></li>
                </ul>
            </div>
        </div>
    </section>
    <?php
} else {
    ?>
    <style>
        .sss{
            color: white !important;
        }
        .sss:hover{
            color: #ffc739!important
        }
        .blinking-background {
            width: 200px;
            height: 100px;
            background-color: black; /* Initial background color */
            animation: blinky 2s infinite; /* Apply the blink-bg animation */
        }

        @keyframes blinky {
            0% {
                background-color: black; /* Start color */
            }
            50% {
                background-color: #ffc739; /* Midway color */
                color:black
            }
            100% {
                background-color: black; /* End color (same as start to loop) */
            }
        }
    </style>
    <div class="news-container" style="border-radius:0;background:var(--primary)">
        <?php
        if (ES('latest_update_title') != '') {
            ?>
            <div class="title blinking-background" style="border-radius:0;background:black;color:white">
                <i class="fa fa-newspaper me-2" aria-hidden="true"></i> &nbsp;<?= ES('latest_update_title') ?>
            </div>
            <?php
        }
        ?>
        <ul class="">
            <li class="sss" style="line-height:1.5;font-size:19px"><?= ES('latest_update_desc') ?></li>
        </ul>
    </div>
    <?php
}
?>
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