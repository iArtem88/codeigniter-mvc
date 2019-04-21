<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages_model');
    }

    public function view($page = 'home') //slug
    {
        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
            // RU: Упс, у нас нет такой страницы!
            show_404();
        }

        $data['page'] = $this->pages_model->getPage($page);

        $data['title'] = ucfirst($data['page']['title']); // Capitalize the first letter
        $data['content'] = ucfirst($data['page']['content']); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

}