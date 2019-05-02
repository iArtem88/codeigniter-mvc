<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->data['title'] = 'iCRUD';

		$this->load->model('films_model');
		$this->data['movies'] = $this->films_model->getFilms(false, 2, 2);

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/index');
		$this->load->view('templates/footer', $this->data);
	}

}