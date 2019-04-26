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
class News extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index()
    {
        $this->data['title'] = 'All News';
        $this->data['all_news'] = $this->news_model->getNews();

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function view($slug = null)
    {
        $this->data['news_item'] = $this->news_model->getNews($slug);

        if (empty($this->data['news_item'])) {
            show_404();
        }

        $this->data['title'] = $this->data['news_item']['title'];
        $this->data['text'] = $this->data['news_item']['text'];

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/view', $this->data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->data['title'] = 'Add article';

        $title = $this->input->post('title');
        $text = $this->input->post('text');

        $this->load->view('templates/header', $this->data);

        if ($title && $text) {

            if ($this->news_model->addArticle($title, $text)) {

                $this->load->view('news/success', $this->data);
            }
        }

        $this->load->view('news/create', $this->data);
        $this->load->view('templates/footer');
    }

    public function edit($slug = null)
    {
        $this->data['title'] = 'Edit article';

        $this->data['news_item'] = $this->news_model->getNews($slug);

        if (empty($this->data['news_item'])) {
            show_404();
        }

        if($slug) {

            $this->data['title_news'] = $this->data['news_item']['title'];
            $this->data['text_news'] = $this->data['news_item']['text'];
            $this->data['slug_news'] = $this->data['news_item']['slug'];

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

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/edit', $this->data);
        $this->load->view('templates/footer');
    }

    public function delete($slug = null)
    {
        $this->data['news_deleted'] = $this->news_model->getNews($slug); //$this->data['news_item'] - just for test attentiveness

        if (empty($this->data['news_deleted'])) {
            show_404();
        }

        $this->data['title'] = 'Remove article';
        $this->data['result'] = 'Remove error' . $this->data['news_deleted']['title'];

        if($this->news_model->deleteArticle($slug)) {
            $this->data['result'] = $this->data['news_deleted']['title'] . ' removed succesfully';
        }

        $this->load->view('templates/header', $this->data);
        $this->load->view('news/delete', $this->data);
        $this->load->view('templates/footer');
    }
}