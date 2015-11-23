<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class askhelp_model extends CI_Model {
	public function __construct()
	{
	parent::__construct();
	}
	function select_markers()
	{
		$this->db->select("*");
		$this->db->from("markers");
		$query = $this->db->get();        
		return $query;
	}
}