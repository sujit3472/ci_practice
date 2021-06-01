<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public $user;

	function __construct()
	{
		parent::__construct();	
		##load the model and other helping library and helper
		$this->load->model('user_model');
		$this->load->helper(array('url'));
		$this->load->library(array('session', 'form_validation'));

		$this->user = new User_model;
	}

	/**
	* Function index
	* Use for the display the list of records on screen
	* @return array $data
	*/
	public function index()
	{
		$this->load->view('login/login');
	}

	public function userLogin()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
			
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
		    redirect(base_url('login'));
		} else {
			$result = $this->user->login();
			if($result == 0) {
				$this->session->set_flashdata('errors', 'Invalid login  details');
				redirect(base_url('login'));
			}
			
		    $this->session->set_flashdata('success', 'You have successfully login');
		    redirect(base_url('category'));
		}
	}

	public function logout() {
        //unset the logged_in session and redirect to login page
        $this->session->unset_userdata('logged_in');
        redirect(base_url().'login');
    }
}
?>