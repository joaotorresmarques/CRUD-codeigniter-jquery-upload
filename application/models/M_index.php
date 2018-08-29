<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_index extends CI_Model {

	public function getVideos(){
		$query = $this->db->get('videos');
		return $query->num_rows();
	}

	public function getCategorias(){
		$query = $this->db->get('categorias');
		return $query->num_rows();
	}

	public function getUsuarios(){
		$query = $this->db->get('usuarios');
		return $query->num_rows();
	}
	
}

