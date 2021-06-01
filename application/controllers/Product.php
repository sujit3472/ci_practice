<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	public $product;

	function __construct()
	{
		parent::__construct();	
		##load the model and other helping library and helper
		$this->load->model('product_model');
		$this->load->helper(array('url', 'application_helper'));
		$this->load->library(array("pagination", 'session', 'form_validation'));

		$this->product = new Product_model;

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
		$config["base_url"]    = base_url() . "product";
		$config["total_rows"]  = $this->product_model->get_count();
		$config["per_page"]    = 10;
		$config["uri_segment"] = 2;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['product'] = $this->product_model->get_product($config["per_page"], $page);

		$this->load->view('product/index', $data);
	}

	/**
	* Function create
	* Use for create the view for adding the product
	*/
	public function create()
	{
		$arrCategory = $this->product_model->get_category_list();
		$data['arrCategory'] = $arrCategory;
		$this->load->view('product/create', $data);
	}

	/**
	* Function store
	* Use for the store the record into the database table
	* @param int $id
	* @return array $item
	*/
	public function store()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('category_id', 'category_id', 'required');
		
		if ($this->form_validation->run() == FALSE) {
		    $this->session->set_flashdata('errors', validation_errors());
		    redirect(base_url('product/create'));
		} else {
		    $this->product->insert_product();
		    $this->session->set_flashdata('success', 'Product Added successfully.');
		    redirect(base_url('product'));
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
		$item = $this->product->find_product($id);
		if(empty($item))
		    redirect(base_url('product'));
		$item = $item[0];
		$this->load->view('product/show',array('item'=>$item));
	}

	/**
	* Function edit
	* Use for the edit the record 
	* @param int $id
	* @return array $item
	*/
	public function edit($id)
	{
		$item = $this->product->find_product($id);
		if(empty($item))
		    redirect(base_url('product'));
		
		$item = $item[0];

		$arrCategory = $this->product_model->get_category_list();
		$data['arrCategory'] = $arrCategory;
		$this->load->view('product/edit',array('item'=>$item, 'arrCategory' => $arrCategory));
	}

	/**
	* Function update
	* Use for the update the record 
	* @param int $id
	* @return result
	*/
	public function update($id)
	{
		$item = $this->product->find_product($id);
		if(empty($item[0]))
		    redirect(base_url('product'));

		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE){
		    $this->session->set_flashdata('errors', validation_errors());
		    redirect(base_url('product/edit/'.$id));
		} else { 
		    $this->product->update_product($id);
		    $this->session->set_flashdata('success', 'Product updated successfully.');
		    redirect(base_url('product'));
		}
	}

	/**
	* Delete Data from this method.
	*
	* @return Response
	*/
	public function delete($id)
	{
		$item = $this->product->find_product($id);
		if(empty($item[0]))
		    redirect(base_url('product'));
	    
	    $item = $this->product->delete_product($id);
	    $this->session->set_flashdata('success', 'Product deleted successfully.');
	    redirect(base_url('product'));
	}
}
?>