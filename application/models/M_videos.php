<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_videos extends CI_Model {

	public function cadastro($dados){
		return $this->db->insert('videos',$dados);
	}

	public function getAll(){
		$this->db->order_by('vid_data','desc');
		$query = $this->db->get('videos');
		return $query->result();
	}

	public function resultAutores(){
		//JOIN NECESSARIO PARA VERIFICAR QUAL USUARIO ESTA VINCULADO NA COLUNA AUTOR DA TABELA VIDEOS
		$this->db->select('
			usuarios.usu_id as idusuario, usuarios.usu_nome,
			videos.vid_id as idvideos,
			videos.vid_titulo,videos.vid_descricao,videos.vid_data,videos.vid_autor,videos.vid_video');
		$this->db->from('videos');
		$this->db->join('usuarios','usuarios.usu_id = videos.vid_autor ');
		$this->db->order_by('vid_data','desc');
		return $this->db->get()->result();
	}

	public function excluir($id=null){
		$this->db->where('vid_id',$id);
		return $this->db->delete('videos');
	}

	public function editar($id=null){
		$this->db->where('vid_id',$id);
		return $this->db->get('videos')->result();
	}

	public function editar_salvar($id=null,$data){
		$this->db->where('vid_id',$id);
		return $this->db->update('videos',$data);

	}
	
}

