(function($){
	
	jQuery(document).ready(function() {

		$('.button-search').click(function() {
		    $('.wpo-search-form').toggleClass("open");
		}); 

		$('.wpo-header .widget_wpo_menu_vertical').hover(function() {
			$(this).toggleClass("open");
		    $('.body-overlay').toggleClass("active");		    
		}); 
				
		$('.quick-setting-inversed').hover(function() {
			$(this).toggleClass("open");
		    $('.body-overlay').toggleClass("active");		    
		});  

		$('[data-toggle="offcanvas"]').click(function () {
		    $('.row-offcanvas').toggleClass('active')		    
		});

		if($('.blog-masonry').length > 0){
			//isotope blog masonry
			jQuery('.blog-masonry').isotope({
				layoutMode: 'masonry',
				itemSelector: '.isotope-item',
			});
		}
		
		if($('.isotope').length > 0){
			//portfolio isotope filter
			var container = jQuery('.isotope');
	        var filter = jQuery('.isotope-filter');
	        var $duration = container.data('isotope-duration');
	        container.isotope({
	            filter : '*',
	            animationOptions : {duration: $duration}
	        });
	        filter.find('a').click(function() {
	            var selector = jQuery(this).attr('data-filter');
	            filter.find('a').removeClass('active');
	            jQuery(this).addClass('active');
	            container.isotope({
	                filter: selector,
	                animationOptions:{
	                    animationDuration: $duration,
	                    queue: false
	                }
	            });
	            return false;
	        });

	         jQuery(window).load(function(){
	            container.isotope("layout");
	        });
		}
		if( jQuery('.wpo-prettyPhoto').length > 0){
			$("a[rel^='prettyPhoto[all]']").prettyPhoto({
				animation_speed:'normal',
                theme:'light_square',
                social_tools: false,
			});
		}

		if( jQuery( 'a.video-popup').length >0) {
            jQuery('a.video-popup').click(function(){
                var title = jQuery(this).data('title');
                var id = jQuery(this).data('id');
                jQuery('#videoModal').find('.modal-header').append('<h4 class="modal-title">'+title+'</h4>');

                jQuery.post(ajaxurl,{action:'wpo_video_popup',id:id}, function(data, textStatus, xhr) {
                    jQuery('#videoModal .modal-body').html(data);
                });
            });

            jQuery('#videoModal').on('hidden.bs.modal',function(){
                jQuery(this).find('.modal-body').empty().append('<span class="spinner"></span>');
                jQuery(this).find('.modal-title').remove();
            });
        }

        //fix map
        $('.wpb_map_wraper').click(function () { 
        	$('.wpb_map_wraper iframe').css("pointer-events", "auto"); 
        }); 

        $( ".wpb_map_wraper" ).mouseleave(function() { 
        	$('.wpb_map_wraper iframe').css("pointer-events", "none"); 
        });
		

		// Enable menu toggle for small screens.
		var nav = $( '#primary-navigation' ), button, menu;
		if ( ! nav ) {
			return;
		}

		button = nav.find( '.menu-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.basic', function() {
			nav.toggleClass( 'toggled-on' );
		} );

        jQuery('.yith-wcwl-add-to-wishlist div[style="clear:both"]').remove();

        var container = document.querySelector('#container');
		// init
	});

})(jQuery);