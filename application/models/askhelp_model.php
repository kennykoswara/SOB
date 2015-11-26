<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class askhelp_model extends CI_Model {
	public function __construct()
	{
	parent::__construct();
	}
	function select_markers()
	{
		$this->db->select("*");
		$this->db->from("markers");
		$query = $this->db->get();        
		return $query;
	}
	
	function get_address($id)
	{
		$this -> db -> select('address');
		$this -> db -> from('user_info');
		$this -> db -> where('id',$id);
		$query = $this->db->get();  
		return $query;  
	}
	
	function add_help($username, $address, $datetime, $id)
	{
		$data=array(
			'name'=>$username,
			'id_user'=>$id,
			'address'=>$address,
			'type'=>$this->input->post('type'),
			'lat'=>$this->input->post('my_lat'),
			'lng'=>$this->input->post('my_long'),
			'request'=>$this->input->post('request'),
			'post_time'=>$datetime,
			'description'=>$this->input->post('desc')
		);
		$this->db->insert('markers',$data);
		return true;
	}
}