$(function() {

	// cache and configuration

	// Menu
	var menu = $('#main-menu');
	// Menu offset
	var menuOffset = menu.height();
	// alert(menuOffset);


	// scroll event
	$(window).on('scroll', function() {
		// check how far use has scrolled down
		var pageScroll = $(window).scrollTop();

		// menu becomes sticky when user reaches it

		if(menuOffset <= pageScroll) {
			menu.addClass('fixed');
		}
			else {
				menu.removeClass('fixed');
			}

	});


});