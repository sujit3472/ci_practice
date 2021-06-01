<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
	public $category;

	function __construct()
	{
		parent::__construct();	
		##load the model and other helping library and helper
		$this->load->model('category_model');
		$this->load->helper( array('url', 'application_helper'));
		$this->load->library(array("pagination", 'session', 'form_validation'));

		$this->category = new Category_model;
		/*$logged_in = $this->session->userdata('logged_in');
        if (!$logged_in) {
            redirect(base_url() . 'login');
        }*/
	}

	/**
	* Function index
	* Use for the display the list of records on screen
	* @return array $data
	*/
	public function index()
	{
		$config = array();
		$config["base_url"]    = base_url() . "category";
		$config["total_rows"]  = $this->category_model->get_count();
		$config["per_page"]    = 10;
		$config["uri_segment"] = 2;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['category'] = $this->category_model->get_category($config["per_page"], $page);

		$this->load->view('category/index', $data);
	}

	/**
	* Function create
	* Use for create the view for adding the category
	*/
	public function create()
	{
		$this->load->view('category/create');
	}

	/**
	* Function store
	* Use for the store the record into the database table
	* @param int $id
	* @return array $item
	*/
	public function store()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[category.name]');
		// $this->form_validation->set_rules('category_image', 'Category Image', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			// print_r(validation_errors());die;
		    $this->session->set_flashdata('errors', validation_errors());
		    redirect(base_url('category/create'));
		} else {
			// print_r($_REQUEST);die;
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('category_image'))
            {
                $error = array('error' => $this->upload->display_errors());
                $_POST['file_name'] = '';
                /*$this->session->set_flashdata('errors', $error['error']);
                redirect(base_url('category/create'));*/
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $_POST['file_name'] = $data['upload_data']['file_name'];
            }
		    $this->category->insert_item();
		    $this->session->set_flashdata('success', 'Category Added successfully.');
		    redirect(base_url('category'));
		}
	}

	/**
	* Function show
	* Use for the show the record details
	* @param int $id
	* @return array $item
	*/
	public function show($id)
	{
		$item = $this->category->find_item($id);
		if(empty($item))
		    redirect(base_url('category'));
		
		$this->load->view('category/show',array('item'=>$item));
	}

	/**
	* Function edit
	* Use for the edit the record 
	* @param int $id
	* @return array $item
	*/
	public function edit($id)
	{
		$item = $this->category->find_item($id);
		if(empty($item))
		    redirect(base_url('category'));
		
		$this->load->view('category/edit',array('item'=>$item));
	}

	/**
	* Function update
	* Use for the update the record 
	* @param int $id
	* @return result
	*/
	public function update($id)
	{
		$item = $this->category->find_item($id);
		if(empty($item))
		    redirect(base_url('category'));

		$this->form_validation->set_rules('name', 'Name', 'required|is_unique[category.name.$id]');
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('errors', validation_errors());
		    redirect(base_url('category/edit/'.$id));
		} else { 
		    $this->category->update_item($id);
		    $this->session->set_flashdata('success', 'Category updated successfully.');
		    redirect(base_url('category'));
		}
	}

	/**
	* Delete Data from this method.
	*
	* @return Response
	*/
	public function delete($id)
	{
		$item = $this->category->find_item($id);
		if(empty($item))
		    redirect(base_url('category'));
	    
	    $item = $this->category->delete_item($id);
	    $this->session->set_flashdata('success', 'Category deleted successfully.');
	    redirect(base_url('category'));
	}
}
?>