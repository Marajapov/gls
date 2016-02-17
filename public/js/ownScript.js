jQuery(document).ready(function(){
/*global jQuery:false */
/*jshint devel:true, laxcomma:true, smarttabs:true */
"use strict";






	/* scroll to top */
	jQuery(".scrollTo_top").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.scrollTo_top').fadeIn();
			} else {
				jQuery('.scrollTo_top').fadeOut();
			}
		});
		jQuery('.scrollTo_top a').click(function(){
			jQuery('html, body').animate({scrollTop:0}, 500 );
			return false;
		});
	});
	
	
		/* sticky navigation */
		jQuery(function() {
			/* Check width on page load*/
			if ( jQuery(window).width() > 759) {
			  
				jQuery(function() {
				
					// grab the initial top offset of the navigation 
					var sticky_navigation_offset_top = jQuery('#topnav').offset().top;
					
					// our function that decides weather the navigation bar should have "fixed" css position or not.
					var sticky_navigation = function(){
						var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top
						
						// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
						if (scroll_top > sticky_navigation_offset_top) { 
							jQuery('#topnav').css({ 'position': 'fixed', 'top':0,'width':'100%'});
							jQuery('#topnav').addClass('fixmenu');
						} else {
							jQuery('#topnav').css({ 'position': 'relative' ,'width':'100%', 'top':0});
							jQuery('#topnav').removeClass('fixmenu'); 
						}   
					};
			
					// run our function on load
					sticky_navigation();
					
					// and run it again every time you scroll
					jQuery(window).scroll(function() {
						 sticky_navigation();
					});
					
				});
			}
	  });
	  	
	
	/* Tooltips */
	jQuery("body").prepend('<div class="tooltip"><p></p></div>');
	var tt = jQuery("div.tooltip");
	
	jQuery("#header ul.social-menu li a").hover(function() {								
		var btn = jQuery(this);
		
		tt.children("p").text(btn.attr("title"));								
					
		var t = Math.floor(tt.outerWidth(true)/2),
			b = Math.floor(btn.outerWidth(true)/2),							
			y = btn.offset().top - -35,
			x = btn.offset().left - (t-b);
					
		tt.css({"top" : y+"px", "left" : x+"px", "display" : "block"});			
		   
	}, function() {		
		tt.hide();			
	});
	
	
	
	/* PrettyPhoto */
	function lightbox() {
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'slow',
			slideshow:5000,
			theme:'pp_default',
			show_title:false,
			overlay_gallery: false,
			social_tools: false
		});
	}
	
	if(jQuery().prettyPhoto) {
		lightbox();
	}


/* the end */
});