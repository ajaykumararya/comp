<style>
  :root {
    --primary-color:rgb(160, 12, 12);
    --secondary-color: #d9a648;
  }
</style>
<!-- Stylesheet -->
<link href="{theme_url}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{theme_url}assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="{theme_url}assets/css/animate.css" rel="stylesheet" type="text/css">
<link href="{theme_url}assets/css/css-plugin-collections.css" rel="stylesheet" />
<!-- CSS | menuzord megamenu skins -->
<link href="{theme_url}assets/css/menuzord-megamenu.css" rel="stylesheet" />
<link id="menuzord-menu-skins" href="{theme_url}assets/css/menuzord-skins/menuzord-rounded-boxed.css"
  rel="stylesheet" />
<!-- CSS | Main style file -->
<link href="{theme_url}assets/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{theme_url}assets/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{theme_url}assets/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="{theme_url}assets/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link href="{theme_url}assets/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
<link href="{theme_url}assets/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css" />
<link href="{theme_url}assets/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css" />

<!-- CSS | Theme Color -->
<link href="{theme_url}assets/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">
<link href="{theme_url}assets/custom.css" rel="stylesheet" type="text/css">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
  .text-theme-colored2 {
    color: var(--primary-color) !important;
  }

  .btn-theme-colored2 {
    background-color: var(--primary-color) !important;
    border-color: var(--primary-color) !important;
  }

  .btn-theme-colored2:hover,
  .btn-theme-colored2:focus,
  .btn-theme-colored2:active {
    background-color: var(--secondary-color) !important;
    border-color: var(--secondary-color) !important;
  }

  .bg-theme-colored2,
  .team-block .team-thumb .styled-icons a:hover,
  .work-gallery .gallery-thumb .styled-icons a:hover,
  .work-gallery:hover .gallery-bottom-part,
  .double-line-bottom-theme-colored-2:after,
  .double-line-bottom-theme-colored-2:before,
  .double-line-bottom-centered-theme-colored-2:after,
  .double-line-bottom-centered-theme-colored-2:before,
  .line-bottom-theme-colored-2:after,
  .line-bottom-centered::after,
  .event-block .event-date,
  .team-social,
  .event-small .event-date,
  .portfolio-filter a.active,
  .title-border::after,
  .search-menu,
  .menuzord .menuzord-menu>li.active>a,
  .menuzord .menuzord-menu>li:hover>a,
  .menuzord .menuzord-menu ul.dropdown li:hover>a {
    background-color: var(--primary-color)!important;
  }
</style>
<?php
function filter_title($title)
{
  return str_replace(
    ["[", "]"],
    ['<span class="text-theme-colored2">', '</span>'],
    $title
  );
}
?>