<?php

class Auth_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function login($username,$password)
	{
			  
			  $this->db->select('password');
              $this->db->from('user');
              $this->db->where('user_name', $username);
              $hash=$this->db->get()->row('password');
              return $this->password_match($password,$hash);
	}
	public function check_duplicate_email($email)
	{
		$this->db->select('*');
              $this->db->from('user');
              $this->db->where('email', $email);
			  $query=$this->db->get();
			  if($query->num_rows() == 0)
              {
				  return false;
			  }else return true;
	}
		

	public function check_duplicate_username($username)
	{
			  $this->db->select('*');
              $this->db->from('user');
              $this->db->where('user_name', $username);
			  $query=$this->db->get();
			  if($query->num_rows() == 0)
              {
				  return false;
			  }else return true;
	}
	public function create_user($username,$email,$password)
	{
			  $data= array(
                  'user_name'=>$username,
                  'email'=>$email,
                  'password'=>$this->hash_password($password)

                );
			  return $this->db->insert('user',$data);
				
	}
		private function hash_password($password)
	{
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
		private function password_match($password,$hash) 
	{
		
		return password_verify($password, $hash);
		
	}
	
}