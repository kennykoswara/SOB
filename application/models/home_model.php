<?php  
   class Home_model extends CI_Model  
   {  
		function __construct()  
		{   
			parent::__construct();  
		}  

		public function select($term, $id)
		{
			$this -> db -> select('id, username, email');
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
			$query = $this->db->get();  
			return $query;  
		}
		public function post_select($id)  
		{  
			$this -> db -> select('name, lat, lng, type, request, description, status, post_time,id_user');
			$this -> db -> from('markers');
			$this->db->order_by("post_time", "desc"); 
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
   }