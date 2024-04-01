jQuery(document).ready(function () {
	jQuery(".video-iframe").fitVids();
	jQuery('.gallerySlider1').bxSlider({
		auto: true,
		pager: false,
		controls: true,
		adaptiveHeight: true,
		nextText: '&rarr;',
		prevText: '&larr;'
	});
	jQuery("#scroller").simplyScroll({
		orientation: 'vertical',
		auto: 'true',
		autoMode: 'loop',
		pauseOnHover: 'true'
	});
	jQuery('.gallery-carousel').bxSlider({
		auto: true,
		pager: false,
		controls: false,
		adaptiveHeight: true,
		minSlides: 1,
		maxSlides: 5,
		moveSlides: 1,
		slideWidth: 255,
		slideMargin: 30,
		nextText: '&rarr;',
		prevText: '&larr;',
		tickerHover: true,
		speed: 2000
	});
	jQuery('.enentSlider').slick({
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		speed: 1000,
		dots: false,
		arrows: false,
		vertical: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		verticalSwiping: true
	});
	jQuery(window).load(function () {
		if (jQuery('#homepageModal').length > 0) {
			jQuery('#homepageModal').modal();
		}
	});

	//jQuery('.mHeight').matchHeight();
	var d = new Date();
	var month = d.getMonth() + 1;
	var day = d.getDate();
	var output = (('' + day).length < 2 ? '0' : '') + day + '/' +
		(('' + month).length < 2 ? '0' : '') + month + '/' +
		d.getFullYear();
	//alert(output);
	jQuery('.curDate').text(output);

	var headtop = jQuery('.bannerWrap');
	if (headtop.offset() != undefined) {

		headtop = headtop.offset().top;
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > headtop) {
				jQuery('#header-fixed').addClass("sticky");
			}
			else {
				jQuery('#header-fixed').removeClass("sticky");
			}
		});
	}
});
$(function () {
	function onScrollInit(items, trigger) {
		items.each(function () {
			var osElement = $(this),
				osAnimationClass = osElement.attr('data-os-animation'),
				osAnimationDelay = osElement.attr('data-os-animation-delay');

			osElement.css({
				'-webkit-animation-delay': osAnimationDelay,
				'-moz-animation-delay': osAnimationDelay,
				'animation-delay': osAnimationDelay
			});

			var osTrigger = (trigger) ? trigger : osElement;

			osTrigger.waypoint(function () {
				osElement.addClass('animated').addClass(osAnimationClass);
			}, {
				triggerOnce: true,
				offset: '90%'
			});
		});
	}

	onScrollInit($('.os-animation'));
	onScrollInit($('.staggered-animation'), $('.staggered-animation-container'));
});
function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
}