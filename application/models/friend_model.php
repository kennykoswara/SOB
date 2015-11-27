<?php  
   class Friend_model extends CI_Model  
   {  
		function __construct()  
		{   
			parent::__construct();  
		}  

		public function post_select($id)  
		{  
			$this -> db -> select('id_user, name, lat, lng, type, request, description, status, post_time');
			$this -> db -> from('markers');
			$this -> db -> where('id_user', $id);
			$this->db->order_by("post_time", "desc"); 
			$query = $this->db->get();  
			return $query;  
		} 
		public function friend_picture($id)  
		{  
			$this -> db -> select('picture');
			$this -> db -> from('user_info');
			$this -> db -> where('id', $id);
			$query = $this->db->get();  
			return $query;  
		} 
		public function check_friend($id_user, $id)
		{
			$this -> db -> select('user_info.id, user_info.username, friends.request, friends.approval');
			$this -> db -> from('user_info');
			$this->db->join('friends', 'user_info.id = friends.id_user');
			$this -> db -> where('friends.id_user',$id_user);
			$this -> db -> where('friends.id_friend',$id);
			$query = $this->db->get();  
			return $query;  
		}
		public function remove_request($id, $id_user)
		{
			$this -> db -> where('id_user', $id_user);
			$this -> db -> where('id_friend', $id);
			$this -> db -> delete('friends'); 
		}
   }