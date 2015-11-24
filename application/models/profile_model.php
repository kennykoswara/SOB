<?php  
   class Profile_model extends CI_Model  
   {  
		function __construct()  
		{   
			parent::__construct();  
		}  

		public function post_select($username)  
		{  
			$this -> db -> select('name, lat, lng, type, request, description, status, post_time');
			$this -> db -> from('markers');
			$this -> db -> where('name', $username);
			$this->db->order_by("post_time", "desc"); 
			$query = $this->db->get();  
			return $query;  
		}  
   }