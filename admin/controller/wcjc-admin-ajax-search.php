<?php 
require_once(plugin_dir_path( __FILE__ ).'../model/wcjc-admin-ajax-search-model.php');

/**
 * 
 */
class AdminAjaxSearchController
{
	
	function __construct()
	{
		$this->model = new AdminAjaxSearchModel();
	}

	function index(){
		if(!current_user_can('manage_options')){wp_die('Unauthorized User');}
		$search_forms = $this->model->GetSearchFormsController();
		require_once(plugin_dir_path( __FILE__ ).'../views/search-form-list.php');
	}

	public function SaveSearchFormController(){
		return $this->model->SaveSearchFormModel();
	}

	public function DeleteSearchFormController(){
		return $this->model->DeleteSearchFormModel();
	}
	

}
 ?>