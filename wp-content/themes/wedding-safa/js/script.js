(function ($) {

	"use strict";
	/* ================ Revolution Slider. ================ */
	if ($('.tp-banner').length > 0) {
		$('.tp-banner').show().revolution({
			delay: 6000,
			startheight: 600,
			startwidth: 1170,
			hideThumbs: 1000,
			navigationType: 'none',
			touchenabled: 'on',
			onHoverStop: 'on',
			navOffsetHorizontal: 0,
			navOffsetVertical: 0,
			dottedOverlay: 'none',
			fullWidth: 'on'
		});
	}
	if ($('.tp-banner-full').length > 0) {
		$('.tp-banner-full').show().revolution({
			delay: 6000,
			hideThumbs: 1000,
			navigationType: 'none',
			touchenabled: 'on',
			onHoverStop: 'on',
			navOffsetHorizontal: 0,
			navOffsetVertical: 0,
			dottedOverlay: 'none',
			fullScreen: 'on'
		});
	}

	/*Animation*/
	jQuery.fn.shake = function () {
		this.each(function (i) {
			$(this).css({
				"position": "relative"
			});
			for (var x = 1; x <= 3; x++) {
				$(this).animate({
					left: -25
				}, 10).animate({
					left: 0
				}, 50).animate({
					left: 25
				}, 10).animate({
					left: 0
				}, 50);
			}
		});
		return this;
	}
	setInterval(function () {
		$('.shake').shake('slow');
	}, 3000);

	/*Testimonials*/
	$(".owl-carousel").owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			700: {
				items: 2,
				nav: true
			},
			1170: {
				items: 2,
				nav: true
			}
		}
	});


	/* ================ Counter ================ */
	$('.counter-item').appear(function () {
		$('.counter-number').countTo();
	});

	/* ================ faq ================ */
	$('.collaps h4').each(function () {
		var tis = $(this),
			state = false,
			answer = tis.next('p').hide().css('height', 'auto').slideUp();
		tis.click(function () {
			state = !state;
			answer.slideToggle(state);
			tis.toggleClass('active', state);
		});
	});

})(jQuery);