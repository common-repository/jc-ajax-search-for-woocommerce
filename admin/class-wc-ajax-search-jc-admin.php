<?php
require_once(plugin_dir_path( __FILE__ ).'/controller/wcjc-admin-ajax-search.php');
require_once(plugin_dir_path( __FILE__ ).'../frontend/model/wcjc-public-ajax-search-model.php');
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       domain.com
 * @since      1.0.0
 *
 * @package    Wc_Ajax_Search_Jc
 * @subpackage Wc_Ajax_Search_Jc/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Ajax_Search_Jc
 * @subpackage Wc_Ajax_Search_Jc/admin
 * @author     Cesar <jcwpplugins@gmail.com>
 */
class Wc_Ajax_Search_Jc_Admin {

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
	const text_domain = 'jc-ajax-search-for-woocommerce';
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->controller = new AdminAjaxSearchController();
		$this->publicmodel = new PublicAjaxSearchModel();
		add_action('admin_menu', array($this,'wcjc_register_menu_page'));
		add_action('wp_ajax_SaveSearchForm',array($this,'SaveSearchForm'));
		add_action('wp_ajax_DeleteSearchForm',array($this,'DeleteSearchForm'));
		//add_action('wp_ajax_GetSearchForms',array($this,'GetSearchForms'));

	}

	/**
	 * Register the stylesheets for the admin area.
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
		wp_enqueue_style( $this->plugin_name.'sweetalert', plugin_dir_url( __FILE__ ) . 'css/sweetalert/sweetalert2.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-ajax-search-jc-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wp-color-picker' );
		

	}

	/**
	 * Register the JavaScript for the admin area.
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
		wp_enqueue_script( $this->plugin_name.'sweetalert', plugin_dir_url( __FILE__ ) . 'js/sweetalert/sweetalert2.all.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'_admin_js', plugin_dir_url( __FILE__ ) . 'js/wc-ajax-search-jc-admin.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'wp-color-picker');
			wp_localize_script(
				$this->plugin_name.'_admin_js',
				'plugin_ajax_object',
				[
					'admin_ajax_url'=> admin_url( 'admin-ajax.php' ),
					'security' => wp_create_nonce('lfw_seg')
				]
			);

	}
	public function wcjc_register_menu_page(){
		add_menu_page(
			__('WC Ajax Search',self::text_domain), 
			'WC Ajax Search', 
			'manage_options', 
			'woocomerce_ajax_search', 
			array($this, 'wcjc_my_config_page'), 
			plugin_dir_url( __FILE__ ).'img/jcwpplugins.svg'
		);
		add_submenu_page( 
			'woocomerce_ajax_search', 
			'Create Search Form', 
			'Create Search Form', 
			'manage_options', 
			'create-search-form', 
			array($this, 'wcjc_create_search_form')
		);
	}

	public function wcjc_my_config_page(){
		$this->controller->index();
	}

	public function wcjc_create_search_form(){
		if(!current_user_can('manage_options')){wp_die('Unauthorized User');}
		if(isset($_GET['id']) && $_GET['id'] != ""){
			$form_config = $this->publicmodel->GetSearchFormConfig($_GET['id']);
			$action_form = 'edit';
		}else{
			$action_form = 'create';
		}
		require_once(plugin_dir_path( __FILE__ ).'/views/search-form-create.php');
	}

	public function SaveSearchForm(){
		check_ajax_referer('lfw_seg','nonce');
		wp_send_json_success(array('result' => $this->controller->SaveSearchFormController() ));
	}

	public function DeleteSearchForm(){
		check_ajax_referer('lfw_seg','nonce');
		wp_send_json_success(array('result' => $this->controller->DeleteSearchFormController() ));
	}
}