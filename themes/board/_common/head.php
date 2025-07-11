<style>
    :root {
        --primary-color: #468323 !important;
        --secondary-color: #c92a2e;
    }

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


    .badge-info {
        display: inline-block;
        padding: 0.25em 0.6em;
        font-size: 0.75rem;
        font-weight: 600;
        color: #fff;
        background-color: #17a2b8;
        /* Teal-ish info color */
        border-radius: 0.35rem;
    }

    .rebel-inner {
        background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important;
        left: -10px !important;
    }

    .panel-heading {
        border-radius: 0;
    }

    .panel-heading h3 {
        margin: 0 !important;
    }
</style>
<link href="{theme_url}assets/css/nxr.min7839.css?v=1.2" rel="stylesheet" />
<style>
    .bg-secondary {
        background-color: var(--primary-color) !important;
    }

    .text-primary {
        color: var(--secondary-color) !important;
    }

    .bg-primary {
        background-color: var(--secondary-color) !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>