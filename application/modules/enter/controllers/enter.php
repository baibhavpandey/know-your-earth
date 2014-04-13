<?php
class Enter extends MX_Controller 
{

	function __construct() {
	parent::__construct();
	}
	
	public function index(){
		$this->load->view('add_location');
	}
	
	public function latilong(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('location','Location', 'required');
		$this->form_validation->set_rules('latitude','Latitude', 'required');
		$this->form_validation->set_rules('longitude','Longitude', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$data = array(
				'location' => $this->input->post('location'),
				'latitude' => $this->input->post('latitude'),
				'longitude'=>$this->input->post('longitude')
			);
			if(!$this->_insert($data)){
				echo 'Success';
			}else
		{
			echo 'unsuccess';
		}
		}
	}
	function get($order_by){
	$this->load->model('mdl_enter');
	$query = $this->mdl_enter->get($order_by);
	return $query;
	}
	
	function get_with_limit($limit, $offset, $order_by) {
	$this->load->model('mdl_enter');
	$query = $this->mdl_enter->get_with_limit($limit, $offset, $order_by);
	return $query;
	}
	
	function get_where($id){
	$this->load->model('mdl_enter');
	$query = $this->mdl_enter->get_where($id);
	return $query;
	}
	
	function get_where_custom($col, $value) {
	$this->load->model('mdl_enter');
	$query = $this->mdl_enter->get_where_custom($col, $value);
	return $query;
	}
	
	function _insert($data){
	$this->load->model('mdl_enter');
	$this->mdl_enter->_insert($data);
	}
	
	function _update($id, $data){
	$this->load->model('mdl_enter');
	$this->mdl_enter->_update($id, $data);
	}
	
	function _delete($id){
	$this->load->model('mdl_enter');
	$this->mdl_enter->_delete($id);
	}
	
	function count_where($column, $value) {
	$this->load->model('mdl_enter');
	$count = $this->mdl_enter->count_where($column, $value);
	return $count;
	}
	
	function get_max() {
	$this->load->model('mdl_enter');
	$max_id = $this->mdl_enter->get_max();
	return $max_id;
	}
	
	function _custom_query($mysql_query) {
	$this->load->model('mdl_enter');
	$query = $this->mdl_enter->_custom_query($mysql_query);
	return $query;
	}

}