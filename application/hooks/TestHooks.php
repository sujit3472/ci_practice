<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class TestHooks 
{
	private $CI;
	function __construct()
	{
		$this->CI =& get_instance();
		if(!isset($this->CI->session)){  //Check if session lib is loaded or not
			$this->CI->load->library('session'); 
			$this->CI->load->helper('url'); //If not loaded, then load it here
		}
	}

	function loginCheck()
	{

	    $session_userdata = $this->CI->session->userdata('logged_in');
	    $route = $this->CI->router->fetch_class();
	    
	    if( ($route !== 'login') && empty($session_userdata) ) {
	    	if($route == 'register') {
	    		// print_r(base_url() . 'register');die;
	    		// redirect(base_url() . 'register');	
	    	} else {
            	redirect(base_url() . 'login');
			}
            
        } 
    }
}

?>