<style>
    /* #dd0a7c */
    :root {
        --primary-color:
            <?= ES('theme_color_value', '#17a43b') ?>
        ;
        --secondary-color: #ff9600;
    }

    .text-white {
        color: white;
    }

    @media (min-width: 992px) {
        .col-md-offset-3 {
            margin-left: 0% !important;
        }
    }

    .footer ul.follow-us li a {
        border-color: white !important;
    }

    .inner-banner .content {
        max-width: 100% !important;
    }

    .main-heading.center-heading {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .select2 {
        height: 46px !important;
    }

    .panel-theme .panel-heading {
        background-color: var(--primary-color) !important;
    }

    .panel-theme {
        border-color: var(--primary-color) !important
    }

    .input-group {
        display: flex !important;
        flex-wrap: nowrap;
        align-items: stretch;
        width: 100%;
    }

    .input-group>.form-control {
        position: relative;
        flex: 1 1 auto;
        width: 1%;
        min-width: 0;
        margin-bottom: 0;
    }

    .input-group-text {
        display: flex;
        align-items: center;
        padding: 0.375rem 0.75rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        height: 34px !important;
        color: #495057;
        text-align: center;
        white-space: nowrap;
        /* background-color: #e9ecef; */
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .select2-container--default .select2-selection--single {
        height: 38px !important;
    }

    .footer .foot-nav ul li a:hover,
    .header-top ul.follow-us li a:hover,
    .header-top ul.top-nav li a:hover {
        color: var(--secondary-color) !important;
    }

    .card {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .card-header {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }

    .card-body {
        padding: 15px;
    }

    .border-2 {
        border-width: 2px;
    }

    .border-primary {
        border-color: var(--primary-color);
    }

    .rebel-inner {
        background-color: var(--primary-color) !important;
        left: -10px !important;
    }

    .panel-heading {
        border-radius: 0;
    }

    .panel-heading h3 {
        margin: 0 !important;
    }

    .our-cources ul.course-list li .bottom-txt,
    .why-choose:after,
    .navbar-inverse,
    .header-middle a.login:hover,
    a.scroll-top,
    .footer ul.follow-us li a:hover {
        background-color: var(--primary-color) !important;
    }

    .our-cources ul.course-list li .inner,
    .header-top,
    .testimonial:after {
        background-color: var(--secondary-color) !important;
    }

    .header-middle a.login {
        border-color: var(--primary-color) !important;
    }

    .header-top ul.follow-us li a,
    .header-top ul.top-nav li a,
    .header-middle a.login:hover span,
    .testimonial ul li p,
    .testimonial ul li span,
    .testimonial ul li span span,
    .navbar-inverse .navbar-nav>li>a i {
        color: white !important;
    }

    .header-top ul.follow-us li a:hover,
    .header-top ul.top-nav li a:hover,
    .header-middle a.login span,
    .about a.know-more:hover span {
        color: var(--primary-color) !important;
    }

    .testimonial:after {
        opacity: 0.6 !important;
    }

    .navbar-nav>li {
        border-right: 1px solid white !important
    }

    .navbar-inverse .navbar-nav>.active>a,
    .navbar-inverse .navbar-nav>.active>a:focus,
    .navbar-inverse .navbar-nav>.active>a:hover {
        color: #fff;
        background-color: rgba(0, 0, 0, .3);
    }
    <?php
    if(PATH == 'gcti'){
        ?>
        .banner-outer .content h1,
        .banner-outer .content p{
            color: white !important;
        }
        <?php
    }
    ?>
</style>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
<style>
    .footer2 .foot-nav ul li a,
    .footer2 p,
    .footer2 ul.terms li:after,
    .footer2 ul.terms li a,
    p,
    .dropdown ul a,
    label {
        font-family: 'Raleway' !important;
    }
</style>