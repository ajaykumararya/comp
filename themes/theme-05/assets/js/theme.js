
/*  Tepmlate Functions
    ------------------------------------------- */

(function($){

    // Tesimonials Function, Title Position
    $.fn.testimonials = function (){
        setTimeout(function(){
            var heightPane = $('.testimonials-pane.active').css('height');
            heightPane = parseInt(heightPane);
            var p = $('.testimonials-title').position(),
                h = $('.testimonials-title').height(),
                w = $('.testimonials-title').width();

            var cal_1 = ((40 - h) / 2) - 1,
                cal_2 = (heightPane - w)/2;
            var pt = p.top,
            	pl = p.left;

            var _cal_1 = - (pt - cal_2),
                _cal_2 = - (pl - cal_1);


            $('.testimonials-title').css({
                "margin-top": _cal_1,
                "margin-left": _cal_2
            });
        }, 200 + 20);
    };

    // Template Style Switcher Function
    $.fn.styleSwitcher = function (property){

        var colorName = this.attr("data-color-name");
        var colorHex  = this.attr("data-color-hex");

        $('body').removeClass().addClass(colorName);

        $.cookie('BodyClass' , $("body").attr('class'));
        $.cookie('ColorHex',colorHex);

        $('.dial').trigger('configure', {
            bgColor: $.cookie('ColorHex'),
            'format': function (v) {
                return v + '%';
            }
        });

        $('.dial').trigger('change');
    }
})(jQuery);





/*  Template Cookie
    ------------------------------------------- */

$(document).ready(function() {
    if($.cookie('BodyClass')==null || $.cookie('ColorHex')==null){
        $.cookie('BodyClass', 'default');
        $.cookie('ColorHex', '#DC394B');
    } return
});




/*  Responsive Navigation
    ------------------------------------------- */

$(document).ready(function() {

    var addActiveClass = false;

    $(".navigation li.dropdown > a, .navigation li.nested-dropdown > a").on("click", function(e) {

        if($(window).width() > 768) return;

        e.preventDefault();
        e.stopPropagation()

        addActiveClass = $(this).parent().hasClass("resp-active");

        $(".navigation").find(".resp-active").removeClass("resp-active");

        if(!addActiveClass) {
            $(this).parents("li").addClass("resp-active");
        }

        return;

    });
});


/*  Add Class to Body
    ------------------------------------------- */

$(document).ready(function() {
    $('body').removeClass().addClass($.cookie('BodyClass'));
});




/*  Testimonials Configurations
    ------------------------------------------- */

$(document).ready(function() {

    if (!$(".testimonials").get(0)) return;

    // Testimonials Panel Activator
    var current = $('.panel-container a > li');
    $('.panel-container a > li').click(function() {
        current.removeClass("active");
        current = $(this);
        current.addClass("active");
    });

    // Testimonials Title Appent to DOM
    $('<div class="testimonials-title" />').appendTo('.testimonials-content');

    // Testimonials Title Styling
    $('.testimonials-title').text("Our Testimonials").css({
        "position":                "absolute",
        "top":                     "0",
        "left":                    "0",
        "color":                   "#FFFFFF",
        "font-size":               "18px",
        "-webkit-transform":       "rotate(-90deg)",
        "-moz-transform":          "rotate(-90deg)",
        "-o-transform":            "rotate(-90deg)",
        "transform":               "rotate(-90deg)",
        "z-index":                 "600"
    });

    // Testimonials Fire Function
    $('.testimonials').testimonials();
    $('.testimonials-panel a').bind("click",function(){
        $('.testimonials').testimonials();
    });
});





/*  Other Configurations
    ------------------------------------------- */

$(document).ready(function() {

//  Services Configurations
    var current = $('.service-item');
    $(".service-item").click(function() {
        current.removeClass("active");
        current = $(this);
        current.addClass("active");
    });


//  Close Button For Widgets
    $(".close-widget").click(function() {
        $(this).parent().parent().fadeOut();
        return false;
    });


//  Close Button For Widgets
    $("ul#AccordionCaret > li > a").on("click", function(){
        $(this).toggleClass("Minus");
    });


//  Fittex Plugin
    if(!$("#fittext").get(0)) return;
       $("#fittext").fitText(0.2, {
           minFontSize: 30,
           maxFontSize: '240px'
       });
});


//  Scroll To Up
$('#scrollTop').on("click", function() {
    $('html,body').animate({
        scrollTop: 0
    }, 'slow');
});





/*  Style Switcher
    ------------------------------------------- */

$(document).ready(function(){
    $("#ShowCP").click(function() {
        $("#ColorPalette").removeClass().addClass('show-visibility').animate({
            "opacity":"1"
        });
    });
    $("#HideCP").click(function() {
        $("#ColorPalette").animate({
            "opacity":"0"
        }).removeClass().addClass('hide-visibility');
    });
    $("#ColorPalette li").click(function(e) {
        e.preventDefault();
        $(this).styleSwitcher(this);
        return false;
    });
});





/*  Jquery Knob Circle Bar
    ------------------------------------------- */

$(document).ready(function() {
    $('.dial').knob({
        bgColor: $.cookie('ColorHex')
    });
    $('.dial').trigger('configure', {
        bgColor: $.cookie('ColorHex'),
        'format': function (v) {
            return v + '%';
        }
    });
    $('.dial').trigger('change');
});





/*  Isotope Configurations
    ------------------------------------------- */

$(window).load(function() {

    var $container = $('#container');

    $container.isotope({
        itemSelector: '.element',
        animationEngine: 'best-available',
        animationOptions: {
            duration: 1200,
            easing: 'swing',
            queue: false
        }
    });

    $container.infinitescroll({
            loading: {
                finished: undefined,
                finishedMsg: '',
              //img: "",
                msg: null,
              //msgText: "",
              //selector: null,
              //speed: 'fast',
              //start: undefined
            },
            state: {
              //isDuringAjax: false,
              //isInvalidPage: false,
              //isDestroyed: false,
              //isDone: false,
              //isPaused: false,
              //currPage: 1
            },
            debug: false,
            behavior: 'twitter',
          //binder: $(window),
            nextSelector: '#addMore a',
            navSelector: '#addMore',
          //contentSelector: null,
          //extraScrollPx: 150,
            itemSelector: '.element',
          //animate: false,
          //pathParse: undefined,
          //dataType: 'html',
          //appendCallback: true,
          //bufferPx: 40,
          //errorCallback: function () { },
          //infid: 0,
          //pixelsFromNavToBottom: undefined,
          //path: undefined,
          //prefill: false,
            maxPage: 2
        },

        function(newElements) {
            var $newElems = $(newElements).css({
                opacity: 0
            });
            $newElems.imagesLoaded(function() {
                $newElems.animate({
                    opacity: 1
                });
                $container.isotope('appended', $newElems);
            });
        }
    );

    var $optionSets = $('#filters'),
        $optionLinks = $optionSets.find('li.filter a');

    $optionLinks.click(function() {
        var $this = $(this);
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('#filters');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            changeLayoutMode($this, options)
        } else {
            $container.isotope(options);
        }

        return false;
    });
});