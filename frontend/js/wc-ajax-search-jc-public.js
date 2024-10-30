(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 jQuery(document).ready(function($) {
	 	$(document).on('click','.wpjc-search-form .icon-search',function( e ) {  
	 		e.preventDefault();
	 		let shop_url = $(this).siblings('input[name="wpjc-input-search"]').attr('data-shop-url');
	 		let url_search = shop_url+'?s=' + $(this).siblings('input[name="wpjc-input-search"]').val();
	 		window.location.href = url_search;
	 	});
	 	$(document).on({
	 		mouseover: function () {
	 			$(this).find('.wpjc-rearch-result').show();
	 		},
	 		mouseout: function () {
	 			$(this).find('.wpjc-rearch-result').hide();
	 		}
	 	}, '.wpjc-search-form');

	 	$(document).on({
	 		click: function () {
	 			$(this).parents('form').siblings('.wpjc-rearch-result').show();
	 		},
	 		keyup: delay(function(e){
	 			e.preventDefault();
	 			let this_input = $(this);
	 			var formid = $(this).attr('data-id');
	 			var text = $(this).val();
	 			var container_result = '.wpjc-rearch-result-'+formid+' .wpjc-content';
	 			this_input.parents('.wpjc-search-form').find(container_result).html(HtmlLoader());
	 			if(text.length > 1){
	 				get_search_result(formid,text,this_input);
	 			}else{
	 				$(container_result).html("");
	 			}
	 			//Redirect to search page
	 			let shop_url = $(this).attr('data-shop-url');
	 			let url_search = shop_url+'?s=' + $(this).val();
	 			if (!e) e = window.event;
	 			if (e.keyCode == '13'){
	 				window.location.href = url_search;
	 				return false;
	 			}
	 		},500)
	 	}, '.wpjc-search-form input[name="wpjc-input-search"]');
							
		$(document).on('click','.wpjc-search-form .jcwp-add_to_cart',function( e ) {  
			e.preventDefault();
			let $btn = $(this);
			let quantity = ($btn.siblings('span').find('input[name="qty"]').val())?$btn.siblings('span').find('input[name="qty"]').val():1;
			let product_id = $btn.attr('data_add_to_cart');
			AddToCartAjax($btn,product_id,quantity);
		});

		$(document).on('click','.wpjc-search-form .dec-button',function( e ) {  
			e.preventDefault();
			var value = parseInt($(this).siblings('input').val(), 10);
			value = isNaN(value) || value <= 1 ? 2 : value;
			value--;
			$(this).siblings('input').val(value);
		});

		$(document).on('click','.wpjc-search-form .inc-button',function( e ) { 
			e.preventDefault();
			var value = parseInt($(this).siblings('input').val(), 10);
			value = isNaN(value) ? 1 : value;
			value++;
			$(this).siblings('input').val(value);
		});


		function get_search_result(formid,text,this_input){
			$.ajax({
				url : wpjc_ajax_public.public_ajax_url,
				data : {
					action : 'WpjcSearchProducts',
					security : wpjc_ajax_public.security,
					formid : formid,
					text : text
				},
				method : 'POST',
				success : function( response ){
					var container_result = '.wpjc-rearch-result-'+formid+' .wpjc-content';
					if (response) {
						if (response.data.html) {
							$(this_input).parents('.wpjc-search-form').find(container_result).html(response.data.html);
						}else{
							$(this_input).parents('.wpjc-search-form').find(container_result).html("Not Result Found");
						}
					}else{
						$(this_input).parents('.wpjc-search-form').find(container_result).html("Not Result Found");
					}
				},
				error : function(error){ 
					//console.log(error);
				}
			});
		}
		function HtmlLoader(){
			return '<div class="loader"></div>';
		}
		function AddToCartAjax($btn,product_id,quantity){
				$.ajax({   
				url : wpjc_ajax_public_add_to_cart.public_ajax_url_add_to_cart,
				data : {
					action : 'WcJcAddToCartAjax',
					security : wpjc_ajax_public_add_to_cart.security,
					product_id:product_id,
					quantity:quantity
				},
				method : 'POST',
				beforeSend : function(){
					$btn.append(HtmlLoader());
				},
				success : function(response) {
					$btn.find('.loader').remove();
					$btn.append('<div id="tick-mark"></div>');
					//$('body').trigger('update_checkout');
					refrest_cart_woo();
					//jQuery(document.body).trigger('wc_fragment_refresh');
					//jQuery("[name='update_cart']").trigger("click");           
				},
				error : function(error) {
					//console.log(error);
				}
			});
		}

		function refrest_cart_woo(){
			$('body').trigger('update_checkout');
			$('body').trigger('wc_fragment_refresh');
			//$("[name='update_cart']").removeAttr('disabled').trigger("click");
		}
		function delay(callback, ms) {
			var timer = 0;
			return function() {
				var context = this, args = arguments;
				clearTimeout(timer);
				timer = setTimeout(function () {
					callback.apply(context, args);
				}, ms || 0);
			};
		}
	});
})( jQuery );