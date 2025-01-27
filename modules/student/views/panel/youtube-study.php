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
            background: #f0f0f0;
            color: #444;
            line-height: 30px;
            margin: 3px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        button:focus {
            outline: none;
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

            myPlayer = jQuery(".player").YTPlayer();
        });
    </script>
</head>

<body>
    <div id="wrapper">
        <div id="hyper" style="background: #000; height: 600px; width: 100%; position: relative; "></div>
        <div id="customElement" class="player"
            data-property="{showYTLogo:false,videoURL:'<?= $id ?>',containment:'#hyper', showControls:true,mute:false, autoPlay:false, loop:false, unmute:true, startAt:0, opacity:1, addRaster:false, quality:'large'}">

        </div>
        <div style="padding: 20px; text-align: center">
            <button onclick="jQuery('.player').YTPFullscreen()">go fullscreen</button>
            <button onclick="jQuery('.player').YTPTogglePlay()">Play/Pause</button>            
            <button onclick="window.close()">Close</button>
        </div>


    </div>


</body>

</html>