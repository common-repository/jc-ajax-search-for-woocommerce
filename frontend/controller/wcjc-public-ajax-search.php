<?php
require_once(plugin_dir_path( __FILE__ ).'../model/wcjc-public-ajax-search-model.php');
//use Wc_Ajax_Search_Jc\Frontend\Model as Model;
/**
 * 
 */
class PublicAjaxSearchController 
{
	function __construct()
	{
		$this->model = new PublicAjaxSearchModel();
	}
	public function shorcodeJcwpSearchController($id){
		if ($id) {
			ob_start();
			$this->view($id);
			return ob_get_clean();
		}
	}
	public function view($id){ 
		$FormConfig = $this->model->GetSearchFormConfig($id);
		if($FormConfig){
			$wcjc_placeholder = $FormConfig[0]->wcjc_placeholder;
			$wcjc_addtocartlabel = $FormConfig[0]->wcjc_addtocartlabel;
			$wcjc_style_setting = ($FormConfig[0]->wcjc_style_setting)?json_decode($FormConfig[0]->wcjc_style_setting):'';
			$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
			include plugin_dir_path(__FILE__).'../views/wpjc-shorcode-search-print.php';
		}
	}

	public function WpjcGetResultProducts($formid, $text){
			$advanced_query = 0;
			global $wpdb;
			$FormConfig = $this->model->GetSearchFormConfig($formid);
			$id = $FormConfig[0]->id;
    		$wcjc_title = $FormConfig[0]->wcjc_title;
    		$wcjc_limitresult = $FormConfig[0]->wcjc_limitresult;
    		$wcjc_search_category = $FormConfig[0]->wcjc_search_category;
			$wcjc_search_tag = $FormConfig[0]->wcjc_search_tag;
			$wcjc_search_title = $FormConfig[0]->wcjc_search_title;
			$wcjc_search_content = $FormConfig[0]->wcjc_search_content;
    		$wcjc_display_image = $FormConfig[0]->wcjc_display_image;
    		$wcjc_display_image_link = $FormConfig[0]->wcjc_display_image_link;
    		$wcjc_display_price = $FormConfig[0]->wcjc_display_price;
    		$wcjc_display_quantity = $FormConfig[0]->wcjc_display_quantity;
    		$wcjc_display_addtocart = $FormConfig[0]->wcjc_display_addtocart;
    		$wcjc_placeholder = $FormConfig[0]->wcjc_placeholder;
    		$wcjc_addtocartlabel = ($FormConfig[0]->wcjc_addtocartlabel!= "" )?$FormConfig[0]->wcjc_addtocartlabel:__('Add to cart','jc-ajax-search-for-woocommerce');
    		
	
				if($wcjc_search_category == 1 || $wcjc_search_tag == 1 || $wcjc_search_title == 1 || $wcjc_search_content == 1){
					$advanced_query = 1;

					$wcjc_search_category = ($wcjc_search_category==1)?"t_cat.slug LIKE CONCAT('%".$text."%')":'';
					$wcjc_search_tag = ($wcjc_search_tag==1)?"OR t_tag.slug LIKE CONCAT('%".$text."%')":'';
					$wcjc_search_title = ($wcjc_search_title==1)?"OR p.post_title LIKE '%".$text."%'":'';
					$wcjc_search_content = ($wcjc_search_content==1)?"OR p.post_content LIKE '%".$text."%'":'';

					$final_filter = $wcjc_search_category.$wcjc_search_tag.$wcjc_search_title.$wcjc_search_content;
					$final_filter = (substr($final_filter, 0, 2)==='OR')? ltrim($final_filter, 'OR'):$final_filter;

					$query_db ="
					SELECT
					p.id,p.post_title,p.post_content,
					GROUP_CONCAT(DISTINCT t_tag.slug) as tags,
					GROUP_CONCAT(DISTINCT t_cat.slug) as categories
					FROM {$wpdb->posts} p
					LEFT JOIN {$wpdb->term_relationships} tr
					on (p.ID=tr.object_id)
					LEFT JOIN {$wpdb->term_taxonomy} tt_tag
					on (tt_tag.term_taxonomy_id=tr.term_taxonomy_id and tt_tag.taxonomy='product_tag')
					LEFT JOIN {$wpdb->term_taxonomy} tt_cat
					on (tt_cat.term_taxonomy_id=tr.term_taxonomy_id and tt_cat.taxonomy='product_cat')
					LEFT JOIN {$wpdb->terms} t_tag 
					on (tt_tag.term_id=t_tag.term_id)
					LEFT JOIN {$wpdb->terms} t_cat 
					on (tt_cat.term_id=t_cat.term_id)
					WHERE p.post_status ='publish' 
					AND p.post_type = 'product' 
					AND (
						".$final_filter."
						)
						GROUP BY p.id;
						";
						$all_products = $wpdb->get_results($query_db);
				}
	
			
			$html_result ="";

			if($advanced_query === 1){
				if($all_products){
					$html_result .= "<ul>";
					foreach ($all_products as $key => $value) {
						$_product = wc_get_product( $value->id );
						$product_link = get_permalink( $value->id );
						$product_id = $value->id; 
						$image = get_the_post_thumbnail($product_id,'thumbnail');
						$html_result.='<li>';
						$image = ($wcjc_display_image_link == 1)?'<a href="'.$product_link.'">'.$image.'</a>':$image;
						$html_result.= ($wcjc_display_image == 1)?'<div class="image">'.$image.'</div>':'';
						$html_result.='<div class="body-content">';
						$html_result.='<a href="'.$product_link.'"><h2>'.$value->post_title.'</h2></a>';
						$html_result.= ($wcjc_display_price == 1)?'<div class="price">'.$_product->get_price_html().'</div>':'';
						$html_result.='</div>';
						$html_result.='<div class="btn-content">';
						if ($_product->get_type()=='simple') {
							$html_result.= ($wcjc_display_quantity == 1)?'<span><div class="spinner-button dec-button">-</div><input min="1" name="qty" type="number" value="1"><div class="spinner-button inc-button">+</div></span>':'';
							$html_result.= ($wcjc_display_addtocart == 1)?'<a class="jcwp-button jcwp-add_to_cart" data_add_to_cart="'.$product_id.'">'. esc_attr($wcjc_addtocartlabel).'</a>':'';
						}else{
							$html_result.= ($wcjc_display_addtocart == 1)?'<a href="'.$product_link.'" class="jcwp-button">'. esc_attr($wcjc_addtocartlabel) .'</a>':'';
						}
						$html_result.='</div>';
						$html_result.='</li>';
					}
					$html_result.='</ul>';
				}
			}else{
				$param_name_body = array(
					'post_type' => 'product',
					'posts_per_page' => $wcjc_limitresult,
					's' => $text,
					'paginate' => true,
					'stock_status' => 'instock',
					'status' => 'publish'
				);
				$query = wc_get_products($param_name_body);
				$products =  $query->products;
				if($products){
					$html_result .= "<ul>";
					foreach ($products as $key => $product) {
						$product_link = $product->get_permalink();
						$product_id = $product->get_id(); 
						$image = get_the_post_thumbnail($product_id,'thumbnail');
						$html_result.='<li>';
						$image = ($wcjc_display_image_link == 1)?'<a href="'.$product_link.'">'.$image.'</a>':$image;
						$html_result.= ($wcjc_display_image == 1)?'<div class="image">'.$image.'</div>':'';
						$html_result.='<div class="body-content">';
						$html_result.='<a href="'.$product_link.'"><h2>'.$product->get_title().'</h2></a>';
						$html_result.= ($wcjc_display_price == 1)?'<div class="price">'.$product->get_price_html().'</div>':'';
						$html_result.='</div>';
						$html_result.='<div class="btn-content">';
						if ($product->get_type()=='simple') {
							$html_result.= ($wcjc_display_quantity == 1)?'<span><div class="spinner-button dec-button">-</div><input min="1" name="qty" type="number" value="1"><div class="spinner-button inc-button">+</div></span>':'';
							$html_result.= ($wcjc_display_addtocart == 1)?'<a class="jcwp-button jcwp-add_to_cart" data_add_to_cart="'.$product_id.'">'. esc_attr($wcjc_addtocartlabel).'</a>':'';
						}else{
							$html_result.= ($wcjc_display_addtocart == 1)?'<a href="'.$product_link.'" class="jcwp-button">'. esc_attr($wcjc_addtocartlabel) .'</a>':'';
						}
						$html_result.='</div>';
						$html_result.='</li>';
					}
					$html_result.='</ul>';
				}
			}		
		return $html_result;
	}
}
?>