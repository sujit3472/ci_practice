<?php 

class User_model extends CI_Model
{
	protected $table = 'users';
	function __construct()
	{
		parent::__construct();	
		$this->load->library('email');
	}

	/**
	* Function register_user
	* Use for the register the new user
	*/
	public function register_user()
	{
		$date = new DateTime;
		$date = $date->format('Y-m-d H:i:s');
		$hash = password_hash ($this->input->post('password'), PASSWORD_DEFAULT);
		$data = array(
		    'name' 	   => $this->input->post('name'),
		    'email'    => $this->input->post('email'),
		    'password' => $hash,
		    'created_at' => $date,
		    'updated_at' => $date,
		);
		$this->load->library('email');
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.mailtrap.io',
		  'smtp_port' => 2525,
		  'smtp_user' => '1b778d3ecf74f2',
		  'smtp_pass' => '468a32c604604b',
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		);
		// print_r($config);die;
		$this->email->initialize($config);
		
		$this->email->from('admin123@yopmail.com', 'Test User');
		$this->email->to($this->input->post('email'));
		
		$this->email->subject('Code Igniter | Registration');
		$body = $this->load->view('emails/test-email.php',$data,TRUE);

		$this->email->message($body); 
		// $this->email->message('Thank You for the registration');

		$this->email->send();
		return $this->db->insert($this->table, $data);
	}

	public function login()
	{
		$password = $this->input->post('password');
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get($this->table);
		$result = $query->row_array(); // get the row first
		if (!empty($result) && password_verify($password, $result['password'])) {
			$this->session->set_userdata('logged_in', true);
			$this->session->set_userdata('userId', $result['id']);
			$this->session->set_userdata('name', $result['name']);
	    	return $result;
	   	} else {
	       return 0;
	   	}
	}
}
?>