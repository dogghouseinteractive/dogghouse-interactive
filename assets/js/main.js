jQuery(document).ready(function() {
	//Handle the Hamburger open/close logic
	jQuery('#hamburger').on('click', function() {
		if(jQuery(this).hasClass('clicked')) {
			jQuery(this).removeClass('clicked');
			jQuery(this).css('top', '50%');
			jQuery('body').removeClass('nav-is-open');
		} else {
			jQuery(this).addClass('clicked');
			jQuery('body').addClass('nav-is-open');
			jQuery('header #hamburger-toggle-menu.clicked').css('padding-top', 0);
		}
		if(jQuery('.top-bun, .patty, .bottom-bun').hasClass('animated')) {
			jQuery('.top-bun, .patty, .bottom-bun').removeClass('animated').css('opacity', '1.0');
		}
		jQuery('#hamburger-toggle-menu').toggleClass('clicked');
	});
	
	//Prevent parent menu item from triggering navigation on click when sub nav exists
	jQuery('#toggle-nav li.menu-item-has-children').on('click', function() {
		jQuery(this).toggleClass('clicked');
	});
	jQuery('#toggle-nav li.menu-item-has-children .sub-menu li a').on('click', function(e) {
		e.stopPropagation();
	});
	jQuery('#toggle-nav li.menu-item-has-children > a').on('click', function(e) {
		e.preventDefault();
	});
	
	jQuery(document).imagesLoaded(function() {
		// Lazy load recent posts on page load, not JUST on scroll
		jQuery('.lazy').each(function() {
			var scroll = jQuery(window).scrollTop();
			if(scroll >= jQuery(this).offset().top - Math.floor(jQuery(window).height() - 100) ) {
				jQuery(this).attr('loaded', 'true');
				jQuery(this).addClass('animated');
				if(jQuery(this).hasClass('fade-in-up')) {
					jQuery(this).addClass('fadeInUp');
				}
				if(jQuery(this).hasClass('fade-in-down')) {
					jQuery(this).addClass('fadeInDown');
				}
				if(jQuery(this).hasClass('fade-in-left')) {
					jQuery(this).addClass('fadeInLeft');
				}
				if(jQuery(this).hasClass('fade-in-right')) {
					jQuery(this).addClass('fadeInRight');
				}
				if(jQuery(this).hasClass('fade-in')) {
					jQuery(this).addClass('fadeIn');
				}
				if(jQuery(this).hasClass('slide-in-right')) {
					jQuery(this).addClass('slideInRight');
					jQuery(this).css('opacity', '1.0');
				}
				if(jQuery(this).hasClass('slide-in-left')) {
					jQuery(this).addClass('slideInLeft');
					jQuery(this).css('opacity', '1.0');
				}
				if(jQuery(this).hasClass('zoom-in')) {
					jQuery(this).addClass('zoomIn');
					jQuery(this).css('opacity', '1.0');
				}
			}
		});
	});
	function masonry() {
		jQuery('.masonry').imagesLoaded(function() {
			jQuery('.masonry').masonry({
				itemSelector: 'a'
			});
		});
	}
	setTimeout(masonry, 300);
});

jQuery('#logo').imagesLoaded(function() {
	if(jQuery('#hamburger').hasClass('clicked')) {
		jQuery('body').addClass('nav-is-open');
		jQuery('header #hamburger-toggle-menu').addClass('clicked');
	}
	var logoHeight = jQuery('#logo').height();
	var headerHeight = logoHeight + 40;
	jQuery('#primary-menu').height(headerHeight);
	jQuery('header #hamburger-toggle-menu').css('padding-top', headerHeight - 1);
	jQuery('.top-bun, .patty, .bottom-bun, #logo').addClass('animated');
});

jQuery(window).on('resize', function() {
	var logoHeight = jQuery('#logo').height();
	var headerHeight = logoHeight + 40;
	jQuery('#primary-menu').height(headerHeight);
	jQuery('header #hamburger-toggle-menu').css('padding-top', headerHeight - 1);
});

jQuery(window).on('scroll', function() {
	var scroll = jQuery(window).scrollTop();
	jQuery('.lazy').each(function() {
		if(scroll >= jQuery(this).offset().top - Math.floor(jQuery(window).height() - 200) ) {
			jQuery(this).attr('loaded', 'true');
			jQuery(this).addClass('animated');
			if(jQuery(this).hasClass('fade-in-up')) {
				jQuery(this).addClass('fadeInUp');
			}
			if(jQuery(this).hasClass('fade-in-down')) {
				jQuery(this).addClass('fadeInDown');
			}
			if(jQuery(this).hasClass('fade-in-left')) {
				jQuery(this).addClass('fadeInLeft');
			}
			if(jQuery(this).hasClass('fade-in-right')) {
				jQuery(this).addClass('fadeInRight');
			}
			if(jQuery(this).hasClass('fade-in')) {
				jQuery(this).addClass('fadeIn');
			}
			if(jQuery(this).hasClass('slide-in-right')) {
				jQuery(this).addClass('slideInRight');
				jQuery(this).css('opacity', '1.0');
			}
			if(jQuery(this).hasClass('slide-in-left')) {
				jQuery(this).addClass('slideInLeft');
				jQuery(this).css('opacity', '1.0');
			}
			if(jQuery(this).hasClass('zoom-in')) {
				jQuery(this).addClass('zoomIn');
				jQuery(this).css('opacity', '1.0');
			}
		}
	});
	if(scroll >= 1) {
		jQuery('.masonry').imagesLoaded(function() {
			jQuery('.masonry').masonry({
				itemSelector: 'a'
			});
		});
	}
});