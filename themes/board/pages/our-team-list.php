<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    .rs-team .team-item {
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .rs-team .team-item:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .rs-team .team-item .team-img {
        position: relative;
    }

    .rs-team .team-item .team-img .normal-text {
        position: absolute;
        text-align: center;
        height: 80px;
        bottom: -1px;
        padding: 17px 0;
        width: 100%;
        left: 50%;
        transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        background-color: rgb(11 15 52 / 83%);
        transition: .3s ease all;
        z-index: 10;
    }

    .rs-team .team-item .team-img .normal-text .team-name {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        margin: 0;
        display: block;
        text-transform: uppercase;
        padding: 0 0 3px;
    }

    .rs-team .team-item .team-img .normal-text .subtitle {
        color: #fff;
        margin: 0;
        display: block;
    }

    .rs-team .team-item .team-img img {
        width: 100%;
        height: 350px;
    }

    .rs-team .team-item .team-content {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 10%;
        left: 0;
        text-align: center;
        z-index: 1;
        padding: 30px;
        opacity: 0;
        -webkit-transition: 0.3s all ease-out;
        transition: 0.3s all ease-out;
        visibility: hidden;
    }

    .rs-team .team-item .team-content:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background: rgb(9 12 43 / 80%);
        z-index: -1;
    }

    .rs-team .team-item .team-name {
        margin-bottom: 2px;
    }

    .rs-team .team-item .team-name span{
        margin-bottom: 6px;
        font-size: 20px;
        color: #fff;
        text-transform: uppercase;
        position: relative;
        z-index: 1;
    }

    .rs-team .team-item .team-name a:hover {
        color: #fff;
    }

    .rs-team .team-item .postion {
        position: relative;
        z-index: 1;
        color: #fff;
    }

    .rs-team .team-item .share-icons {
        position: relative;
        max-width: 255px;
        margin: 0 auto 15px;
        opacity: 0;
        visibility: hidden;
    }

    .rs-team .team-item .share-icons .border {
        content: '';
        position: absolute;
        background: #fff;
        z-index: 1;
        opacity: 1;
    }

    .rs-team .team-item .share-icons .border {
        width: 25px;
        height: 25px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        border-radius: 100px;
        z-index: 11;
    }

    .rs-team .team-item .team-social {
        position: relative;
    }

    .rs-team .team-item .team-social.icons-1:after,
    .rs-team .team-item .team-social.icons-1:before {
        content: '';
        position: absolute;
        background: #fff;
        z-index: 1;
        opacity: 1;
    }

    .rs-team .team-item .team-social.icons-1:after {
        top: 0%;
        left: 50%;
        height: 95px;
        width: 1px;
    }

    .rs-team .team-item .team-social.icons-1:before {
        bottom: 0;
        left: 10px;
        height: 1px;
        width: 100px;
    }

    .rs-team .team-item .team-social.icons-2:after,
    .rs-team .team-item .team-social.icons-2:before {
        content: '';
        position: absolute;
        background: #fff;
        z-index: 1;
        opacity: 1;
    }

    .rs-team .team-item .team-social.icons-2:after {
        bottom: 0;
        left: 50%;
        height: 95px;
        width: 1px;
    }

    .rs-team .team-item .team-social.icons-2:before {
        top: 0;
        right: 10px;
        height: 1px;
        width: 100px;
    }

    .rs-team .team-item .team-social li {
        display: inline-block;
        position: relative;
        transition: all 0.3s ease-in-out 0s;
        padding: 34px;
    }

    .rs-team .team-item .team-social li a {
        display: block;
        color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        border: 1px solid #fff;
        text-align: center;
        border-radius: 100px;
        font-size: 20px;
    }

    .rs-team .team-item .team-social li a:hover {
        background: #fff;
        border-color: #fff;
        color: #0b0f34;
    }

    .rs-team .team-item:hover .team-content {
        top: 0;
    }

    .rs-team .team-item:hover .share-icons,
    .rs-team .team-item:hover .team-content,
    .rs-team .team-item:hover .team-social {
        opacity: 1;
        visibility: visible;
    }

    .rs-team .team-item:hover .normal-text {
        opacity: 0;
        visibility: hidden;
    }

    .rs-team.fullwidth-team .col-lg-3 {
        padding: 0;
    }

    .rs-team.fullwidth-team .col-lg-3 .team-item {
        margin-bottom: 0;
    }

    .rs-team.fullwidth-team .col-lg-3 .team-item .team-img .normal-text {
        text-align: left;
        background: transparent;
        padding-left: 15px;
    }

    .rs-team.rs-team2 .normal-text {
        clip-path: polygon(100% 100%, 0% 100%, 50% -95%);
    }

    .rs-team#rs-team3 .share-icons {
        max-width: 230px;
    }

    .rs-team#rs-team3.bg6,
    .rs-team#rs-team3.bg4 {
        position: relative;
    }

    .rs-team#rs-team3.bg6:after,
    .rs-team#rs-team3.bg4:after {
        content: "";
        background-position: top center;
        height: 460px;
        width: 100%;
        position: absolute;
        top: 0;
        z-index: 0;
    }

    .rs-team#rs-team3 .container-fullwidth {
        position: relative;
        z-index: 1;
    }

    .rs-team#rs-team3 .team-item {
        margin-bottom: 30px;
    }

    .rs-team#rs-team3 .team-item .team-img .normal-text {
        height: 205px;
        bottom: -23%;
        padding: 30px 0;
        width: 86%;
        border-radius: 50%;
        clip-path: none;
    }

    .rs-team#rs-team3 .team-item .team-social li {
        padding: 20px;
    }

    .rs-team#rs-team3 .team-item .team-social.icons-1:before,
    .rs-team#rs-team3 .team-item .team-social.icons-2:before {
        width: 80px;
    }

    .rs-team#rs-team3 .team-item .team-social.icons-1:after,
    .rs-team#rs-team3 .team-item .team-social.icons-2:after {
        height: 70px;
    }

    .home5 .rs-team .team-item .team-img img {
        border-radius: 5px;
    }

    .pagination {
        margin-top: 25px;
    }

    .pagination .page-item {
        margin-right: 6px;
    }

    .pagination .page-item>* {
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        font-size: 18px;
        padding: 0;
        font-weight: 600;
        color: #676767;
        border-radius: 3px;
        outline: none;
        border-color: #e8e8e8;
        background: #fff;
    }

    .pagination .page-item>*:hover,
    .pagination .page-item>*.active {
        color: #d90845;
        border-color: #d90845;
    }

    .pagination .page-item>*.dotted {
        line-height: 40px;
    }

    .share-icons ul {
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }
</style>
<div id="rs-team" class="rs-team fullwidth-team pt-100 pb-70">
    <div class="container">
        <div class="row">
            <?php
            $data = $this->SiteModel->get_contents($type);
            if ($data->num_rows()):
                $index = 1;
                foreach ($data->result() as $row):
                    $name = $row->field1;
                    $designation = $row->field2;
                    $image = $row->field3;
                    $facebook = $row->field4;
                    $twitter = $row->field5;
                    $instagram = $row->field6;
                    $linkedin = $row->field7;
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="upload/<?=$image?>" alt="<?=$name?> Image">
                                <div class="normal-text">
                                    <h4 class="team-name"><?=$name?></h4>
                                    <span class="subtitle"><?=$designation?></span>
                                </div>
                            </div>
                            <div class="team-content">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="share-icons">
                                            <div class="border"></div>
                                            <ul class="team-social icons-1">
                                                <li><a href="<?=$facebook?>" class="social-icon"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li><a href="<?=$twitter?>" class="social-icon"><i class="fa fa-twitter"></i></a>
                                                </li>
                                            </ul>

                                            <ul class="team-social icons-2">
                                                <li><a href="<?=$instagram?>" class="social-icon"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li><a href="<?=$linkedin?>" class="social-icon"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="team-details">
                                            <h4 class="team-name">
                                                <span><?=$name?></span>
                                            </h4>
                                            <span class="postion"><?=$designation?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
    <!-- .container-fullwidth -->
</div>