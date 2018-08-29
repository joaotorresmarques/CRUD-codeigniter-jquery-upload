<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function consultar($login=null){
		$this->db->where('usu_email',$login['usu_email']);
		$this->db->where('usu_senha',$login['usu_senha']);
		$data['usuario'] = $this->db->get('usuarios')->result();

		if(count($data['usuario']) ==1):
			return true;
		else:
			return false;
		endif;
	}

	public function getUsuario($email=null){
		$this->db->select('usu_nome');
		$this->db->where('usu_email',$email);
		return $this->db->get('usuarios')->row('usu_nome');
	}

	public function getId($email=null){
		$this->db->select('usu_id');
		$this->db->where('usu_email',$email);
		return $this->db->get('usuarios')->row('usu_id');
	}
}