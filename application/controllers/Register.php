<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
	public $user;

	function __construct()
	{
		parent::__construct();	
		##load the model and other helping library and helper
		$this->load->model('user_model');
		$this->load->helper(array('url'));
		$this->load->library(array('session', 'form_validation', 'email'));

		$this->user = new User_model;
	}

	/**
	* Function index
	* Use for the display the list of records on screen
	* @return array $data
	*/
	public function index()
	{
		$this->load->view('register/create');
	}

	public function userRegister()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
		    redirect(base_url('register'));
		} else {
		   	$this->user->register_user();
		    $this->session->set_flashdata('success', 'You have successfully registered. Please login');
		    redirect(base_url('register'));
		}
	}
}
?>