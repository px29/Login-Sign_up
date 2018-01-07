<?php
class Auth extends CI_Controller
{
	//construct
    public function __construct()
      {

    		parent::__construct();
			$this->load->model('Auth_model');
			$this->load->helper('form');
			$this->load->helper('url');
    		$this->load->library(array('session'));


    	}
		//index
    public function index()
      {
      $this->load->view('login');
      }
      public function homepage()
        {

            $this->load->view('homepage');
        }



		// login
    public function login()
      {
        $action=null;
		if(isset($_SESSION['username']))// check whether logged in already
		{
			if($_SESSION['username']!=null)
			{
				$this->session->set_flashdata("success","you have already logged in");
				redirect("Auth/homepage");
			}

		}

        if(isset($_POST['action']))
        $action = $_POST['action'];

        if($action==null|$action=="Login")// check the button action is "login" of "new user"
        {
        $this->load->library('form_validation');
        if(count($_POST))
        {
          $this->form_validation->set_rules('username','username','required|max_length[20]');
          $this->form_validation->set_rules('password','password','required|min_length[9]|max_length[20]');


         if ($this->form_validation->run()==true)// check input validation
            {
              $username = $_POST['username'];
              $password = $_POST['password'];


              if($this->Auth_model->login($username,$password))// check username&password matching
              {
                 $this->session->set_flashdata("success","successfully logged in");
				 $_SESSION['username']=$username;
                 redirect("Auth/homepage");
              }
              else
              {
				$this->session->set_flashdata("fail","wrong username or password");
                redirect("Auth/login");
              }


            }
        }
        }
        else {
          redirect("Auth/Sign_up");
			 }
      $this->load->view('login');
      }



	  // sign_up
	  public function sign_up()
      {
  		  $this->load->library('form_validation');
      	if(count($_POST))
        {
          $this->form_validation->set_rules('username','username','required|max_length[20]');
          $this->form_validation->set_rules('password','password','required|min_length[9]|max_length[20]');
          $this->form_validation->set_rules('confirm_password','confirm_password','required|min_length[9]|max_length[20]|matches[password]');
          $this->form_validation->set_rules('email','email','required|valid_email');

      	  if ($this->form_validation->run()==true)// check input validation
            {
				if($this->Auth_model->check_duplicate_email($_POST['email']))// check email duplication
				{
					$this->session->set_flashdata("fail","Sorry, this email has been registered");
					redirect("Auth/sign_up");
				}
				else if($this->Auth_model->check_duplicate_username($_POST['username']))// check username duplication
				{
					$this->session->set_flashdata("fail","Sorry, this username has been registered");
					redirect("Auth/sign_up");
				}
				else
				{

                if($this->Auth_model->create_user($_POST['username'],$_POST['email'],$_POST['password']))// create user
				{
                $this->session->set_flashdata("success","successfully signed up");
                $_SESSION['username']=$_POST['username'];
                redirect("Auth/homepage");
				}else
				{
				$this->session->set_flashdata("fail","Sorry, something goes wrong. Please try again");
                redirect("Auth/sign_up");
				}
				}


            }
        }
      $this->load->view('sign_up');


      }

	  //log out
	  public function logout()
      {
       $_SESSION['username']=null;
       redirect("Auth/login");

	  }
}

?>
