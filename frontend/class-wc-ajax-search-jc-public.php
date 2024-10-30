<?php
include_once(plugin_dir_path( __FILE__ ).'/controller/wcjc-public-ajax-search.php');
/**
 * The public-facing functionality of the plugin.
 *
 * @link       domain.com
 * @since      1.0.0
 *
 * @package    Wc_Ajax_Search_Jc
 * @subpackage Wc_Ajax_Search_Jc/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wc_Ajax_Search_Jc
 * @subpackage Wc_Ajax_Search_Jc/public
 * @author     Cesar <jcwpplugins@gmail.com>
 */
class Wc_Ajax_Search_Jc_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		
		add_shortcode('jcwpsearchform',array($this,'shorcodeJcwpSearch'));

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->controller = new PublicAjaxSearchController();


		add_action('wp_ajax_WpjcSearchProducts',array($this,'WpjcSearchProducts'));
		add_action('wp_ajax_nopriv_WpjcSearchProducts',array($this,'WpjcSearchProducts'));

		add_action('wp_ajax_WcJcAddToCartAjax',array($this,'WcJcAddToCartAjax'));
		add_action('wp_ajax_nopriv_WcJcAddToCartAjax',array($this,'WcJcAddToCartAjax'));
		
	

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Ajax_Search_Jc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Ajax_Search_Jc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-ajax-search-jc-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Ajax_Search_Jc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Ajax_Search_Jc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name.'_plublic_js', plugin_dir_url( __FILE__ ) . 'js/wc-ajax-search-jc-public.js', array( 'jquery' ), $this->version, true );
		wp_localize_script(
			$this->plugin_name.'_plublic_js',
			'wpjc_ajax_public',
			[
				'public_ajax_url'=> admin_url( 'admin-ajax.php' ),
				'security' => wp_create_nonce('lfw_seg')
			]
		);

		wp_localize_script(
			$this->plugin_name.'_plublic_js',
			'wpjc_ajax_public_add_to_cart',
			[
				'public_ajax_url_add_to_cart'=> admin_url( 'admin-ajax.php' ),
				'security' => wp_create_nonce('lfw_seg')
			]
		);




	}

	public function shorcodeJcwpSearch($args){
		$content = '';
		$id = $args['id'];
		if($id){
			$content.= $this->controller->shorcodeJcwpSearchController($id);
		}else{
			$content.= __('No content found','jc-ajax-search-for-woocommerce');
		}
		return  $content;
	}

	public function WpjcSearchProducts(){
		check_ajax_referer( 'lfw_seg', 'security' );
		if($_POST){
			$form_id = (isset($_POST['formid']))?intval($_POST['formid']):'';
			$text = (isset($_POST['text']))?sanitize_text_field( $_POST['text'] ):'';
			if($form_id && $text){
				$result = $this->controller->WpjcGetResultProducts($form_id,$text);
			}else{
				$result = __('Not Result Found','jc-ajax-search-for-woocommerce');
			}
			wp_send_json_success(array('html' => $result ));
		}
	}

	function WcJcAddToCartAjax() {
		check_ajax_referer( 'lfw_seg', 'security' );
		// Grab POSTed data, typecast as INT.
		$product_id = intval($_POST['product_id']);
		$quantity = ($_POST['quantity']) ? intval($_POST['quantity']) : 1;
		// if a valid integer is provided, try to add it to cart. Woo can handle the validation for that.
		if ($product_id) {
		  WC()->cart->add_to_cart( $product_id, $quantity);
		}
		die();
	  }


}