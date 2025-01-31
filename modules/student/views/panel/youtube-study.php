<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <link href='https://fonts.googleapis.com/css?family=Lekton|Lobster' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/youtube/') ?>jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet"
        type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/youtube/') ?>jquery.mb.YTPlayer.js"></script>
    <style>
        body {
            border: none;
            margin: 0;
            padding: 0;
            background: #000000;
            font: normal 16px/20px Lekton, sans-serif;
        }

        #customElement {
            width: 100%;
            height: 400px;
            background: rgba(81, 150, 191, 0.60);
            position: relative;
            top: 0;
            left: 0;
            z-index: 0;
            background: url("assets/ytplayer_img.jpg") no-repeat center center;
            background-size: cover;
        }

        #testText {
            position: absolute;
            font-family: 'Lobster', cursive;
            font-size: 40px;
            text-align: center;
            line-height: 80px;
            color: #000;
            width: 100%;
            margin-top: 0;
            text-shadow: 10px 10px 20px rgba(248, 248, 248, 0.60);
        }

        button {
            padding: 10px;
            font-size: 16px;
            display: inline-block;
            background: rgba(0, 0, 0.2);
            color: #ffffff;
            margin: 3px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 0 10px 0 black;
            border: 1px solid white;
            text-shadow: 0 0 2px white;
        }

            .mb_YTPUrl.ytpicon {
                /* display: none!important; */
            }
    </style>

    <script>
        var myPlayer;
        jQuery(function () {

            var options = {
                mobileFallbackImage: "http://www.hdwallpapers.in/walls/pink_cosmos_flowers-wide.jpg",
                playOnlyIfVisible: false
            };

            myPlayer = jQuery(".player").YTPlayer(options);
        });
    </script>
</head>

<body>
    <div id="wrapper">
        <!-- <div id="hyper" style="background: #000; height: 500px; width: 600px; position: relative; "></div> -->
        <div id="ES" class="player"
            data-property="{showYTLogo:false,videoURL:'<?= $id ?>',containment:'self',optimizeDisplay:false, showControls:true,mute:false, autoPlay:false, loop:false, unmute:true, startAt:0, opacity:1,ratio:'4/3',addRaster:true}">

        </div>
        <div style="padding: 20px; text-align: center">
            <button onclick="jQuery('.player').YTPFullscreen()">Fullscreen</button>
            <button onclick="jQuery('.player').YTPTogglePlay()">Play/Pause</button>
            <button onclick="window.close()">Close</button>
        </div>


    </div>


</body>

</html>