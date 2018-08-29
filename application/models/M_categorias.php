<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_categorias extends CI_Model {
	
	public function __construct(){
		parent:: __construct();
	}

	public function listar(){	
		$this->db->order_by('cat_nome', 'asc');
		$query = $this->db->get('categorias');
		return $query->result();
	}

	public function cadastro($categoria){
		return $this->db->insert('categorias',$categoria);
	}

	public function editar($id=null, $dados){
		$this->db->where('cat_id',$id);
		return $this->db->update('categorias',$dados);
	}

	public function excluir($id=null){
		$this->db->where('cat_id',$id);
		return $this->db->delete('categorias');
	}
}
