<?php
class Temperature_info extends MX_Controller 
{

	function __construct() {
	parent::__construct();
	}
	
	function index(){
		$this->load->view('temp_post');
	}
	function postin(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('year','Year','required');
		$this->form_validation->set_rules('mean','Mean','required');
		$this->form_validation->set_rules('min','min','required');
		$this->form_validation->set_rules('max','Max','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}else{
			$id = '1';
			$data = array(
				'location_id' => $id,
				'year' =>$this->input->post('year'),
				'avg_mean_temp' => $this->input->post('mean'),
				'avg_min_temp' => $this->input->post('min'),
				
				'avg_max_temp' => $this->input->post('max')
			);
			
			if(!$this->_insert($data)){
				echo 'success!';
				redirect('temperature_info');
			}
		}
	}
	
	function year1(){
		$id = $this->session->userdata('location_id');
		
	}
	function get($order_by){
	$this->load->model('mdl_temperature_info');
	$query = $this->mdl_temperature_info->get($order_by);
	return $query;
	}
	
	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_temperature_info');
	$query = $this->mdl_temperature_info->get_with_limit($limit, $offset, $order_by);
	return $query;
	}
	
	function get_where($id){
	$this->load->model('mdl_temperature_info');
	$query = $this->mdl_temperature_info->get_where($id);
	return $query;
	}
	
	function get_where_custom($col, $value) {
	$this->load->model('mdl_temperature_info');
	$query = $this->mdl_temperature_info->get_where_custom($col, $value);
	return $query;
	}
	
	function _insert($data){
	$this->load->model('mdl_temperature_info');
	$this->mdl_temperature_info->_insert($data);
	}
	
	function _update($id, $data){
	$this->load->model('mdl_temperature_info');
	$this->mdl_temperature_info->_update($id, $data);
	}
	
	function _delete($id){
	$this->load->model('mdl_temperature_info');
	$this->mdl_temperature_info->_delete($id);
	}
	
	function count_where($column, $value) {
	$this->load->model('mdl_temperature_info');
	$count = $this->mdl_temperature_info->count_where($column, $value);
	return $count;
	}
	
	function get_max() {
	$this->load->model('mdl_temperature_info');
	$max_id = $this->mdl_temperature_info->get_max();
	return $max_id;
	}
	
	function _custom_query($mysql_query) {
	$this->load->model('mdl_temperature_info');
	$query = $this->mdl_temperature_info->_custom_query($mysql_query);
	return $query;
	}

}