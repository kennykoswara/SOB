<?php  
   class Mission_model extends CI_Model  
   {  
		function __construct()  
		{   
			parent::__construct();  
		}  

		public function mission_select($id)  
		{  
			$this -> db -> select('mission.id_requestor, mission.id_marker, mission.accept_date, mission.request_stat, user_info.picture, markers.name, markers.address, markers.type, markers.request, markers.description');
			$this -> db -> from('mission');
			$this->db->join('user_info', 'mission.id_requestor = user_info.id');
			$this->db->join('markers', 'mission.id_marker = markers.id');
			$this -> db -> where('mission.id_acceptor', $id);
			$this->db->order_by("mission.accept_date", "desc"); 
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
		public function update_status($id_user, $id_marker, $new_status)
		{
			$data = array(
               'request_stat'=>$new_status
            );
			$this->db->where('id_acceptor', $id_user);
			$this->db->where('id_marker', $id_marker);
			$this->db->update('mission', $data);
		}
   }