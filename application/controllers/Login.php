<?php
class Login extends CI_Controller 
{
	
	public function index()
	{
		//echo "test";
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
		$this->load->helper('form');
		$this->load->view('public/admin_login');
		
	}
	public function admin_login()
	{
		//echo "Reached Admin Login Function";
		
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('username','User Name','required|alpha|trim');
		//$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('admin_login'))
		{   $username = $this->input->post('username');
	        $password = $this->input->post('password');
			//echo "username:$username and password:$password";
			//echo "Validation Successful";
			$this->load->model('loginmodel');
			$login_id = $this->loginmodel->login_valid($username,$password);

	if($login_id){
                  //$this->load->library('session');
				$this->session->set_userdata('user_id',$login_id);
				//$this->load->view('admin/dashboard');
				return redirect('admin/dashboard');
               // echo	"Password Match.";
			     }
         else
		    {
				//echo"Password Do Not Match";
				$this->session->set_flashdata('login_failed','Invalid Username/password.'); 
				return redirect('login');
			}
		}
		else{
			 //echo "Validation Failed";
			 $this->load->view('public/admin_login');		
			 //echo validation_errors();
		    }
		
	}
	public function logout()
	{
		 $this->session->unset_userdata('user_id');
		 return redirect('login');
	}
}

?>