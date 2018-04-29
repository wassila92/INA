(function ($) {
    "use strict";
    $('body').scrollspy({ target: '#bs-example-navbar-collapse-1' });
    //animation scroll js
        var nav = $('nav'),
        navOffset = nav.offset().top,
        $window = $(window);
    /* navOffset ends */
    
    
	var html_body = $('html, body');
    $('nav a').on('click', function () {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                html_body.animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
    
// navbar js ends here
    $('.rotate_slider').carousel({
        num: 3,
        maxWidth: 630,
        maxHeight: 460,
        distance: 38,
        scale: 0.7,
        animationTime: 1500,
        showTime: 3000,
        autoPlay: true,
        infinite: true,
        speed: 500,
        fade: true
    });
    
	$(function () {
                $('.kc-wrap').KillerCarousel({
                    // Default natural width of carousel.
                    width: 700,
                    spacing3d: 90,
                    spacing2d: 800,
                    showShadow: true,
                    showReflection: false,
                    // Looping mode.
                    infiniteLoop: true,
                    autoScale: 65
                });
            });
      
    // testimonial slick part //

    $('.testimonial-details').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        asNavFor: '.testimonial-slider-img'
    });

    $('.testimonial-slider-img').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
					
                }
			},
            {
                breakpoint: 766,
                settings: {
                     autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
			}
	],
        horizontal: true,
        asNavFor: '.testimonial-details',
        dots: false,
        arrows: true,
        prevArrow: ".slidPrv4,.slidPrv4-color",
        nextArrow: ".slidNext4,.slidNext4-color",
        centerPadding: '0px',
        centerMode: true,
        focusOnSelect: true
    });
    
// youtube video js start here
        jQuery("a.bla-1").YouTubePopUp({ autoplay: 0 }); // Disable autoplay

    
// Top to Bottom
    var top_to_i = $('.top_to i');
    var $top_offset = 300;
    top_to_i.on('click',function() {
        html_body.animate({
            scrollTop:0
        }, 1000);
    });
        
    
    
    $window.on('scroll', function(){

		var scrollPos = $window.scrollTop();

		if ( scrollPos >= navOffset ){
            $('header nav').addClass('navbar-position');
		} else {
			 $('header nav').removeClass('navbar-position');
		}
        
        if (scrollPos >= $top_offset) {
            top_to_i.fadeIn();
        } else {
            top_to_i.fadeOut();
        }
        
	});
	$window.on('load', function () {
        $('#preloader').delay(1500).fadeOut();

    });
    
// feature design hover js ends     

})(jQuery);
