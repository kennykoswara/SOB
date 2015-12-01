<?php  
   class Friend_model extends CI_Model  
   {  
		function __construct()  
		{   
			parent::__construct();  
		}  

		public function post_select($id)  
		{  
			$this -> db -> select('markers.name, markers.lat, markers.lng, markers.type, markers.request, markers.description, markers.status, markers.post_time,markers.id_user,user_info.picture');
			$this -> db -> from('markers');
			$this->db->join('user_info', 'markers.id_user = user_info.id');
			$this -> db -> where('markers.id_user', $id);
			$this->db->order_by("markers.post_time", "desc"); 
			$query = $this->db->get();  
			return $query;  
		} 
		public function friend_picture($id)  
		{  
			$this -> db -> select('picture, name,email,address,score');
			$this -> db -> from('user_info');
			$this -> db -> where('id', $id);
			$query = $this->db->get();  
			return $query;  
		}
		public function friend_list($id_user)
		{
			$this -> db -> select('user_info.name, friends.id_user, friends.id_friend, user_info.username, user_info.picture, friends.request, friends.approval, friends.status');
			$this -> db -> from('user_info');
			$this->db->join('friends', 'user_info.id = friends.id_user');
			$this -> db -> where('friends.id_friend',$id_user);
			$query = $this->db->get();
			return $query;
		}		
		public function friend_list2($id_user)
		{
			$this -> db -> select('user_info.name, friends.id_user, friends.id_friend, user_info.username, user_info.picture, friends.request, friends.approval, friends.status');
			$this -> db -> from('user_info');
			$this->db->join('friends', 'user_info.id = friends.id_friend');
			$this -> db -> where('friends.id_user',$id_user);
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
		public function check_friend_request($id_user, $id)
		{
			$this -> db -> select('user_info.id, user_info.username, friends.request, friends.approval');
			$this -> db -> from('user_info');
			$this->db->join('friends', 'user_info.id = friends.id_user');
			$this -> db -> where('friends.id_user',$id);
			$this -> db -> where('friends.id_friend',$id_user);
			$query = $this->db->get();  
			return $query;  
		}
		public function remove_request($id, $id_user)
		{
			$this -> db -> where('id_user', $id_user);
			$this -> db -> where('id_friend', $id);
			$this -> db -> delete('friends'); 
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
		public function request_list($id_user)
		{
			$this -> db -> select('user_info.id, user_info.username, friends.request, friends.approval, friends.status');
			$this -> db -> from('user_info');
			$this->db->join('friends', 'user_info.id = friends.id_user');
			$this -> db -> where('friends.id_friend',$id_user);
			$query = $this->db->get();  
			return $query;  
		}
   }