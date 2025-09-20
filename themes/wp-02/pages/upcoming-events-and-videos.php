<?php
$type = 'upcoming-events';
?>
<div data-vc-full-width="true" data-vc-full-width-init="false"
    class="vc_row wpb_row vc_row-fluid vc_custom_1528904324320 vc_row-has-fill">
    <div class="wpb_column vc_column_container vc_col-sm-6">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="section-heading vc_custom_1528900107138"> <span
                        class="section-subtitle"><?= ES("{$type}_tag", 'Events') ?></span>
                    <h2 class="section-title"><?= ES("{$type}_title", 'Upcoming Events') ?></h2>
                </div>
                <div class="events-archive">
                    <marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="this.stop();"
                        onmouseout="this.start();" style="height:460px;padding:1px">
                        <?php
                        $data = $this->SiteModel->get_contents($type);
                        if ($data->num_rows()) {
                            $i = 320;
                            foreach ($data->result() as $row) {
                                $i++;
                                $m = date('M', strtotime($row->field1));
                                $d = date('d', strtotime($row->field1));
                                ?>
                                <div id="event-<?= $i ?>"
                                    class="studiare-event-item post-<?= $i ?> tp_event type-tp_event status-publish has-post-thumbnail hentry">
                                    <div class="studiare-event-item-holder">
                                        <div class="event-inner-content">
                                            <div class="top-part">
                                                <div class="date-holder">
                                                    <div class="date"> <span class="date-day"><?= $d ?></span>
                                                        <span class="date-month"><?= $m ?></span>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="event-meta"> <span class="event-meta-piece start-time">
                                                            <i class="material-icons">access_time</i>
                                                            <?= $row->field2 ?> </span>
                                                        <span class="event-meta-piece location">
                                                            <i class="material-icons">location_on</i>
                                                            <?= $row->field4 ?> </span>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="<?= $row->field5 ?>"><?= $row->field3 ?></a>
                                                    </h4>
                                                </div>
                                            </div> <!-- /.top-part -->
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <?php
    $type = 'events_videos';
    $box = 'first';
    $firstVideotitle = ES("{$type}_{$box}_title", '');
    $firstVideoLink = ES("{$type}_{$box}_link", '');
    $firstVID = getYouTubeId($firstVideoLink);    
    $firstThumb = getYouTubeThumbnail($firstVID);

    $box = 'second';
    $secondVideotitle = ES("{$type}_{$box}_title", '');
    $secondVideoLink = ES("{$type}_{$box}_link", '');
    $secondVID = getYouTubeId($secondVideoLink);    
    $secondThumb = getYouTubeThumbnail($secondVID);

    $box = 'third';
    $thirdVideotitle = ES("{$type}_{$box}_title", '');
    $thirdVideoLink = ES("{$type}_{$box}_link", '');
    $thirdVID = getYouTubeId($thirdVideoLink);    
    $thirdThumb = getYouTubeThumbnail($thirdVID);
    

    ?>
    <div class="wpb_column vc_column_container vc_col-sm-6">
        <div class="vc_column-inner">
            <div class="wpb_wrapper">
                <div class="section-heading vc_custom_1528900100477"> <span
                        class="section-subtitle"><?= ES("{$type}_tag", 'Watch Video') ?></span>
                    <h2 class="section-title"><?= ES("{$type}_title", 'Learn Anywhere') ?></h2>
                </div>
                <div class="video-banner">
                    <div class="video-button"> 
                        <a href="#"
                            class="cdb-video-icon video-thumbnail playVideo" data-id="<?=$firstVID?>"></a>
                    </div>
                    <div class="video-banner-image" style="padding-bottom: 53%;">
                        <img decoding="async" width="900" height="477"
                            src="<?=$firstThumb?>"
                            class="attachment-full size-full" />
                    </div>
                    <div class="video-banner-info">
                        <h4 class="title"><?=$firstVideotitle?></h4>
                    </div>
                </div>
                <div class="vc_row wpb_row vc_inner vc_row-fluid">
                    <div class="wpb_column vc_column_container vc_col-sm-6">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="video-banner">
                                    <div class="video-button"> 
                                        <a href="#"
                                            class="cdb-video-icon video-thumbnail playVideo" data-id="<?=$secondVID?>"></a>
                                    </div>
                                    <div class="video-banner-image" style="padding-bottom: 54.5%;"> <img
                                            decoding="async" width="800" height="436"
                                            src="<?=$secondThumb?>"
                                            class="attachment-full size-full" alt=""
                                            /></div>
                                    <div class="video-banner-info">
                                        <h6 class="title"><?=$secondVideotitle?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-6">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="video-banner">
                                    <div class="video-button"> 
                                        <a href=""
                                            class="cdb-video-icon video-thumbnail playVideo" data-id="<?=$thirdVID?>"></a>
                                    </div>
                                    <div class="video-banner-image" style="padding-bottom: 54.5%;"> <img
                                            decoding="async" width="800" height="436"
                                            src="<?=$thirdThumb?>"
                                            class="attachment-full size-full" alt=""/></div>
                                    <div class="video-banner-info">
                                        <h6 class="title"><?=$thirdVideotitle?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>