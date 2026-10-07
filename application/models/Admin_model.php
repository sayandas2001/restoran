<?php
class Admin_model extends CI_Model
{
    function __construct() 
	{
		parent::__construct();
		//$this->load->database();		
	}

	public function check_valid_login($login_email,$login_password){
		$this->db->from('admin');
		$this->db->where('email',$login_email);
		$this->db->where('password',$login_password);
		$query=$this->db->get();

		if($query->num_rows()==0)
		{
			return FALSE;
		}
		else{
			return $query->row()->id;
		}
	}

	public function getadmindetails($id){
		$this->db->from('admin');
		$this->db->where('id',$id);
		$result=$this->db->get();
		return $result->row();
	}
	
}
?>