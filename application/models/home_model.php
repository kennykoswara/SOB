<?php  
   class Home_model extends CI_Model  
   {  
		function __construct()  
		{   
			parent::__construct();  
		}  

		public function select($term, $id)
		{
			$this -> db -> select('id, username, email, picture, join');
			$this -> db -> from('user_info');
			$this->db->where("(username LIKE '%$term' OR username LIKE '%$term%' OR username LIKE '$term%')");
			$this->db->where('id !=', $id);
			$this->db->order_by("username", "asc"); 
			$query = $this->db->get();  
			return $query;
		}
		public function check_friend($id)
		{
			$this -> db -> select('user_info.id, user_info.username, friends.approval');
			$this -> db -> from('user_info');
			$this->db->join('friends', 'user_info.id = friends.id_friend');
			$this -> db -> where('friends.id_user',$id);
			$query = $this->db->get();  
			return $query;  
		}
		public function check_post($id)
		{
			$this -> db -> select('id_user, id_friend, approval');
			$this -> db -> from('friends');
			$this -> db -> where('friends.id_user',$id);
			$this -> db -> or_where('friends.id_friend',$id);
			$this -> db -> where('status','T');
			$query = $this->db->get();  
			return $query;  
		}
		public function post_select($id)  
		{  
			$this -> db -> select('markers.name, markers.lat, markers.lng, markers.type, markers.request, markers.description, markers.status, markers.post_time,markers.id_user,user_info.picture');
			$this -> db -> from('markers');
			$this->db->join('user_info', 'markers.id_user = user_info.id');
			$this->db->order_by("markers.post_time", "desc"); 
			$query = $this->db->get();  
			return $query;  
		}  
		public function add_request($id_user, $id_friend)
		{
			$data=array(
				'id_user'=>$id_user,
				'id_friend'=>$id_friend,
				'request'=>'send',
				'approval'=>'pending',
				'status'=>'F'
			);
			$this->db->insert('friends',$data);
			return true;
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