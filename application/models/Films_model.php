<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Films_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function getFilms( $slug = false, $limit, $type ) {
		if($slug === false) {
			$query = $this->db
				->where('category_id', $type)
				->order_by('title', 'desc')
				->limit($limit)
				->get('films');

			return $query->result_array();
		}

		$query = $this->db->get_where('films', array('slug' => $slug));
		return $query->row_array();
	}

	public function getFilmsByRating( $limit ) {

		$query = $this->db
			->order_by('rating', 'asc')
			->where('category_id', 1)
			->where('rating >', 0)
			->limit( $limit )
			->get('films');

		return $query->result_array();
	}
}