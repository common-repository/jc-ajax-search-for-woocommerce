<?php 
//namespace Wc_Ajax_Search_Jc\Frontend\Model;
/**
 * 
 */
class PublicAjaxSearchModel
{
	function __construct()
	{
		// code...
	}
	public function GetSearchFormConfig($id){
		global $wpdb;
		$searchConfig = $wpdb->get_results("select * from wcjc_ajax_search_shorcode where id =".$id);
		$result = ($searchConfig) ? $searchConfig : null;
		return $result;
	}
}

?>