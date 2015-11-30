<?php
 class Requested_model extends CI_Model
   {
		function __construct()
		{
			parent::__construct();
		}
		public function friend_list($id_user)
		{
			$this -> db -> select('user_info.name, friends.id_user, friends.id_friend, user_info.username, user_info.picture, friends.request, friends.approval, friends.status,user_info.email, user_info.join');
			$this -> db -> from('user_info');
			$this->db->join('friends', 'user_info.id = friends.id_friend');
			$this -> db -> where('friends.id_user',$id_user);
			$query = $this->db->get();
			return $query;
		}
		public function request_list($id_user)
		{
			$this -> db -> select('user_info.id, user_info.username, user_info.picture, friends.request, friends.approval, friends.status');
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
   }