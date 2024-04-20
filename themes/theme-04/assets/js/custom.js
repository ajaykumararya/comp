$(document).ready(function() {
	"use strict";
	var appMaster = {
	    
	    

		/*----------------------------------------------
		 -----------sticky Header  Function  --------------------
		 -------------------------------------------------*/
		headerJs : function() {
			var navWrap = $('.mainmenu-area');
			if (navWrap.length) {
				var navWrap_Offset = $('.mainmenu-area').offset().top;
				$(window).scroll(function() {
					var top_scroll = $(window).scrollTop();
					if (top_scroll > navWrap_Offset) {
						navWrap.addClass('stricky');
					} else {
						navWrap.removeClass('stricky');
					}
				});
			}
		},
		
		
		/*----------------------------------------------
		 -----------Submenu Function -------
		 -------------------------------------------------*/
		mobileMenuJs : function() {
			$('.sub-menu >a').on('click', function() {
				if ($(window).width() <= 767) {
					$('.sub-menu').removeClass('on');
					$('.sub-menu> ul').slideUp('normal');
					if ($(this).next().next('ul').is(':hidden') == true) {
						$(this).parent('li').addClass('on');
						$(this).next().next('ul').slideDown('normal');
					}
				}
			});

			/*----------------------------------------------
			 -----------Dropdown Function Submenu Function For index Corporate  --------
			 -------------------------------------------------*/
			$('.mobile-menu> li >a').on('click', function() {
				if ($(window).width() <= 991) {
					$('.mobile-menu> li').removeClass('on');
					$('.mobile-menu> li> ul').slideUp('normal');
					if ($(this).next().next('ul').is(':hidden') == true) {
						$(this).parent('li').addClass('on');
						$(this).next().next('ul').slideDown('normal');
					}
				}
			});

			/*----------------------------------------------
			 -----------Search Input  --------------------
			 -------------------------------------------------*/
			var searchDropdown = $("#searchDropdown");
			var dropdownInput = $('.dropdown-input')
			searchDropdown.on('click', function() {
				dropdownInput.show();
			});
			var closeInput = $(".close-input");
			closeInput.on('click', function() {
				dropdownInput.hide();
			});

			// Index2_Menu
			//===============Mobile nav Function============
			var mobile_nav = $('#menu');
			mobile_nav.on('click', function() {
				if ($(window).width() <= 767) {
					$('.nav__bar').slideToggle('normal');
				}
				return false;
			});
			var subNav = $('.nav__bar>ul> li >a');
			var subNavLi = $('.nav__bar>ul> li');
			subNav.on('click', function() {
				if ($(window).width() <= 767) {
					subNavLi.removeClass('on');
					$('.nav__bar>ul> li> ul').slideUp('normal');
					if ($(this).next().next('ul').is(':hidden') == true) {
						$(this).parent('li').addClass('on');
						$(this).next().next('ul').slideDown('normal');
					}
				}
				//return false;
			});

			// Index2_Menu
			//===============Mobile nav Function============
			var mobile_nav = $('#menu_toggler');
			mobile_nav.on('click', function() {
				if ($(window).width() <= 991) {
					$('.mobile__nav').slideToggle('normal');
				}
				return false;
			});
			var subNav = $('.mobile__nav-Ul>ul> li >a');
			var subNavLi = $('.mobile__nav-Ul>ul> li');
			subNav.on('click', function() {
				if ($(window).width() <= 767) {
					subNavLi.removeClass('on');
					$('.mobile__nav-Ul>ul> li> ul').slideUp('normal');
					if ($(this).next().next('ul').is(':hidden') == true) {
						$(this).parent('li').addClass('on');
						$(this).next().next('ul').slideDown('normal');
					}
				}
				//return false;
			});
		},
		/*----------------------------------------------
		 -----------Masonry Function  --------------------
		 -------------------------------------------------*/
		masonryJs : function() {
			var container_masonry = $(".container-masonry");
			container_masonry.imagesLoaded(function() {
				container_masonry.isotope({
					itemSelector : ".nf-item",
					layoutMode : "masonry",
					masonry : {
						columnWidth : 0,
						gutter : 0
					}
				});
			});

			/*----------------------------------------------
			 -----------Masonry filter Function  --------------------
			 -------------------------------------------------*/
			var container_filter = $(".container-filter");
			container_filter.on("click", ".categories", function() {
				var a = $(this).attr("data-filter");
				container_masonry.isotope({
					filter : a
				});

			});
			/*----------------------------------------------
			 -----------Masonry filter Active Function  --------------------
			 -------------------------------------------------*/
			container_filter.each(function(e, a) {
				var i = $(a);
				i.on("click", ".categories", function() {
					i.find(".active").removeClass("active"), $(this).addClass("active");
				});
			});

			/*----------------------------------------------
			 -----------Masonry Grid view Function  --------------------
			 -------------------------------------------------*/
			var container_grid = $(".container-grid");
			container_grid.imagesLoaded(function() {
				container_grid.isotope({
					itemSelector : ".nf-item",
					layoutMode : "fitRows"
				});
			});

			/*----------------------------------------------
			 -----------Masonry Grid Filter Function  --------------------
			 -------------------------------------------------*/
			container_filter.on("click", ".categories", function() {
				var e = $(this).attr("data-filter");
				container_grid.isotope({
					filter : e
				});
			});
		},

		/*----------------------------------------------
		 -----------Light Function  --------------------
		 -------------------------------------------------*/
		fancyboxJs : function() {
			var fLight = $(".fancylight");
			if (fLight.length) {
				fLight.fancybox({
					openEffect : 'elastic',
					closeEffect : 'elastic',
					helpers : {
						media : {}
					}
				});
			}
		},
		/*----------------------------------------------
		 -----------Counter Function  --------------------
		 -------------------------------------------------*/
		counterJs : function() {
			var counter = $('.counter');
			if (counter.length) {
				$('.counter').appear(function() {
					counter.each(function() {
						var e = $(this),
						    a = e.attr("data-count");
						$({
							countNum : e.text()
						}).animate({
							countNum : a
						}, {
							duration : 8e3,
							easing : "linear",
							step : function() {
								e.text(Math.floor(this.countNum));
							},
							complete : function() {
								e.text(this.countNum);
							}
						});
					});
				});
			}
		},

		/*----------------------------------------------
		 -----------Progess bar  --------------------
		 -------------------------------------------------*/
		progress_barjs : function() {
			$('.progress-bar').appear(function() {
				$(this).each(function() {
					var progress_sub = $(this).attr('aria-valuenow');
					$(this).width(progress_sub + '%');
				});
			});
		},

		/*----------------------------------------------
		 -----------Slider Function  --------------------
		 -------------------------------------------------*/
		owlCarouselJs : function() {
			var testimonial_slider = $("#testimonial");
			testimonial_slider.owlCarousel({
				loop : true,
				margin : 10,
				nav : true,
				dots : false,
				center : false,
				autoplay : true,
				autoplayTimeout : 2000,
				autoplayHoverPause : true,
				responsive : {
					0 : {
						items : 1

					},
					600 : {
						items : 1

					},
					1000 : {
						items : 1

					}
				},
				navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"]

			});

			//Blog Slider
			var itemCarousel_1 = $(".item1-carousel");
			itemCarousel_1.owlCarousel({
				loop : true,
				margin : 10,
				nav : true,
				dots : false,
				center : true,
				autoplay : true,
				autoplayTimeout : 2000,
				autoplayHoverPause : true,
				responsive : {
					0 : {
						items : 1

					},
					600 : {
						items : 1

					},
					1000 : {
						items : 1

					}
				},
				navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"]

			});

			//	Releted Project slider
			var relatedProject = $("#related-project");
			relatedProject.owlCarousel({
				loop : true,
				nav : true,
				dots : false,
				margin : 30,
				responsive : {
					0 : {
						items : 1
					},
					767 : {
						items : 2
					},
					992 : {
						items : 2
					},
					1200 : {
						items : 3
					}
				},
				navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"]

			});

			//	.team-carousel
			var teamCarousel = $('.team-carousel');
			teamCarousel.owlCarousel({
				loop : true,
				margin : 10,
				nav : true,
				dots : false,
				center : true,
				navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"],
				responsive : {
					0 : {
						items : 1
					},
					767 : {
						items : 2
					},
					992 : {
						items : 3
					},
					1200 : {
						items : 3
					}
				}
			});

			//Carousel
			var carouselSlider = $('.carousel-slider');
			carouselSlider.owlCarousel({
				loop : true,
				margin : 10,
				nav : true,
				dots : false,
				center : false,
				navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"],
				responsive : {
					0 : {
						items : 1
					},
					767 : {
						items : 2
					},
					992 : {
						items : 3
					},
					1200 : {
						items : 3
					}
				}
			});

			//client
			if ($('.client-carousel').length) {
				$('.client-carousel').owlCarousel({
					loop : true,
					margin : 10,
					autoplay : true,
					autoplayTimeout : 1000,
					autoplayHoverPause : true,
					nav : false,
					dots : false,
					center : true,
					navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"],
					responsive : {
						0 : {
							items : 1
						},
						767 : {
							items : 3
						},
						992 : {
							items : 5
						},
						1200 : {
							items : 5
						}
					}
				});
			}

			//Project

			$("#project").owlCarousel({
				loop : true,
				nav : true,
				margin : 30,
				dots : false,
				responsive : {
					0 : {
						items : 1
					},
					767 : {
						items : 2
					},
					992 : {
						items : 2
					},
					1200 : {
						items : 3
					}
				},
				navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"]

			});

			//history-items
			var historyBlock = $('.history-block');
			historyBlock.owlCarousel({
				loop : true,
				margin : 30,
				nav : true,
				dots : false,
				navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"],
				responsive : {
					0 : {
						items : 1
					},
					767 : {
						items : 2
					},
					992 : {
						items : 3
					},
					1200 : {
						items : 4
					}
				}
			});
		},

		/*----------------------------------------------
		 ----------- parallax Function  --------------------
		 -------------------------------------------------*/
		parallaxJs : function() {
			var parallaxs = $(".parallax");
			parallaxs.parallax("50%", 0.02);
			var parallaxs = $("#overlay_block");
			parallaxs.parallax("50%", 0.2);
		},

		/*----------------------------------------------
		 ----------- Loader Function  --------------------
		 -------------------------------------------------*/
		preloaderJs : function() {
			var preloader = $("#preloader");
			preloader.delay(500).fadeOut();
		},

		/*----------------------------------------------
		 ----------- Map Function  --------------------
		 -------------------------------------------------*/
		mapJs : function() {
			var mapWrap = $('#map');
			if (mapWrap.length) {
				google.maps.event.addDomListener(window, 'load', initialize);

			}
		},

		/* ---------------------
		 Owl Slider
		 /* --------------------- */
		owlCarousel : function() {
			(function($) {
				"use strict";
				if ($('.owl-carousel').length) {
					$(".owl-carousel").each(function(index) {
						var effect_mode = $(this).data('effect');
						var autoplay = $(this).data('autoplay');
						var loop = $(this).data('loop');
						var margin = $(this).data('margin');
						var center = $(this).data('center');
						var autoplay = $(this).data('autoplay');
						var autoplayTimeout = $(this).data('autoplayTimeout');
						var autoplayHoverPause = $(this).data('autoplayHoverPause');
						var navigation = $(this).data('navigation');
						var pagination = $(this).data('pagination');
						var singleitem = $(this).data('singleitem');
						var items = $(this).data('items');
						var itemsdesktop = $(this).data('desktop');
						var itemsdesktopsmall = $(this).data('desktopsmall');
						var itemstablet = $(this).data('tablet');
						var itemsmobile = $(this).data('mobile');

						$(this).owlCarousel({
							loop : loop,
							margin : margin,
							center : center,
							nav : navigation,
							dots : pagination,
							autoplay : autoplay,
							autoplayTimeout : 2000,
							autoplayHoverPause : autoplayHoverPause,
							responsive : {
								0 : {
									items : itemsmobile
								},
								767 : {
									items : itemstablet
								},
								992 : {
									items : itemsdesktopsmall
								},
								1200 : {
									items : itemsdesktop
								}
							},

							navText : ["<i class='ion-ios-arrow-back'></i>", "<i class='ion-ios-arrow-forward'></i>"]
						});
					});
				}
			})(jQuery);
		},
		/*MatchHeight*/
		heightbox : function() {
			if ($('.matchHeigh').length) {
				var matchHeigh = $('.matchHeigh');
				if (matchHeigh) {
					matchHeigh.matchHeight();
				}
			}
		}
	};

	appMaster.headerJs();
	appMaster.mobileMenuJs();
	appMaster.masonryJs();
	appMaster.fancyboxJs();
	appMaster.counterJs();
	appMaster.owlCarouselJs();
	appMaster.parallaxJs();
	appMaster.preloaderJs();
	appMaster.mapJs();
	appMaster.owlCarousel();
	appMaster.heightbox();
	appMaster.progress_barjs();
    
    // appMaster.mobileMenuJs();

});

