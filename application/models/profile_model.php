<?php  
   class Profile_model extends CI_Model  
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
		public function add_Picture($link, $id)
		{
			$data=array(
				'picture' => $link
			);
			$this->db->where('id', $id);
			$this->db->update('user_info',$data);
		}
		public function user_select($id)  
		{  
			$this -> db -> select('email, address, picture');
			$this -> db -> from('user_info');
			$this -> db -> where('id', $id);
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
   }