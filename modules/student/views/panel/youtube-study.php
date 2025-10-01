<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <link href='https://fonts.googleapis.com/css?family=Lekton|Lobster' rel='stylesheet' type='text/css'>
    type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Plyr CSS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <!-- Plyr JS -->
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

    <style>
        body {
            background: #111;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #player {
            width: 100%;
            width: 800px;
            height: 800px;
            /* aspect-ratio: 16 / 9; */
        }

        .plyr .plyr__video-embed iframe,
        .plyr__tooltip {
            pointer-events: none;
        }

        #watermark {
            position: absolute;
            z-index: 49;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="<?= $id ?>"></div>

        <script>
            const player = new Plyr('#player', {
                // fullscreen: {
                //     enabled: false
                // },
                controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'pip', 'airplay',
                    'fullscreen'
                ]
            });

            const overlay = document.getElementById("watermark");
            document.querySelector(".plyr").append(overlay);

            document.addEventListener('contextmenu', event => event.preventDefault());

            // Disable double-click on player
            const playerElement = document.getElementById('player');
            playerElement.addEventListener('dblclick', event => {
                event.preventDefault();
                event.stopPropagation();
            });
            playerElement.addEventListener('click', event => {
                event.preventDefault();
                event.stopPropagation();
            });

            console.log(document.querySelector("iframe"));
            let firstPlay = true;

            player.on('play', () => {
                if (firstPlay) {
                    firstPlay = false;

                    // Try to request fullscreen
                    const container = player.elements.container;
                    if (container.requestFullscreen) {
                        container.requestFullscreen().catch(err => {
                            console.warn('Fullscreen request failed:', err);
                        });
                    } else {
                        console.warn('Fullscreen API not supported');
                    }
                }
            });
        </script>


    </div>


</body>

</html>