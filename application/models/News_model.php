<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();

    }

    public function getNews($slug = false)
    {
        if ($slug === false) {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        /*
         * RU:
         *
         * Класс конструктора запросов (Query Builder)
         * http://codeigniter3.info/guide/database/query_builder
         *
         * Выборка данных
         * Поиск конкретных данных
         * Поиск одинаковых данных
         * Упорядочивание результатов
         * Ограничение или подсчет результатов
         * Группирование запроса
         * Вставка данных
         * Обновление данных
         * Удаление данных
         * Метод цепочек
         * Кеширование конструктора запросов
         * Сброс настроек конструктора запросов
         * Справка класса
         *
         */

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function addArticle($title, $text)
    {
        $slug = str_replace(' ', '-', $title);

        $data = array(
            'title' => $title,
            'text' => $text,
            'slug' => $slug,
        );

        return $this->db->insert('news', $data);
    }

    public function updateArticle($title, $text, $slug)
    {

        $data = array(
            'title' => $title,
            'text' => $text,
            'slug' => $slug
        );

        return $this->db->update('news', $data, array('slug' => $slug));
    }

    public function deleteArticle($slug)
    {
        return $this->db->delete('news', array('slug' => $slug));
    }
}