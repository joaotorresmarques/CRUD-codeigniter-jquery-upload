<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		//Carrega o model M_usuarios atribuindo um apelido 'Model_usuarios' 
		//Escrito dentro de um construtor pois será usado por todos os metodos.
		$this->load->model('m_usuarios','Model_usuarios');

		//Verifica se a sessão logado esta vazia. Se sim é redirecionado para o login.
		if(empty($this->session->logado)):
			redirect('home/login');
		endif; 
	}

	public function index(){
		//Carrega o nome da pagina logo acima do conteudo na view.	
		$data['titulo'] = 'Usuarios';
		//atribuindo a uma matriz a listagem de todos os usuarios por meio do metodo listar()
		$data['resultUsuarios'] = $this->Model_usuarios->listar();
		//enviando o array para a view
		$this->load->view('back-end/v_usuarios',$data);
	}

	public function cadastro(){
		//Se o metodo chamado for post fará a validação do campo segundo definido no set_rules().
		if($this->input->method() == 'post'){
			$validacao = array(
				array(
					'field' => 'usu_email',
					'label' => 'Email',
					'rules' => 'required|is_unique[usuarios.usu_email]'
				),

				array(
					'field' => 'usu_nome',
					'label' => 'Nome',
					'rules' => 'required'
				)
			);
			//Definido as regras por meio da variavel $validacao. Enviado a set_rules() para validar
			$this->form_validation->set_rules($validacao);
			//confirmação que o usuario digitou informações validas
			if($this->form_validation->run() !== FALSE):
				//Alocando no array as informações enviadas no form 
				$usuario = array(
					"usu_email" => $this->input->post('usu_email'),
					"usu_nome" => $this->input->post('usu_nome'),
					"usu_senha" => $this->input->post('usu_senha')
				);
				//Se foi realizado o cadastro retornará uma mensagem e redicionará
				if($this->Model_usuarios->cadastro($usuario)):
					$this->session->set_flashdata('success','Cadastro realizado!');
					redirect('dashboard/usuarios');
				else:
					//Se não foi realizado o cadastro retornará uma mensagem e redicionará
					$this->session->set_flashdata('danger','Ocorreu um erro.');
					redirect('dashboard/usuarios');
				endif;

			else:
				//Caso os dados inseridos no form estejam em desacordo com as regras definidas no
				//set_rules(), apresentará o erro na tela.
				//strip_tags() = retirar tags PHP e HTML da mensagem de erro.
				$errors = validation_errors();
				$this->session->set_flashdata('errorform',strip_tags($errors));
				redirect('dashboard/usuarios');
			endif;
		}
	}

	public function editar(){
		/*
		*A LISTAGEM DOS DADOS APRESENTADOS NA TELA DE EDIÇÃO É REALIZADO POR MEIO DO ARQUIVO ENCONTRADO EM
		* assets/back/js/proprio.js 
		*/ 

		//Registrando em um array as informações inseridas no form
		$dados = array(
			"usu_id" => $this->input->post('usu_id'),
			"usu_nome" => $this->input->post('usu_nome'),
			"usu_email" => $this->input->post('usu_email')
		);
		//enviando ao metodo editar() o ID e os dados para edição e redicionará para index do controller usuarios. 
		if($this->Model_usuarios->editar($dados['usu_id'],$dados)):
			$this->session->set_flashdata('success','Alteração realizada com sucesso!!');
			redirect('dashboard/usuarios');
		else:
			//Se não foi alterado mostra mensagem de erro e rediciona o usuario.
			$this->session->set_flashdata('danger','Ocorreu um erro.');
			redirect('dashboard/usuarios');
		endif;

	}

	public function excluir($id=null){
		/*
		*O id recebido para exclusão é enviado por meio de javascript. Arquivo encontrado em 
		* views/back-end/modais/usuarios/modal_excluir.php
		*/
		
		//Enviando ao metodo excluir o id para exclusão
		if($this->Model_usuarios->excluir($id)):
			$this->session->set_flashdata('success','Usuario excluido com sucesso!');
			redirect('dashboard/usuarios');
		endif;
	}

	public function senha(){
		//registrando o id da sessão
		$idSession = $this->session->id;
		//registrando os dados enviados no form
		$senhaAtual = $this->input->post('senhaatual');
		$novaSenha = $this->input->post('novasenha');
		$novaSenha_confirmar = $this->input->post('novasenha_confirmar');

		//Verifica se a senhaAtual digitada é a mesma cadastrada no BD
		//Se sim altera a senha conforme a variavel novaSenha.
		if($this->Model_usuarios->confirmar_senha($senhaAtual,$idSession)){
			$this->Model_usuarios->alterar_senha($novaSenha,$idSession);
			$this->session->set_flashdata("success","Senha alterada com sucesso!");
			redirect('dashboard/usuarios'); 
		}else{
			//Se a senhaAtual digitada estiver incorreta apresenta mensagem de erro e redireciona
			$this->session->set_flashdata("danger","Senha atual invalida");
			redirect('dashboard/usuarios');
		
		}

	}


}
