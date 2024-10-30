<?php
$id =(isset($form_config[0]->id))?$form_config[0]->id:''; 
$wcjc_title =(isset($form_config[0]->wcjc_title)&& $form_config[0]->wcjc_title != "")?$form_config[0]->wcjc_title:''; 
$wcjc_limitresult =(isset($form_config[0]->wcjc_limitresult))?$form_config[0]->wcjc_limitresult:10;
$wcjc_display_image =(isset($form_config[0]->wcjc_display_image)&& $form_config[0]->wcjc_display_image == 1)?'checked':''; 
$wcjc_display_image_link =(isset($form_config[0]->wcjc_display_image_link)&& $form_config[0]->wcjc_display_image_link == 1)?'checked':''; 
$wcjc_display_price =(isset($form_config[0]->wcjc_display_price)&& $form_config[0]->wcjc_display_price == 1)?'checked':''; 
$wcjc_display_quantity =(isset($form_config[0]->wcjc_display_quantity)&& $form_config[0]->wcjc_display_quantity == 1)?'checked':''; 
$wcjc_display_addtocart =(isset($form_config[0]->wcjc_display_addtocart)&& $form_config[0]->wcjc_display_addtocart == 1)?'checked':''; 
$wcjc_search_title =(isset($form_config[0]->wcjc_search_title)&& $form_config[0]->wcjc_search_title == 1)?'checked':''; 
$wcjc_search_category =(isset($form_config[0]->wcjc_search_category)&& $form_config[0]->wcjc_search_category == 1)?'checked':''; 
$wcjc_search_tag =(isset($form_config[0]->wcjc_search_tag)&& $form_config[0]->wcjc_search_tag == 1)?'checked':''; 
$wcjc_search_content =(isset($form_config[0]->wcjc_search_content)&& $form_config[0]->wcjc_search_content == 1)?'checked':''; 
$wcjc_placeholder =(isset($form_config[0]->wcjc_placeholder))?$form_config[0]->wcjc_placeholder:''; 
$wcjc_addtocartlabel =(isset($form_config[0]->wcjc_addtocartlabel))?$form_config[0]->wcjc_addtocartlabel:'';
$json_wcjc_style_setting =(isset($form_config[0]->wcjc_style_setting))?json_decode($form_config[0]->wcjc_style_setting):'';
$wcjc_background_color =(isset($json_wcjc_style_setting->wcjc_background_color))?$json_wcjc_style_setting->wcjc_background_color:'#fff';
$wcjc_text_color =(isset($json_wcjc_style_setting->wcjc_text_color))?$json_wcjc_style_setting->wcjc_text_color:'#000';
$wcjc_btn_background_color =(isset($json_wcjc_style_setting->wcjc_btn_background_color))?$json_wcjc_style_setting->wcjc_btn_background_color:'#d3d3d3';
$wcjc_btn_icon_color =(isset($json_wcjc_style_setting->wcjc_btn_icon_color))?$json_wcjc_style_setting->wcjc_btn_icon_color:'#000';
$wcjc_border_color =(isset($json_wcjc_style_setting->wcjc_border_color))?$json_wcjc_style_setting->wcjc_border_color:'#949494';
$wcjc_add_to_cart_background_color =(isset($json_wcjc_style_setting->wcjc_add_to_cart_background_color))?$json_wcjc_style_setting->wcjc_add_to_cart_background_color:'#2271b1';
$wcjc_add_to_cart_color =(isset($json_wcjc_style_setting->wcjc_add_to_cart_color))?$json_wcjc_style_setting->wcjc_add_to_cart_color:'#fff';
$wcjc_border_size_top =(isset($json_wcjc_style_setting->wcjc_border_size_top))?$json_wcjc_style_setting->wcjc_border_size_top:1;
$wcjc_border_size_right =(isset($json_wcjc_style_setting->wcjc_border_size_right))?$json_wcjc_style_setting->wcjc_border_size_right:1;
$wcjc_border_size_bottom =(isset($json_wcjc_style_setting->wcjc_border_size_bottom))?$json_wcjc_style_setting->wcjc_border_size_bottom:1;
$wcjc_border_size_left =(isset($json_wcjc_style_setting->wcjc_border_size_left))?$json_wcjc_style_setting->wcjc_border_size_left:1;
$wcjc_border_dadius =(isset($json_wcjc_style_setting->wcjc_border_dadius))?$json_wcjc_style_setting->wcjc_border_dadius:0;

?>

