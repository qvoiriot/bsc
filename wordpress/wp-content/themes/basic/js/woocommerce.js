!function ($) {
	"use strict";
	$(document).ready(function() {
		// Ajax Swich Layout
		$('#wpo-filter .display a').click(function(){
            var query = $(this).data('query');
            var type = $(this).data('type');
            var $this = $(this);

            if(!$(this).hasClass('active')){
	            $.ajax({
	                url: ajaxurl,
	                data:{action:'wpo_display_layout',query:query,type:type},
	                type: 'POST',
	                beforeSend:function(){
	                	$this.addClass('waiting').append('<span class="loading" style="background:url('+woocommerce_params.ajax_loader_url+') no-repeat center center;display:block;background-size:16px 16px;width:100%;height:100%;position:absolute;top:0;left:0"></span>');
	                },
	                success: function(response){
	                	$this.removeClass('waiting');
	                    $('.products>.products-layout').html(response);
	                    $('#wpo-filter .display a .loading').remove();
	                }
	            });
	        }
	        $('#wpo-filter .display a').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        // Ajax QuickView
		$(document).on("click", ".quickview", function () {
		    var productslug = $(this).data('productslug');
            $.ajax({
                url: woocommerce_params.ajax_url,
                data:{
                    action:'wpo_quickview',
                    productslug: productslug
                },
                type: 'GET',
                beforeSend:function(){},
                success: function(response){
                    $('#wpo_modal_quickview .modal-body').html(response);
                }
            });

		});

		$('#wpo_modal_quickview').on('hidden.bs.modal',function(){
			$(this).find('.modal-body').empty().append('<span class="spinner"></span>');
		});

		//Show popup add to cart
		jQuery('body').bind('showNoty', function(){
            var text_success = woocommerce_localize.cart_success;
            var n = noty({
                text        : '<div class=""><i class="fa fa-shopping-cart"></i>&nbsp' + text_success + ' </div>',
                type        : 'success',
                dismissQueue: true,
                layout      : 'center',
                theme       : 'defaultTheme',
                timeout     : 2000,
            });
            console.log('html: ' + n.options.id);
       });

		//load more product tabs
        jQuery('a[data-loadmore="true"]').click( function(){
            var $this       = $(this);
            var $id         = $( $(this).data('link') );
            var $paged      = $(this).data('paged')+1;
            var $number     = $(this).data('number');
            var $column     = $(this).data('class-column');
            var $key        = $(this).data('key');
            var $style      = $(this).data('style');
            var $cols       = $(this).data('cols');
            var $product_ids= $(this).data('product-id');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                dataType: "JSON",
                data: {
                    action  : 'wpo_load_more_product',
                    paged   : $paged,
                    number  : $number,
                    column  : $column,
                    key     : $key,
                    style   : $style,
                    cols    : $cols,
                    product_ids: $product_ids
                },
                beforeSend:function(){
                    $this.button('loading');
                    /*setTimeout(function () {

                    }, 500);*/

                },
                success: function(response){
                    $this.button('reset');
                    if(response.check==false)
                        $this.remove();

                    $this.data('paged',$paged);
                    $id.find('.wpo-content').append( response.posts );
                }
            });
            return false;
        });

		//show category children
		jQuery('.wpo_show-children').click(function(){
            jQuery(this).parent().find('.wpo_children-category').toggle(400, 'linear');
            jQuery(this).parent().toggleClass('active');
        });       
		

	});
}(jQuery);