/*----------------------------------------------
 ----------- Map color Function  --------------------
 -------------------------------------------------*/
if ($('#map').length) {
	var myCenter = new google.maps.LatLng(51.538308, -0.3817765);
	function initialize() {
		var mapProp = {
			center : myCenter,
			zoom : 15,
			mapTypeId : google.maps.MapTypeId.ROADMAP,
			scrollwheel : false,
			styles : [{
				elementType : 'geometry',
				stylers : [{
					color : '#242f3e'
				}]
			}, {
				elementType : 'labels.text.stroke',
				stylers : [{
					color : '#242f3e'
				}]
			}, {
				elementType : 'labels.text.fill',
				stylers : [{
					color : '#746855'
				}]
			}, {
				featureType : 'administrative.locality',
				elementType : 'labels.text.fill',
				stylers : [{
					color : '#d59563'
				}]
			}, {
				featureType : 'poi',
				elementType : 'labels.text.fill',
				stylers : [{
					color : '#d59563'
				}]
			}, {
				featureType : 'poi.park',
				elementType : 'geometry',
				stylers : [{
					color : '#263c3f'
				}]
			}, {
				featureType : 'poi.park',
				elementType : 'labels.text.fill',
				stylers : [{
					color : '#6b9a76'
				}]
			}, {
				featureType : 'road',
				elementType : 'geometry',
				stylers : [{
					color : '#38414e'
				}]
			}, {
				featureType : 'road',
				elementType : 'geometry.stroke',
				stylers : [{
					color : '#212a37'
				}]
			}, {
				featureType : 'road',
				elementType : 'labels.text.fill',
				stylers : [{
					color : '#9ca5b3'
				}]
			}, {
				featureType : 'road.highway',
				elementType : 'geometry',
				stylers : [{
					color : '#746855'
				}]
			}, {
				featureType : 'road.highway',
				elementType : 'geometry.stroke',
				stylers : [{
					color : '#1f2835'
				}]
			}, {
				featureType : 'road.highway',
				elementType : 'labels.text.fill',
				stylers : [{
					color : '#f3d19c'
				}]
			}, {
				featureType : 'transit',
				elementType : 'geometry',
				stylers : [{
					color : '#2f3948'
				}]
			}, {
				featureType : 'transit.station',
				elementType : 'labels.text.fill',
				stylers : [{
					color : '#d59563'
				}]
			}, {
				featureType : 'water',
				elementType : 'geometry',
				stylers : [{
					color : '#17263c'
				}]
			}, {
				featureType : 'water',
				elementType : 'labels.text.fill',
				stylers : [{
					color : '#515c6d'
				}]
			}, {
				featureType : 'water',
				elementType : 'labels.text.stroke',
				stylers : [{
					color : '#17263c'
				}]
			}]
		};
		var map = new google.maps.Map(document.getElementById("map"), mapProp);

		var marker = new google.maps.Marker({
			position : myCenter,
			icon : {
				url : 'assets/images/map-pin.png',
				size : new google.maps.Size(90, 111), //marker image size
				origin : new google.maps.Point(0, 0), // marker origin
				anchor : new google.maps.Point(35, 86) // X-axis value (35, half of marker width) and 86 is Y-axis value (height of the marker).
			}
		});

		marker.setMap(map);

	}

	function reloadStylesheets() {
		var queryString = 'reload=' + new Date().getTime();
		$('link[rel="stylesheet"]').each(function() {
			if (this.href.indexOf('?') !== -1) {
				this.href = this.href + '&' + queryString;
			} else {
				this.href = this.href + '?' + queryString;
			}
		});
	}

}	