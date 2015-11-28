<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class map_model extends CI_Model {
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
	public function request_list($id_user)
	{
		$this -> db -> select('user_info.id, user_info.username, friends.request, friends.approval, friends.status');
		$this -> db -> from('user_info');
		$this->db->join('friends', 'user_info.id = friends.id_user');
		$this -> db -> where('friends.id_friend',$id_user);
		$query = $this->db->get();  
		return $query;  
	}		
	public function remove_friend_request($id, $id_user)
	{
		$this -> db -> where('id_user', $id);
		$this -> db -> where('id_friend', $id_user);
		$this -> db -> delete('friends'); 
	}
	public function update_approval($id, $id_user)
	{
		$data = array(
            'approval'=>'approved',
			'status'=>'T'
        );
		$this->db->where('id_user', $id);
		$this->db->where('id_friend', $id_user);
		$this->db->update('friends', $data);
	}
	public function add_book($id_mission, $id_requestor, $id_acceptor, $datetime)
	{
		$data=array(
			'id_marker'=>$id_mission,
			'id_requestor'=>$id_requestor,
			'id_acceptor'=>$id_acceptor,
			'accept_date'=>$datetime,
			'request_stat'=>'taken'
		);
		$this->db->insert('mission',$data);
		return true;
	}
}