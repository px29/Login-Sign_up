<?php
class Auth extends CI_Controller
{
    public function __construct()
      {

    		parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    		$this->load->library(array('session'));
    		$this->load->database();


    	}
    public function index()
      {
      $this->load->view('login');
      }
      public function homepage()
        {
            $this->load->view('homepage');
        }
    public function login()
      {
        $action=null;
        if(isset($_POST['action']))
        $action = $_POST['action'];

        if($action==null|$action=="Login")
        {
        $this->load->library('form_validation');
        if(count($_POST))
        {
          $this->form_validation->set_rules('username','username','required');
          $this->form_validation->set_rules('password','password','required|min_length[9]|max_length[20]');


          if ($this->form_validation->run()==true)
            {
              $username = $_POST['username'];
              $password = $_POST['password'];

              $this->db->select('*');
              $this->db->from('user');
              $this->db->where('user_name', $username);
              $this->db->where('password', $password);
              $query=$this->db->get();
              if($query->num_rows() == 0)
              {
                $this->session->set_flashdata("fail","wrong username or password");
                redirect("Auth/login");
              }
              else
              {
                $this->session->set_flashdata("success","successfully logged in");
                $_SESSION['username']=$username;
                redirect("Auth/homepage");
              }


            }
        }
        }
        else {
          redirect("Auth/Sign_up");
        }
      $this->load->view('login');
      }
	  public function sign_up()
      {
  		  $this->load->library('form_validation');
      	if(count($_POST))
        {
          $this->form_validation->set_rules('username','username','required');
          $this->form_validation->set_rules('password','password','required|min_length[9]|max_length[20]');
          $this->form_validation->set_rules('confirm_password','confirm_password','required|min_length[9]|max_length[20]|matches[password]');
          $this->form_validation->set_rules('email','email','required');

      	  if ($this->form_validation->run()==true)
            {

                $data= array(
                  'user_name'=>$_POST['username'],
                  'email'=>$_POST['email'],
                  'password'=>$_POST['password']

                );
                $this->db->insert('user',$data);
                $this->session->set_flashdata("success","successful signed up");
                $_SESSION['username']=$_POST['username'];
                redirect("Auth/homepage");
            }
        }
      $this->load->view('sign_up');


      }
}

?>
