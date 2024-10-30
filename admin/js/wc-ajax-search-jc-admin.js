(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
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
	 	generate_preview_form();

	 	$(".wcjc-color-picker").wpColorPicker({
	 		change: function (event, ui) {
	 			setTimeout(generate_preview_form,100);
	 		}
	 	});

	 	$('.wcjc-form').change(function(event) {
	 		setTimeout(generate_preview_form,100);
	 	});
	 	
	 	$('.wcjc-form a.button').click(function(event) {
			 let form_id = ($(this).attr('data_id'))?$(this).attr('data_id'):'';
	 		save_search_form(form_id);
	 	});

	 	$('.table-view-list .btn-delete').click(function(event) {
	 		let id_form = $(this).attr('data-formid');
	 		$.ajax({
	 			url : plugin_ajax_object.admin_ajax_url,
	 			data : {
	 				action : 'DeleteSearchForm',
	 				nonce : plugin_ajax_object.security,
					form_id : id_form
	 			},
	 			method : 'POST',
	 			success : function( response ){
	 				if (response) {
						 if(response.data.result=='done'){
								success_messaage_redirect_delete('/wp-admin/admin.php?page=woocomerce_ajax_search');
						 }else{
							error_messaage();
						 }					
	 				}
	 			},
	 			error : function(error){ 
	 				console.log(error);
	 			}
	 		});
	 	});
	 	function save_search_form(form_id){
	 		let wcjc_style_setting={
	 			wcjc_background_color : $('input[name="wcjc_background_color"]').val(),
				wcjc_text_color : $('input[name="wcjc_text_color"]').val(),
				wcjc_btn_background_color : $('input[name="wcjc_btn_background_color"]').val(),
				wcjc_btn_icon_color : $('input[name="wcjc_btn_icon_color"]').val(),
				wcjc_border_color : $('input[name="wcjc_border_color"]').val(),
				wcjc_border_dadius : $('input[name="wcjc_border_dadius"]').val(),
				wcjc_border_size_top : $('input[name="wcjc_border_size_top"]').val(),
				wcjc_border_size_right : $('input[name="wcjc_border_size_right"]').val(),
				wcjc_border_size_bottom : $('input[name="wcjc_border_size_bottom"]').val(),
				wcjc_border_size_left : $('input[name="wcjc_border_size_left"]').val(),
				wcjc_add_to_cart_background_color : $('input[name="wcjc_add_to_cart_background_color"]').val(),
				wcjc_add_to_cart_color : $('input[name="wcjc_add_to_cart_color"]').val()
	 		};
	 		let data = {
	 			wcjc_title : $('input[name=wcjc_title]').val(),
				wcjc_placeholder : $('input[name=wcjc_placeholder]').val(),
				wcjc_addtocartlabel : $('input[name=wcjc_addtocartlabel]').val(),
				wcjc_limitresult : $('input[name=wcjc_limitresult]').val(),
				wcjc_display_image : ($("input[name=wcjc_display_image]").is(':checked'))?1:0,
				wcjc_display_image_link : ($("input[name=wcjc_display_image_link]").is(':checked'))?1:0,
				wcjc_display_price : ($("input[name=wcjc_display_price]").is(':checked'))?1:0,
				wcjc_display_addtocart : ($("input[name=wcjc_display_addtocart]").is(':checked'))?1:0,
				wcjc_display_quantity : ($("input[name=wcjc_display_quantity]").is(':checked'))?1:0,
				wcjc_search_title : ($("input[name=wcjc_search_title]").is(':checked'))?1:0,
				wcjc_search_category : ($("input[name=wcjc_search_category]").is(':checked'))?1:0,
				wcjc_search_tag : ($("input[name=wcjc_search_tag]").is(':checked'))?1:0,
				wcjc_search_content : ($("input[name=wcjc_search_content]").is(':checked'))?1:0,
				wcjc_style_setting : wcjc_style_setting,
	 		};
	 		$.ajax({
	 			url : plugin_ajax_object.admin_ajax_url,
	 			data : {
	 				action : 'SaveSearchForm',
	 				nonce : plugin_ajax_object.security,
	 				data : data,
					form_id : form_id
	 			},
	 			method : 'POST',
	 			success : function( response ){
	 				if (response) {
						 if(response.data.result=='done'){
							 if(form_id && form_id > 0){
								success_messaage();
							 }else{
								success_messaage_redirect('/wp-admin/admin.php?page=woocomerce_ajax_search');
							 }
						 }else{
							error_messaage();
						 }					
	 				}
	 			},
	 			error : function(error){ 
	 				console.log(error);
	 			}
	 		});
	 	}
	 	function success_messaage(){
	 		Swal.fire({
	 			icon: 'success',
	 			title: 'Your work has been saved'
	 		});
	 	}
		function success_messaage_redirect(url){
			Swal.fire({
				icon: 'success',
				title: 'Your work has been saved'
			}).then(function() {
				window.location = url;
			});
		}
		function success_messaage_redirect_delete(url){
			Swal.fire({
				icon: 'success',
				title: 'The record was Deleted'
			}).then(function() {
				window.location = url;
			});
		}
	 
		 function error_messaage(){
			Swal.fire({
				icon: 'error',
				title: 'Your work has not been saved.'
			});
		}

		function generate_preview_form(){
			let wcjc_background_color = $('input[name="wcjc_background_color"]').val();
			let wcjc_text_color = $('input[name="wcjc_text_color"]').val();
			let wcjc_btn_background_color = $('input[name="wcjc_btn_background_color"]').val();
			let wcjc_btn_icon_color = $('input[name="wcjc_btn_icon_color"]').val();
			let wcjc_border_color = $('input[name="wcjc_border_color"]').val();
			let wcjc_border_dadius = $('input[name="wcjc_border_dadius"]').val()+'px';
			let wcjc_border_size_top = $('input[name="wcjc_border_size_top"]').val();
			let wcjc_border_size_right = $('input[name="wcjc_border_size_right"]').val();
			let wcjc_border_size_bottom = $('input[name="wcjc_border_size_bottom"]').val();
			let wcjc_border_size_left = $('input[name="wcjc_border_size_left"]').val();
			let wcjc_add_to_cart_background_color = $('input[name="wcjc_add_to_cart_background_color"]').val();
			let wcjc_add_to_cart_color = $('input[name="wcjc_add_to_cart_color"]').val();
			let wcjc_placeholder = ($('input[name="wcjc_placeholder"]').val())?$('input[name="wcjc_placeholder"]').val():'Search';
			let wcjc_addtocartlabel = ($('input[name="wcjc_addtocartlabel"]').val())?$('input[name="wcjc_addtocartlabel"]').val():'Add to Cart';
			$('.wcjc-form-example .wpjc-search-form form1').css({
				'border-top': 'solid '+wcjc_border_size_top+'px '+wcjc_border_color,
				'border-left': 'solid '+wcjc_border_size_left+'px '+wcjc_border_color,
				'border-bottom': 'solid '+wcjc_border_size_bottom+'px '+wcjc_border_color,
				'border-right': 'solid '+wcjc_border_size_right+'px '+wcjc_border_color,
				'border-radius':wcjc_border_dadius,
				background:wcjc_border_color
			});
			$('.wcjc-form-example .wpjc-search-form form1 span').css({
				background: wcjc_btn_background_color
			});
			$('.wcjc-form-example .wpjc-search-form form1 input').css({
				background: wcjc_background_color,
				color:wcjc_text_color
			});
			$('.wcjc-form-example .wpjc-search-form form1 input').attr('placeholder', wcjc_placeholder);
			$('.wcjc-form-example .wpjc-search-form .wpjc-rearch-result .wpjc-content ul li .btn-content .jcwp-button').text(wcjc_addtocartlabel);
			$('.wcjc-form-example .wpjc-search-form form1 span svg path').attr('fill', wcjc_btn_icon_color);
			$('.wcjc-form-example .wpjc-search-form .wpjc-rearch-result .wpjc-content ul li .btn-content .jcwp-button').css({
				background: wcjc_add_to_cart_background_color,
				color:wcjc_add_to_cart_color
			});
		}
	 });
})( jQuery );