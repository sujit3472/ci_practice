<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ItemCRUD extends CI_Controller 
{
    public $itemCRUD;

    /**
    * Get All Data from this method.
    *
    * @return Response
    */
    public function __construct() {
        parent::__construct(); 

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('ItemCRUDModel');
        $this->load->library("pagination");

        $this->itemCRUD = new ItemCRUDModel;
    }


    /**
    * Display Data this method.
    *
    * @return Response
    */
    public function index()
    {

        $config = array();
        $config["base_url"]    = base_url() . "itemCRUD";
        $config["total_rows"]  = $this->itemCRUD->get_count();
        $config["per_page"]    = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['authors'] = $this->itemCRUD->get_authors($config["per_page"], $page);


        $this->load->view('theme/header');       
        $this->load->view('theme/list', $data);
        $this->load->view('theme/footer');
    }


    /**
    * Show Details this method.
    *
    * @return Response
    */
    public function show($id)
    {
        $item = $this->itemCRUD->find_item($id);
        if(empty($item))
            redirect(base_url('itemCRUD'));
        $this->load->view('theme/header');
        $this->load->view('theme/show',array('item'=>$item));
        $this->load->view('theme/footer');
    }


    /**
    * Create from display on this method.
    *
    * @return Response
    */
    public function create()
    {
        $this->load->view('theme/header');
        $this->load->view('theme/create');
        $this->load->view('theme/footer');   
    }


    /**
    * Store Data from this method.
    *
    * @return Response
    */
    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('itemCRUD/create'));
        } else {
            $this->itemCRUD->insert_item();
            redirect(base_url('itemCRUD'));
        }
    }


    /**
    * Edit Data from this method.
    *
    * @return Response
    */
    public function edit($id)
    {
        $item = $this->itemCRUD->find_item($id);
        if(empty($item))
            redirect(base_url('itemCRUD'));

        $this->load->view('theme/header');
        $this->load->view('theme/edit',array('item'=>$item));
        $this->load->view('theme/footer');
    }


    /**
    * Update Data from this method.
    *
    * @return Response
    */
    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('itemCRUD/edit/'.$id));
        } else { 
            $this->itemCRUD->update_item($id);
            redirect(base_url('itemCRUD'));
        }
    }


    /**
    * Delete Data from this method.
    *
    * @return Response
    */
    public function delete($id)
    {
        $item = $this->itemCRUD->delete_item($id);
        redirect(base_url('itemCRUD'));
    }
}