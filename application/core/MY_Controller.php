<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->data['title'] = 'CRUD';

		$this->load->model('news_model');
		$this->data['news'] = $this->news_model->getNews();
	}
}