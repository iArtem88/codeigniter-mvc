<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPage($slug = false)
    {
        if ($slug) {
            $query = $this->db->get_where('pages', array('slug' => $slug));
            return $query->row_array();
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
    }
}