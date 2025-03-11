<!-- Web Fonts -->
<style>
    <?php
    $primaryColor = '#94020b';
    $secondaryColor = '#ff922f';
    if(PATH == 'boardofpara'){
        $primaryColor = '#02713b';
        $secondaryColor = '#006eb9';
        ?>
        .nav-wrapper li.dropdown>ul.dropdown-menu>li a,
        .navbar-brand.navbar-brand-centered a,
        .navbar-brand.navbar-brand-centered i{
                color:white!important
        }
        <?php
    }
    ?>
    :root {
        --primary-color: <?=$primaryColor?>;
        --secondary-color: <?=$secondaryColor?>;
    }
    .center-heading{
        text-align: center;
    }
    body{
        /* background-color: white!important; */
    }
    .bg-dark{
        background-color: var(--primary-color)!important;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
<link rel="stylesheet" href="{theme_url}assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="{theme_url}assets/css/custom-font.css" />
<link rel="stylesheet" href="{theme_url}assets/css/header-v8.css" />

<!--[if gte IE 8]>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300" /> 
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400" /> 
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:600" /> 
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:700" /> 
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:800" />
    <![endif]-->
<link rel="stylesheet" href="{theme_url}assets/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="{theme_url}assets/js/jQuery-OwlCarousel2/dist/assets/owl.carousel.mind233d233.css?2.0.0" />
<link rel="stylesheet"
    href="{theme_url}assets/js/jQuery-OwlCarousel2/dist/assets/owl.theme.default.mind233d233.css?2.0.0" />
<link rel="stylesheet" href="{theme_url}assets/js/jQuery-fancyBox/source/jquery.fancybox.css" type="text/css" />
<link rel="stylesheet" href="{theme_url}assets/js/jQuery-mediaElement/build/mediaelementplayer.css" />
<link rel="stylesheet" href="{theme_url}assets/css/plugins.css" type="text/css" />
<link rel="stylesheet" href="{theme_url}assets/js/jQuery-nivoSlider/nivo-slider.css" />



<!-- Theme CSS -->
<link rel="stylesheet" href="{theme_url}assets/css/style1bf61bf6.css?1.4.0" id="colorStyle" />
<script src="{theme_url}assets/js/prefixfree.min.js" type="text/javascript"></script>

<!-- Responsive CSS -->
<link rel="stylesheet" href="{theme_url}assets/css/theme-responsive.css" type="text/css" />
<link rel="stylesheet" href="{theme_url}assets/style.css" type="text/css" />
<style>
    .panel-primary {
        border-color: var(--primary-color);
    }

    .panel-primary>.panel-heading,
    .btn-primary {
        color: #ffffff;
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        transition: 0.3s;
    }

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus {
        color: var(--primary-color);
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        border: 1px solid var(--primary-color);
        transition: 0.3s;
    }

    .nav-wrapper li.dropdown>ul.dropdown-menu {
        background: none repeat scroll 0 0 var(--secondary-color) !important;
    }

    .nav-wrapper li.dropdown>ul.dropdown-menu>li a {
        color: black;
    }

    .pagination>.active>a,
    .pagination>.active>span,
    .pagination>.active>a:hover,
    .pagination>.active>span:hover,
    .pagination>.active>a:focus,
    .pagination>.active>span:focus {
        z-index: 2;
        color: #ffffff;
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        cursor: default;
    }

    a {
        color: black
    }

    .input-group {
        display: flex;
        align-items: stretch;
        width: 100%;
    }

    .input-group-addon {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        background-color: #f7f7f7;
        border: 1px solid #ced4da;
        border-right: none;
        color: #495057;
    }

    .input-group .form-control {
        flex: 1 1 auto;
        padding: 0.5rem 1rem;
        border: 1px solid #ced4da;
        outline: none;
    }

    .select2 {
        height: 34px;
    }

    .mt-3 {
        margin-top: 10px
    }

    .card-header {
        padding: 17px;
    }

    .card-header .card-title {
        font-size: 25px;
    }

    .card-footer {
        border-top: 1px solid #efe2e2;
        padding: 17px
    }

    /* Outline Success Style */
    .btn-outline-success {
        display: inline-block;
        font-weight: 400;
        color: var(--primary-color);
        /* Green text */
        background-color: transparent;
        border: 2px solid var(--primary-color);
        /* Green border */
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .btn-outline-success:hover {
        color: #fff;
        /* White text */
        background-color: var(--primary-color);
        /* Green background */
        border-color: var(--primary-color);
        /* Same border */
    }

    .btn-outline-success:focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        /* Green focus ring */
    }

    .btn-outline-success:disabled {
        opacity: 0.65;
        cursor: not-allowed;
        background-color: transparent;
        color: #28a745;
        border-color: #28a745;
    }

    .bg-dark {
        background: #212135;
        padding: 10px;
    }

    .main-heading.center-heading {
        padding: 20px;
        font-size: 32px;
    }

    section.small_pb,
    section.sec_padd,
    section.small_pt,
    section.gray-bg {
        background: white;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    li.active-menu {
        background: rgba(0, 0, 0, .3);
    }

    @media (min-width: 992px) {
        .col-md-offset-3 {
            margin-left: 0%;
        }
    }

    #syllabus-table-front thead,
    .padding_third_all thead {
        color: white;
        background: var(--primary-color);
    }

    .padding_third_all center>.form-group {
        float: right
    }

    .heading_s1.text-center {
        text-align: left !important;
    }
</style>