<div class="wcjc-form-configuration-container">
	<div class="wcjc-form-example">
		<div class="wpjc-search-form wpjc-search-form-19">
			<form1>
				<input autocomplete="off" type="text" name="wpjc-input-search" data-shop-url="https://dev.wp/shop/" data-id="19" class="wpjc-input-search-19" placeholder="Search">
				<span class="gp-icon icon-search">
					<svg viewBox="0 0 512 512" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em">
						<path fill="#AB7C94" fill-rule="evenodd" clip-rule="evenodd" d="M208 48c-88.366 0-160 71.634-160 160s71.634 160 160 160 160-71.634 160-160S296.366 48 208 48zM0 208C0 93.125 93.125 0 208 0s208 93.125 208 208c0 48.741-16.765 93.566-44.843 129.024l133.826 134.018c9.366 9.379 9.355 24.575-.025 33.941-9.379 9.366-24.575 9.355-33.941-.025L337.238 370.987C301.747 399.167 256.839 416 208 416 93.125 416 0 322.875 0 208z"></path>
					</svg>
				</span>
			</form1>
			<div class="wpjc-rearch-result wpjc-rearch-result-19">
				<div class="wpjc-content">
					<ul>
						<li>
							<div class="image">
								<a href="#">
									<img width="150" height="150" src="<?php echo plugin_dir_url( __FILE__ ).'../img/default.png' ?>" class="attachment-thumbnail size-thumbnail wp-post-image">
								</a>
							</div>
							<div class="body-content">
								<a href="https://dev.wp/product/polo-copy/">
									<h2>Polo (Copy)</h2>
								</a>
								<div class="price">
									<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">S/</span>&nbsp;20.00</bdi></span>
								</div>
							</div>
							<div class="btn-content">
								<span><div class="spinner-button dec-button">-</div><input min="1" name="qty" type="number" value="1"><div class="spinner-button inc-button">+</div></span>
								<a class="jcwp-button jcwp-add_to_cart" data_add_to_cart="99">Add to Cart</a>
							</div>
						</li>
					</ul>
				</div>						
			</div>
		</div>
	</div>
	<form class="wcjc-form <?php echo esc_attr($action_form); ?>">
		<fieldset>
			<legend><h2> <?php echo __('Design Configuration','jc-ajax-search-for-woocommerce'); ?></h2></legend>
			<div class="row-items colums-2 jcwp-design-form">
				<div class="row"> 
					<div><label><?php echo __('Border Color','jc-ajax-search-for-woocommerce'); ?> </label><input type="text" name="wcjc_border_color" value="<?php echo esc_attr($wcjc_border_color); ?>" class="wcjc-color-picker"></div>
					<div><label><?php echo __('Background Color:','jc-ajax-search-for-woocommerce'); ?></label> <input type="text" name="wcjc_background_color" value="<?php echo esc_attr($wcjc_background_color); ?>" class="wcjc-color-picker"></div>
					<div><label><?php echo __('Text Color','jc-ajax-search-for-woocommerce'); ?> </label> <input type="text" name="wcjc_text_color" value="<?php echo esc_attr($wcjc_text_color); ?>" class="wcjc-color-picker"></div>
					<div><label><?php echo __('Background icon search','jc-ajax-search-for-woocommerce'); ?> </label> <input type="text" name="wcjc_btn_background_color" value="<?php echo esc_attr($wcjc_btn_background_color); ?>" class="wcjc-color-picker"></div>
					<div><label><?php echo __('Icon Search Color','jc-ajax-search-for-woocommerce'); ?> </label> <input type="text" name="wcjc_btn_icon_color" value="<?php echo esc_attr($wcjc_btn_icon_color); ?>" class="wcjc-color-picker"></div>
					
				</div>
				<div class="row"> 
					<div><label><?php echo __('Add To Card Background','jc-ajax-search-for-woocommerce'); ?> </label><input type="text" name="wcjc_add_to_cart_background_color" value="<?php echo esc_attr($wcjc_add_to_cart_background_color); ?>" class="wcjc-color-picker"></div>
					<div><label><?php echo __('Add To Card Color','jc-ajax-search-for-woocommerce'); ?> </label><input type="text" name="wcjc_add_to_cart_color" value="<?php echo esc_attr($wcjc_add_to_cart_color); ?>" class="wcjc-color-picker"></div>
					<div> <label><?php echo __('Border Radius','jc-ajax-search-for-woocommerce'); ?>  </label> <input name="wcjc_border_dadius" type="number" min="0" max="200" step="1" value="<?php echo intval($wcjc_border_dadius); ?>"> </div>
					<div><label><?php echo __('Border Size','jc-ajax-search-for-woocommerce'); ?></label> 
						<div class="numbers-input">
							<span>
								<input name="wcjc_border_size_top" type="number" min="0" step="1" value="<?php echo intval($wcjc_border_size_top); ?>">
								<span>TOP</span>
							</span>
							<span>
								<input name="wcjc_border_size_right" type="number" min="0" step="1" value="<?php echo intval($wcjc_border_size_right); ?>">
								<span>RIGHT</span>
							</span>
							<span>
								<input name="wcjc_border_size_bottom" type="number" min="0" step="1" value="<?php echo intval($wcjc_border_size_bottom); ?>">
								<span>BOTTOM</span>
							</span>
							<span>
								<input name="wcjc_border_size_left" type="number" min="0" step="1" value="<?php echo intval($wcjc_border_size_left); ?>">
								<span>LEFT</span>
							</span>
						</div>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend><h2><?php echo __('Search form configuration','jc-ajax-search-for-woocommerce'); ?></h2></legend>
			<div class="row-items">
				<div class="row"> <label><?php echo __('Admin Name:','jc-ajax-search-for-woocommerce'); ?> </label><input type="text" name="wcjc_title" value="<?php echo esc_attr($wcjc_title); ?>"> </div>
				<div class="row"> <label><?php echo __('Placeholder  Input Search:','jc-ajax-search-for-woocommerce'); ?> </label><input type="text" name="wcjc_placeholder" value="<?php echo esc_attr($wcjc_placeholder); ?>"> </div>
				<div class="row"> <label><?php echo __('Limit Results:','jc-ajax-search-for-woocommerce'); ?> </label><input type="number" name="wcjc_limitresult" value="<?php echo intval($wcjc_limitresult); ?>"></div>
					<div class="row v-pro"> <label><?php echo __('Add to Cart Label:','jc-ajax-search-for-woocommerce'); ?> </label><input type="text" name="wcjc_addtocartlabel" value="<?php echo esc_attr($wcjc_addtocartlabel); ?>"> </div>
			</div>
		</fieldset>
		<fieldset>
			<legend><h2> <?php echo __('Display Field Configuration','jc-ajax-search-for-woocommerce'); ?></h2></legend>
			<div class="row-items colums-2">
				<div class="row"> <label class="checkbox"> <input type="checkbox" name="wcjc_display_image" <?php echo esc_attr($wcjc_display_image); ?> > <?php echo __('Display Image','jc-ajax-search-for-woocommerce'); ?></label> </div>
				<div class="row"> <label class="checkbox"> <input type="checkbox" name="wcjc_display_image_link" <?php echo esc_attr($wcjc_display_image_link); ?> > <?php echo __('Add url to Image','jc-ajax-search-for-woocommerce'); ?></label> </div>
				<div class="row"> <label class="checkbox"> <input type="checkbox" name="wcjc_display_price" <?php echo esc_attr($wcjc_display_price); ?> > <?php echo __('Display Price','jc-ajax-search-for-woocommerce'); ?></label> </div>

					<div class="row v-pro"> <label class="checkbox"> <input type="checkbox" name="wcjc_display_addtocart" <?php echo esc_attr($wcjc_display_addtocart); ?> > <?php echo __('Display Add to Cart','jc-ajax-search-for-woocommerce'); ?></label> </div>
					<div class="row v-pro"> <label class="checkbox"> <input type="checkbox" name="wcjc_display_quantity"  <?php echo esc_attr($wcjc_display_quantity); ?> > <?php echo __('Display quantity','jc-ajax-search-for-woocommerce'); ?></label> </div>

			</div>
		</fieldset>
			<fieldset>
				<legend><h2> <?php echo __('Advanced Search Settings','jc-ajax-search-for-woocommerce'); ?></h2></legend>
				<div class="row-items colums-2">
					<div class="row v-pro"> <label class="checkbox"> <input type="checkbox" name="wcjc_search_title" <?php echo esc_attr($wcjc_search_title); ?> > <?php echo __('Search in Title','jc-ajax-search-for-woocommerce'); ?></label> </div>
					<div class="row v-pro"> <label class="checkbox"> <input type="checkbox" name="wcjc_search_category" <?php echo esc_attr($wcjc_search_category); ?> > <?php echo __('Search in Category','jc-ajax-search-for-woocommerce'); ?></label> </div>
					<div class="row v-pro"> <label class="checkbox"> <input type="checkbox" name="wcjc_search_tag" <?php echo esc_attr($wcjc_search_tag); ?> > <?php echo __('Search in Tags','jc-ajax-search-for-woocommerce'); ?></label> </div>
					<div class="row v-pro"> <label class="checkbox"> <input type="checkbox" name="wcjc_search_content" <?php echo esc_attr($wcjc_search_content); ?> > <?php echo __('Search in Content','jc-ajax-search-for-woocommerce'); ?></label> </div>
				</div>
			</fieldset>
		<div class="row">
			<a data_id="<?php echo intval($id); ?>" class="button button-primary button-large" href="#"><?php echo __('Save','jc-ajax-search-for-woocommerce'); ?></a>
		</div>
	</form>
</div>