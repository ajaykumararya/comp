jQuery(document).ready(function () {
	//jQuery(".video-iframe").fitVids();

	jQuery('#quote-carousel').slick({
		fade: true,
		autoplay: true,
		speed: 1000,
		dots: false,
		arrows: false
	});
	jQuery('#courseBox-carousel').slick({
		autoplay: true,
		speed: 1000,
		dots: false,
		arrows: false,
		slidesToShow: 6,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
	jQuery('#newsSlider').slick({
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		speed: 1000,
		dots: false,
		arrows: false,
		vertical: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		verticalSwiping: true
	});
	jQuery(".fancybox").fancybox({
		prevEffect: 'none',
		nextEffect: 'none',
		helpers: {
			title: {
				type: 'outside'
			},
			thumbs: {
				width: 50,
				height: 0
			}
		}
	});
	// jQuery(window).load(function(){
	// 	if(jQuery('#homepageModal').length > 0){
	// 		jQuery('#homepageModal').modal();
	// 	}
	// });

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
	
	if (headtop.offset()!= undefined) {
	
		headtop.offset().top;
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