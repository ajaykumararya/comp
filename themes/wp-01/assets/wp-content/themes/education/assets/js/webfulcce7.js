// JavaScript Document

(function($) {
    "use strict";
	
	//calling foundation js
	$(document).foundation();
		
	//Disable Default click behaviour on anchor
	$(".search-icon-toggle").on("click", function(event) { 
		event.preventDefault();
	});
	
	//scroll effect
	$("#top").on("click",function () {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});        
	
	$("#top").on("click",function (event) {
		event.stopPropagation();                
		var idTo = $(this).attr("data-atr");                
		var Position = $("[id='" + idTo + "']").offset();
		$("html, body").animate({ scrollTop: Position }, "slow");
		return false;
	});

	$(window).on("scroll",function() { 
		if($(this).scrollTop() > 1000) { 
			$("#top").fadeIn();
		} else { 
			$("#top").fadeOut();
		}
	});
	
	//Loading animation js
	$(window).on("load",function(){ 
		$("#loading").addClass("loaded");
		$("#loading").html('');
	});
	
	//Animation effect on teacher social links
	$(".teacher").on("mouseenter",function() {
		var animationEnd = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
		$(this).children(".teacher-thumb").children(".teacher-links").addClass("animated zoomIn").on(animationEnd, function() {
		$(this).removeClass("animated zoomIn");
		});
	});

	//calling Brand Crousel
	$(".teachers-wrapper").owlCarousel({
		loop:true,
		margin:40,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"]
			},
			600:{
				items:3,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"]
			},
			1000:{
				items:4,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
				loop:true
			}
		}
	});
	
	//Calling Testimonials Crousel
	$(".testimonials").owlCarousel({
		loop:true,
		margin:40,
		responsiveClass:true,
		autoplay:5000,
		responsive:{
			0:{
				items:1,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"]
			},
			600:{
				items:2,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"]
			},
			1000:{
				items:2,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
				loop:true
			}
		}
	});
	
	//calling Brand Crousel
	$(".brand-carousel").owlCarousel({
		loop:true,
		margin:30,
		responsiveClass:true,
		autoplay:5000,
		responsive:{
			0:{
				items:1,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"]
			},
			600:{
				items:3,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"]
			},
			1000:{
				items:5,
				nav:true,
				navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
				loop:true
			}
		}
	});
})(jQuery); //jQuery main function ends strict Mode on 