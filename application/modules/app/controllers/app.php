<?php
class App extends MX_Controller 
{

	function __construct() {
	parent::__construct();
	}
	
	function index(){
		$this->load->view('map');
	}
	
	function check(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('location', 'Location', 'required|xss_clean|trim');
		
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$loc =  $this->input->post('location');
			$dat = $this->get_where($loc);
			foreach($dat->result() as $row){
				$id = $row->id;
				$this->session->set_userdata('location_id', $id);
			}
			
			$data['query'] = $this->get_where($loc);
			$this->load->view('map1',$data);
		}
		
		
	}
	function get($order_by){
	$this->load->model('mdl_app');
	$query = $this->mdl_app->get($order_by);
	return $query;
	}
	
	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_app');
	$query = $this->mdl_app->get_with_limit($limit, $offset, $order_by);
	return $query;
	}
	
	function get_where($id){
	$this->load->model('mdl_app');
	$query = $this->mdl_app->get_where($id);
	return $query;
	}
	
	function get_where_custom($col, $value) {
	$this->load->model('mdl_app');
	$query = $this->mdl_app->get_where_custom($col, $value);
	return $query;
	}
	
	function _insert($data){
	$this->load->model('mdl_app');
	$this->mdl_app->_insert($data);
	}
	
	function _update($id, $data){
	$this->load->model('mdl_app');
	$this->mdl_app->_update($id, $data);
	}
	
	function _delete($id){
	$this->load->model('mdl_app');
	$this->mdl_app->_delete($id);
	}
	
	function count_where($column, $value) {
	$this->load->model('mdl_app');
	$count = $this->mdl_app->count_where($column, $value);
	return $count;
	}
	
	function get_max() {
	$this->load->model('mdl_app');
	$max_id = $this->mdl_app->get_max();
	return $max_id;
	}
	
	function _custom_query($mysql_query) {
	$this->load->model('mdl_app');
	$query = $this->mdl_app->_custom_query($mysql_query);
	return $query;
	}

}