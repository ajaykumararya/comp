/*
Plugin Name:    Fancy Box - jQuery Plugin
Version:        version 2.1.5
Written by:     Janis Skarnelis
*/

$(document).ready(function() {
    $(".fancybox").fancybox({
        helpers: {
            overlay: {
                locked:         true,
                closeClick :    true
            }
        },
        padding:        ['5px', '5px', '5px', '5px'],
        autoSize:       true,
        autoWidth:      true,
        autoHeight:     true,
        autoResize:     true,
        autoCenter:     true,
        preload:        1,
    });
});





/*
Plugin Name:    Owl Carousel - jQuery Plugin
Version:        version 2.0.0 beta 1.9
Written by:     Bartosz Wojciechowski
*/

$(document).ready(function() {

    // Main Carousel

    $("#sliderImages").owlCarousel({
        items:                  1,
        autoHeight:             true,
        loop:                   true,
        mouseDrag:              true,
        autoplay:               true,
        margin:                 0,
        autoplayTimeout:        4000,
        autoplayHoverPause:     true,
        dotData:                true,
        dotsContainer:          '.pager-container',
        navContainer:           '.main-controls',
        responsive:{
        768:{
          items:1
        },
        992:{
          items:1
        }
        }
    });
    $(".mainNext").click(function() {
        $("#sliderImages").trigger('next.owl');
    });
    $(".mainPrev").click(function() {
        $("#sliderImages").trigger('prev.owl');
    });



    // New Projects Carousel

    $("#projects").owlCarousel({
        items:                  1,
        loop:                   true,
        autoHeight:             true,
        mouseDrag:              false,
        margin:                 0,
        autoplay:               true,
        dots:                   false,
        autoplayTimeout:        4000,
        autoplayHoverPause:     true,
        callbacks:              false,
        dotsEach:               false,
        autoplaySpeed:          500,
        naviSpeed:              500,
      //dotsEach:               true,
      //callbacks:              true,
      //dotsSpeed:              800,
        animateOut:             'fadeOut',
        animateIn:              'fadeIn',
        responsive:{
        768:{
          items:1
        },
        992:{
          items:1
        }
        }
    });
    $(".sliderNext").click(function() {
        $("#projects").trigger('next.owl');
    });
    $(".sliderPrev").click(function() {
        $("#projects").trigger('prev.owl');
    });



    // Recent Works Carousel
    $('#category-images').owlCarousel({
      items:                  4,
      loop:                   true,
      margin:                 20,
      stagePadding:           0,
      merge:                  false,
      mergeFit:               false,
      autoplayHoverPause:     true,
      autoplay:               true,
      autoplayTimeout:        4000,
      lazyLoad:               true,
      dots:                   false,
      autoplaySpeed:          500,
      naviSpeed:              500,
      dotsSpeed:              500,
      responsive:{
      768:{
        items:4
      },
      992:{
        items:4
      }
      }
  });
    $("#recentWorks").owlCarousel({
        items:                  1,
        loop:                   true,
        margin:                 20,
        stagePadding:           0,
        merge:                  false,
        mergeFit:               false,
        autoplayHoverPause:     true,
        autoplay:               true,
        autoplayTimeout:        4000,
        lazyLoad:               true,
        dots:                   false,
        autoplaySpeed:          500,
        naviSpeed:              500,
        dotsSpeed:              500,
        responsive:{
        768:{
          items:6
        },
        992:{
          items:6
        }
        }
    });
    $(".next").click(function() {
        $("#recentWorks").trigger('next.owl');
    });
    $(".prev").click(function() {
        $("#recentWorks").trigger('prev.owl');
    });




    // Our Clients Carousel
    
    $("#ourClients").owlCarousel({
        items:                  4,
        loop:                   true,
        margin:                 20,
        autoplay:               false,
        lazyLoad:               true,
        dots:                   false,
        naviSpeed:              800,
        responsive:{
        768:{
          items:4
        },
        992:{
          items:4
        }
        }
    });
    $(".ourCnext").click(function() {
        $("#ourClients").trigger('next.owl');
    });
    $(".ourCprev").click(function() {
        $("#ourClients").trigger('prev.owl');
    });

 // Our Clients Carousel
    
    $("#ourClientsDLP").owlCarousel({
        items:                  9,
        loop:                   true,
        margin:                 20,
        autoplay:               false,
        lazyLoad:               true,
        dots:                   false,
        naviSpeed:              800,
        responsive:{
        768:{
          items:9
        },
        992:{
          items:9
        }
        }
    });
    $(".ourCnext").click(function() {
        $("#ourClientsDLP").trigger('next.owl');
    });
    $(".ourCprev").click(function() {
        $("#ourClientsDLP").trigger('prev.owl');
    });

    // Portfolio Carousel
    
    $("#folioGallery").owlCarousel({
        items:                  1,
        loop:                   true,
        margin:                 0,
        autoplayHoverPause:     true,
        autoplay:               true,
        autoplayTimeout:        4000,
        lazyLoad:               true,
        dots:                   false,
        naviSpeed:              800,
        autoHeight:             true,
        animateOut:             'fadeOut'
    });
    $(".portNext").click(function() {
        $("#folioGallery").trigger('next.owl');
    });
    $(".portPrev").click(function() {
        $("#folioGallery").trigger('prev.owl');
    });


    var $html = $('html');

    // Services Carousel
    
    if($html.hasClass("-webkit-")){
    $("#svcCarousel").owlCarousel({
        items:                  6,
        loop:                   false,
        dots:                   false,
        autoplay:               false,
        lazyLoad:               false,
        margin:                 22,
        responsive:{
        0:{
          items:2
        },
        481:{
          items:4
        },
        768:{
          items:4
        },
        992:{
          items:6
        }
        }
    });}

    else {
    $("#svcCarousel").owlCarousel({
        items:                  6,
        loop:                   false,
        dots:                   false,
        autoplay:               false,
        lazyLoad:               false,
        margin:                 20,
        responsive:{
        0:{
          items:2
        },
        481:{
          items:4
        },
        768:{
          items:4
        },
        992:{
          items:6
        }
        }
    });};


    $(".svcNext").click(function() {
        $("#svcCarousel").trigger('next.owl');
    });
    $(".svcPrev").click(function() {
        $("#svcCarousel").trigger('prev.owl');
    });
});





