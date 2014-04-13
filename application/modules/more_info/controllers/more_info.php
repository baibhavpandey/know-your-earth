<?php
class More_info extends MX_Controller 
{

	function __construct() {
	parent::__construct();
	}
	
	function index(){
		$this->load->view('info_page');
	}
	function get_description(){
		$id = $this->session->userdata('location_id');
		$query = $this->get_where($id);
		foreach($query->result() as $row){
			$description = $row->description;
			$location = $row->location;
			
			echo $description;
		}
		
	}
	function get_vege_desc(){
		$id = $this->session->userdata('location_id');
		$query = $this->get_where($id);
		foreach($query->result() as $row){
			$description = $row->vege_description;
						
			echo $description;
		}
	}
	function get($order_by){
	$this->load->model('mdl_more_info');
	$query = $this->mdl_more_info->get($order_by);
	return $query;
	}
	
	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_more_info');
	$query = $this->mdl_more_info->get_with_limit($limit, $offset, $order_by);
	return $query;
	}
	
	function get_where($id){
	$this->load->model('mdl_more_info');
	$query = $this->mdl_more_info->get_where($id);
	return $query;
	}
	
	function get_where_custom($col, $value) {
	$this->load->model('mdl_more_info');
	$query = $this->mdl_more_info->get_where_custom($col, $value);
	return $query;
	}
	
	function _insert($data){
	$this->load->model('mdl_more_info');
	$this->mdl_more_info->_insert($data);
	}
	
	function _update($id, $data){
	$this->load->model('mdl_more_info');
	$this->mdl_more_info->_update($id, $data);
	}
	
	function _delete($id){
	$this->load->model('mdl_more_info');
	$this->mdl_more_info->_delete($id);
	}
	
	function count_where($column, $value) {
	$this->load->model('mdl_more_info');
	$count = $this->mdl_more_info->count_where($column, $value);
	return $count;
	}
	
	function get_max() {
	$this->load->model('mdl_more_info');
	$max_id = $this->mdl_more_info->get_max();
	return $max_id;
	}
	
	function _custom_query($mysql_query) {
	$this->load->model('mdl_more_info');
	$query = $this->mdl_more_info->_custom_query($mysql_query);
	return $query;
	}

}