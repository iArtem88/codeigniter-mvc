<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/********************************
 *
 * RU:
 *
 * Контроллер является центром каждого запроса веб приложения.
 * В техническом понимании CodeIgniter, может быть определен как супер объект.
 * Как и любой php класс, он использует $this. Используя $this будут загружаться библиотеки,
 * виды, и обычные команды фреймворка.
 *
 * http://example.com/[controller-class]/[controller-method]/[arguments]
 *
 *
 */
class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index()
    {
        $data['title'] = 'All News';
        $data['news'] = $this->news_model->getNews();

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = null)
    {
        $data['news_item'] = $this->news_model->getNews($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $data['text'] = $data['news_item']['text'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Add article';

        $title = $this->input->post('title');
        $text = $this->input->post('text');

        $this->load->view('templates/header', $data);

        if ($title && $text) {

            if ($this->news_model->addArticle($title, $text)) {

                $this->load->view('news/success', $data);
            }
        }

        $this->load->view('news/create', $data);
        $this->load->view('templates/footer');
    }

    public function edit($slug = null)
    {
        $data['title'] = 'Edit article';

        $data['news_item'] = $this->news_model->getNews($slug);

        if (empty($data['news_item'])) {
            show_404();
        }

        if($slug) {

            $data['title_news'] = $data['news_item']['title'];
            $data['text_news'] = $data['news_item']['text'];
            $data['slug_news'] = $data['news_item']['slug'];

        }

            $title = $this->input->post('title');
            $text = $this->input->post('text');
            $slug = $this->input->post('slug');

            if ($title && $text && $slug) {

                if ($this->news_model->updateArticle($title, $text, $slug)) {

                    header('Location: ' . $_SERVER["HTTP_ORIGIN"]. '/news');
                    exit;

                }
            }

        $this->load->view('templates/header', $data);
        $this->load->view('news/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($slug = null)
    {
        $data['news'] = $this->news_model->getNews($slug); //$data['news_item'] - just for test attentiveness

        if (empty($data['news'])) {
            show_404();
        }

        $data['title'] = 'Remove article';
        $data['result'] = 'Remove error' . $data['news']['title'];

        if($this->news_model->deleteArticle($slug)) {
            $data['result'] = $data['news']['title'] . ' removed succesfully';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('news/delete', $data);
        $this->load->view('templates/footer');
    }
}