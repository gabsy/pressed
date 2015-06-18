$(document).ready(function () {

			$(function () {
				// grab the initial top offset of the navigation
				var sticky_navigation_offset_top = $('body').offset().top + 200;
				// our function that decides weather the navigation bar should have "fixed" css position or not.
				var sticky_navigation = function () {
					var scroll_top = $(window).scrollTop(); // our current vertical position from the top
					// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
					if (scroll_top > sticky_navigation_offset_top) {
						$('.topbar.home').css({
							'background': 'rgba(0,0,0,1)',
							'border-width':'5px'
						});
						$('.home .logo-small').css({
							'top':'25px'
						});

						$('.navigation ul').css({
							'text-align':'right',
							'width':'660px'
						});
					} else {
						$('.topbar.home').css({
							'background': 'none',
							'border-width':'0'
						});
						$('.home .logo-small').css({
							'top':'-50px'
						});
						$('.home .navigation ul').css({
							'width':'100%',
							'text-align':'center'
						});
					}
				};

				//if($(window).width()>979) {
				// run our function on load
				sticky_navigation();

				// and run it again every time you scroll
				$(window).on('resize scroll', function () {
					sticky_navigation();
				}).resize();
				//}

			});
	});