/*
Plugin Name:    Nivo Slider
Version:        version 3.2
Written by:     dev7studios
*/

$(window).load(function() {
    
    $('#slider').nivoSlider({
        slices:                  15,
        boxCols:                 8,
        boxRows:                 4,
        animSpeed:               500,
        pauseTime:               5000,
        startSlide:              0,
        directionNav:            true,
        controlNav:              false,
        controlNavThumbs:        false,
        pauseOnHover:            true,
        manualAdvance:           false,
        prevText:                '<i class="fa fa-angle-left"></i>',
        nextText:                '<i class="fa fa-angle-right"></i>',
        effect:                  'random',
        randomStart:             false
    });
});





/*
Plugin Name:    BxSlider
Version:        version 4.1.2
Written by:     Steven Wanderski
*/

$(document).ready(function(){

    // Lastest News Slider

    $('#newsSlider').bxSlider({
        minSlides:                     1,
        maxSlides:                     1,
        auto:                          true,
        autoControls:                  false,
        pager:                         false,
        controls:                      false,
        autoHover:                     true,
        mode:                          "vertical"
    });
});


/*
Plugin Name:    Media Element Player
Version:        version 2.14.2
Written by:     johndyer
*/

if($("body").hasClass("blog") || $("body").hasClass("blog-left")){
    $('audio').mediaelementplayer({
        audioWidth: 100 + "%",
        audioHeight: 36,
        startVolume: 0.4,
        loop: true,
        alwaysShowControls: true,
        features: ['playpause','duration','progress','current','volume']

    });
    $('video').mediaelementplayer({
        startVolume: 0.4,
        loop: false,
        alwaysShowControls: true,
        features: ['playpause','duration','progress','current','volume','fullscreen']
    });
};