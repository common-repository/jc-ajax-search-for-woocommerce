<?php 
class AdminAjaxSearchModel
{
	
	function __construct()
	{
		// code...
	}

	public function GetSearchFormsController(){
		global $wpdb;
		$result_search_forms = $wpdb->get_results( "SELECT * FROM wcjc_ajax_search_shorcode");
		if ($result_search_forms) {
			return $result_search_forms;
		}else{
			return null;
		}
	}

	public function SaveSearchFormModel(){
		$result = '';
		if ($_POST['data']) {
			
			$swcjc_style_setting = json_encode($_POST['data']['wcjc_style_setting']);
			error_log($swcjc_style_setting);

			global $wpdb;
			$form_id = intval($_POST['form_id']);
			$tablename = "wcjc_ajax_search_shorcode";
			$data = array(
				'wcjc_title' => ($_POST['data']['wcjc_title'])? sanitize_text_field($_POST['data']['wcjc_title']) : '',
				'wcjc_placeholder' => ($_POST['data']['wcjc_placeholder'])? sanitize_text_field($_POST['data']['wcjc_placeholder']) : '',
				'wcjc_addtocartlabel' => ($_POST['data']['wcjc_addtocartlabel'])? sanitize_text_field($_POST['data']['wcjc_addtocartlabel']) : '',
				'wcjc_limitresult' => ($_POST['data']['wcjc_limitresult'])? intval($_POST['data']['wcjc_limitresult']) : '',
				'wcjc_search_title' => (isset($_POST['data']['wcjc_search_title'])&& $_POST['data']['wcjc_search_title']==1)? 1 : 0,
				'wcjc_search_category' => (isset($_POST['data']['wcjc_search_category'])&& $_POST['data']['wcjc_search_category']==1)? 1 : 0,
				'wcjc_search_tag' => (isset($_POST['data']['wcjc_search_tag'])&& $_POST['data']['wcjc_search_tag']==1)? 1 : 0,
				'wcjc_search_content' => (isset($_POST['data']['wcjc_search_content'])&& $_POST['data']['wcjc_search_content']==1)? 1 : 0,
				'wcjc_display_image' => (isset($_POST['data']['wcjc_display_image'])&& $_POST['data']['wcjc_display_image']==1)? 1 : 0,
				'wcjc_display_image_link' => (isset($_POST['data']['wcjc_display_image_link'])&& $_POST['data']['wcjc_display_image_link']==1)? 1 : 0,
				'wcjc_display_price' => (isset($_POST['data']['wcjc_display_price'])&& $_POST['data']['wcjc_display_price']==1)? 1 : 0,
				'wcjc_display_quantity' => (isset($_POST['data']['wcjc_display_quantity'])&& $_POST['data']['wcjc_display_quantity']==1)? 1 : 0,
				'wcjc_display_addtocart' => (isset($_POST['data']['wcjc_display_addtocart'])&& $_POST['data']['wcjc_display_addtocart']==1)? 1 : 0,
				'wcjc_style_setting' => (isset($_POST['data']['wcjc_style_setting']))? sanitize_text_field($swcjc_style_setting) : '',
			);
			if($form_id && $form_id > 0){
				$result_insert = $wpdb->update( $tablename, $data,array('id'=>$form_id));
				$result = ($result_insert)?'done':'error';
			}else{
				$result_insert = $wpdb->insert( $tablename, $data);
				$result = ($result_insert)?'done':'error';
			}
		}else{
			$result = 'error';
		}
		return $result;
	}
	public function DeleteSearchFormModel(){
		$result = '';
		$tablename = "wcjc_ajax_search_shorcode";
			global $wpdb;
			$r_id = intval($_POST['form_id']);
 			if ( $r_id > 0) {
				 $delete = $wpdb->delete( $tablename, array( 'id' => $r_id ), array( '%d' ) );
				 if ($delete) {
				 	$result = 'done';
				 }else{
				 	$result = 'error';
				 }
			}
		return $result;
	}
}
?>