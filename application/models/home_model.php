<?php  
   class Home_model extends CI_Model  
   {  
		function __construct()  
		{   
			parent::__construct();  
		}  

		public function select($term, $username)
		{
			$this -> db -> select('id, username, email');
			$this -> db -> from('user_info');
			$this->db->where("(username LIKE '%$term' OR username LIKE '%$term%' OR username LIKE '$term%')");
			$this->db->where('username !=', $username);
			$this->db->order_by("username", "asc"); 
			$query = $this->db->get();  
			return $query;
		}
   }