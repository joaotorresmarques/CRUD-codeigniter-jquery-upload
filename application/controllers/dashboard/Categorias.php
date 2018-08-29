<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		//Carrega o model M_categorias atribuindo um apelido 'Model_categorias'
		//Escrito dentro de um construtor pois será usado por todos os metodos.
		$this->load->model('m_categorias','Model_categorias');

		//Verifica se a sessão logado esta vazia. Se sim é redirecionado para o login.
		if(empty($this->session->logado)):
			redirect('home/login');
		endif; 

	}

	public function index(){	
		//atribuindo a uma matriz a listagem de todas as categorias por meio do metodo listar()
		$data['resultCategorias'] = $this->Model_categorias->listar();
		//enviando o array para a view
		$this->load->view('back-end/v_categorias',$data);
	}

	public function cadastro(){
		//Se o metodo chamado for post fará a validação do campo segundo definido no set_rules().
		if($this->input->method() == 'post'){
			//Defindindo as regras de validação
			//is_unique[tabela.campo] = valor unico no BD
			$this->form_validation->set_rules('cat_nome','Categoria','required|is_unique[categorias.cat_nome]');
			//confirmação que o usuario digitou informações validas
			if($this->form_validation->run() !== FALSE){
				//Alocando no array as informações enviadas no form de login
				$categoria = array("cat_nome" => $this->input->post('cat_nome'));
				//Se foi realizado o cadastro retornará uma mensagem e redicionará
				if($this->Model_categorias->cadastro($categoria)):
					$this->session->set_flashdata('success','Cadastro realizado!');
					redirect('dashboard/categorias');
				else:
				//Se não foi realizado o cadastro retornará uma mensagem e redicionará
					$this->session->set_flashdata('danger','Ocorreu um erro.');
					redirect('dashboard/categorias');
				endif;

			}else{
				//Caso os dados inseridos no form estejam em desacordo com as regras definidas no
				//set_rules() apresentará o erro na tela.
				//strip_tags() = retirar tags PHP e HTML da mensagem de erro.
				$errors = validation_errors();
				$this->session->set_flashdata('errorform',strip_tags($errors));
				redirect('dashboard/categorias');
				
			}
		}
	}

	public function editar(){
		/*
		*A LISTAGEM DOS DADOS APRESENTADOS NA TELA DE EDIÇÃO É REALIZADO POR MEIO DO ARQUIVO ENCONTRADO EM
		* assets/back/js/proprio.js 
		*/ 

		//Registrando em um array as informações inseridas no form
		$dados = array(
			"cat_id" => $this->input->post('cat_id'),
			"cat_nome" => $this->input->post('cat_nome'));
		//enviando ao metodo editar() o ID e o nome 
		//ID será para encontrar o registro e o nome será atualizado.
		//Logo após mostra uma mensagem e redireciona para o index do controller categorias
		if($this->Model_categorias->editar($dados['cat_id'],$dados)):
			$this->session->set_flashdata('success','Alteração realizada com sucesso!!');
			redirect('dashboard/categorias');
		endif;

	}

	public function excluir($id=null){
		/*
		*O id recebido para exclusão é enviado por meio de javascript. Arquivo encontrado em 
		* views/back-end/modais/excluir_categorias.php
		*/
		
		//Enviando ao metodo excluir o id para exclusão
		if($this->Model_categorias->excluir($id)):
			$this->session->set_flashdata('success','Categoria excluida com sucesso!');
			redirect('dashboard/categorias');
		endif;
	}
	
}
