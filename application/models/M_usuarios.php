<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuarios extends CI_Model {
	public function __construct(){
		parent:: __construct();
	}
	public function listar(){	
		$this->db->order_by('usu_id', 'asc');
		$query = $this->db->get('usuarios');
		return $query->result();
	}

	public function cadastro($usuario){
		return $this->db->insert('usuarios',$usuario);
	}

	public function editar($id=null, $dados){
		$this->db->where('usu_id',$id);
		return $this->db->update('usuarios',$dados);
	}

	public function excluir($id=null){
		$this->db->where('usu_id',$id);
		return $this->db->delete('usuarios');
	}

	//CONFIRMAR SENHA ATUAL PARA ALTERA-LA
	public function confirmar_senha($senhaAtual =null, $idSession=null){
		$this->db->where('usu_id',$idSession);
		$query = $this->db->get('usuarios')->row();
		if($query->usu_senha == $senhaAtual){
			return true;
		}else{
			return false;
		}
		
	}
	//ALTERAR SENHA
	public function alterar_senha($novaSenha=null, $idSession=null){
		$this->db->where('usu_id',$idSession);
		$dados = array('usu_senha' => $novaSenha);
		$this->db->update('usuarios',$dados);
	}
}
