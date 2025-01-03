<style>
        .zi-1 {
            z-index: -1;
        }

        .loader-body {
            width: 100%;
            height: 100vh;
            background-color: #f3f9f9;
            position: fixed;
            z-index: 1000;
            visibility: visible;
            top: 0;
            left: 0;
            text-align: center;
            justify-content: center;
            align-content: center;
            transition: 0.5s all;
        }

        .loader {
            width: 100px;
            height: 100px;
            border: 12px white solid;
            border-radius: 50%;
            position: absolute;
            border-top-color: #141948;
            /*Here you can change color of the loader*/
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            -webkit-animation: 1s spin infinite linear;
            -o-animation: 1s spin infinite linear;
            animation: 1s spin infinite linear;
        }

        .loader-body.done {
            visibility: hidden;
            opacity: 0;
        }

        @keyframes spin {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
    <link href="{theme_url}assets/css/nxr.min7839.css?v=1.2" rel="stylesheet" />