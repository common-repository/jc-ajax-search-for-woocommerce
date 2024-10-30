<?php if ($id) { ?>
	<div class="wpjc-search-form wpjc-search-form-<?php echo intval($id); ?>">
		<form>
			<input autocomplete="off" type="text" name="wpjc-input-search" data-shop-url="<?php echo esc_url($shop_page_url); ?>" data-id="<?php echo intval($id); ?>" class="wpjc-input-search-<?php echo intval($id); ?>" placeholder="<?php echo esc_attr( $wcjc_placeholder ); ?>">
			<span class="gp-icon icon-search"><svg viewBox="0 0 512 512" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"><path fill-rule="evenodd" clip-rule="evenodd" d="M208 48c-88.366 0-160 71.634-160 160s71.634 160 160 160 160-71.634 160-160S296.366 48 208 48zM0 208C0 93.125 93.125 0 208 0s208 93.125 208 208c0 48.741-16.765 93.566-44.843 129.024l133.826 134.018c9.366 9.379 9.355 24.575-.025 33.941-9.379 9.366-24.575 9.355-33.941-.025L337.238 370.987C301.747 399.167 256.839 416 208 416 93.125 416 0 322.875 0 208z"></path></svg></span>
		</form>
		<div style="display:none" class="wpjc-rearch-result wpjc-rearch-result-<?php echo intval($id); ?>">
			<div class="wpjc-content">
			</div>						
		</div>
	</div>
	<?php 
	if ($wcjc_style_setting) {
		$wcjc_background_color = ($wcjc_style_setting->wcjc_background_color)?$wcjc_style_setting->wcjc_background_color:'';
		$wcjc_text_color = ($wcjc_style_setting->wcjc_text_color)?$wcjc_style_setting->wcjc_text_color:'';
		$wcjc_btn_background_color = ($wcjc_style_setting->wcjc_btn_background_color)?$wcjc_style_setting->wcjc_btn_background_color:'';
		$wcjc_btn_icon_color = ($wcjc_style_setting->wcjc_btn_icon_color)?$wcjc_style_setting->wcjc_btn_icon_color:'';
		$wcjc_border_color = ($wcjc_style_setting->wcjc_border_color)?$wcjc_style_setting->wcjc_border_color:'';
		$wcjc_border_dadius = ($wcjc_style_setting->wcjc_border_dadius)?$wcjc_style_setting->wcjc_border_dadius:0;
		$wcjc_border_size_top = ($wcjc_style_setting->wcjc_border_size_top)?$wcjc_style_setting->wcjc_border_size_top:0;
		$wcjc_border_size_right = ($wcjc_style_setting->wcjc_border_size_right)?$wcjc_style_setting->wcjc_border_size_right:0;
		$wcjc_border_size_bottom = ($wcjc_style_setting->wcjc_border_size_bottom)?$wcjc_style_setting->wcjc_border_size_bottom:0;
		$wcjc_border_size_left = ($wcjc_style_setting->wcjc_border_size_left)?$wcjc_style_setting->wcjc_border_size_left:0;
		$wcjc_add_to_cart_background_color = ($wcjc_style_setting->wcjc_add_to_cart_background_color)?$wcjc_style_setting->wcjc_add_to_cart_background_color:'';
		$wcjc_add_to_cart_color = ($wcjc_style_setting->wcjc_add_to_cart_color)?$wcjc_style_setting->wcjc_add_to_cart_color:'';
	?>
	<style type="text/css">
		.wpjc-search-form.wpjc-search-form-<?php echo intval($id); ?> form input:focus{outline: none; }
		.wpjc-search-form.wpjc-search-form-<?php echo intval($id); ?> form input{background: <?php echo esc_attr( $wcjc_background_color ) ?> ; color: <?php echo esc_attr( $wcjc_text_color );?>;}
		.wpjc-search-form.wpjc-search-form-<?php echo intval($id); ?> form span{background:<?php echo esc_attr( $wcjc_btn_background_color );?>;}
		.wpjc-search-form.wpjc-search-form-<?php echo intval($id); ?> form{
			border-top: solid <?php echo intval($wcjc_border_size_top); ?>px <?php echo esc_attr( $wcjc_border_color ); ?>;
			border-left: solid <?php echo intval($wcjc_border_size_right); ?>px <?php echo esc_attr( $wcjc_border_color ); ?>;
			border-bottom: solid <?php echo intval($wcjc_border_size_bottom); ?>px <?php echo esc_attr( $wcjc_border_color ); ?>;
			border-right: solid <?php echo intval($wcjc_border_size_left); ?>px <?php echo esc_attr( $wcjc_border_color ); ?>;
			border-radius: <?php echo intval($wcjc_border_dadius); ?>px;
			background: <?php echo esc_attr( $wcjc_border_color ); ?>;
		}
		.wpjc-search-form.wpjc-search-form-<?php echo intval($id); ?> .wpjc-rearch-result .wpjc-content ul li .btn-content .jcwp-button{
			background: <?php echo esc_attr( $wcjc_add_to_cart_background_color ); ?>;
			color: <?php echo esc_attr( $wcjc_add_to_cart_color ); ?>;
		}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.wpjc-search-form.wpjc-search-form-<?php echo intval($id); ?> form span svg path').attr('fill', '<?php echo esc_attr($wcjc_btn_icon_color); ?>');
		});
	</script>
<?php } } ?>