<?php

class Article extends CI_Controller {

	/*
	* Default method
	*/
	public function index()
	{
		$this->load->model('Article_model');
		$this->load->library('form_validation');
		$this->load->library('hello');
		//$this->load->library(array('form_validation', 'email', 'pagination')); // we can use multiple library using this line

		//load the helpers
		$this->load->helper('text');
		echo $this->hello->test();
		$this->load->helper('application_helper');
		
		test_method();

		$this->load->library('email');
		$this->email->mytest();
		$articles = $this->Article_model->articles();
		$data['articles'] = $articles;
		// print_r($articles);
		

		/*$arrData['name'] = "stark";
		$arrData['email'] = "test@yopmail.com";
		$arrData['new_array'] = ['test1', 'test2', 'test3'];

		$arrArticles = $this->Article_model->articles();
		$arrData['arrArticles'] = $arrArticles;
		$arrUsers = $this->Article_model->example();
		$arrData['arrUsers'] = $arrUsers;
		$this->load->view('test/sample', $arrData);*/
		$this->load->view('articles', $data);
	}

	/*
	* Default method
	*/
	public function test()
	{
		echo "Hello test";
	}
}
