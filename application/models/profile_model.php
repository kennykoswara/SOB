<?php  
   class Profile_model extends CI_Model  
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
			$this -> db -> select('picture');
			$this -> db -> from('user_info');
			$this -> db -> where('id', $id);
			$query = $this->db->get();  
			return $query;  
		} 
   }