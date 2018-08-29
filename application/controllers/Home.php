<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		//Verifica se existe sessão ativa. Senão é redirecionado para o login
		$this->verificar_sessao();
		
		//Carrega a model index
		$this->load->model('m_index', 'Model_index');
		//Passa a contagem de Videos,Categorias e Usuarios no array para mostrar no index
		$index = array(
			'numVideos' => $this->Model_index->getVideos(),
			'numCategorias' => $this->Model_index->getCategorias(),
			'numUsuarios' => $this->Model_index->getUsuarios());
		//Carragamento da pagina index enviando o array acima
		$this->load->view('back-end/index',$index);
	}

	public function login(){
		//Chama a view login
		$this->load->view('back-end/login');
	}

	public function logar(){
		//Carrega o modelo Login dando-lhe um apelido 'Model_login'
		$this->load->model('m_login','Model_login');
		//Se o metodo chamado for post fará a validação dos campos segundo definido no set_rules().
		if($this->input->method() == 'post'){
			$this->form_validation->set_rules('usu_email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('usu_senha','Senha', 'required');
			//confirmação que o usuario digitou informações validas
			if($this->form_validation->run() !== FALSE){
				//Alocando no array as informações enviadas no form de login
				$login = array(
					'usu_email' => $this->input->post('usu_email'),
					'usu_senha' => $this->input->post('usu_senha')
				);
				//Atribuindo a uma variavel o retorno do MODEL de consulta
				$usuario = $this->Model_login->consultar($login);

				//Verifica o status da validação do formulario
				//Se o Login/Senha estiverem corretos então será registrado em uma session 
				if($usuario){ 
					$nome_usuario 	= $this->Model_login->getUsuario($login['usu_email']); 
					$id_usuario 	= $this->Model_login->getId($login['usu_email']); 

					//Motivos para guardar Nome-ID-Logado na session:
					//NOME: mostrará no menu-top seu nome 
					//ID: Servirá para alterar a senha em um modal
					//LOGADO: Confirmação que está ativo
					$dados = array(
						"nome" => (string)$nome_usuario,
						"id" =>	  (int)$id_usuario,
						"logado" => (bool)true
					);
					//Registrando os dados acima na sessão e redirecionando para a index
					$this->session->set_userdata($dados); 
					redirect('home/index');
				}else{
					//Caso LOGIN/SENHA estejam incorretos 
					//Redicionará para login e aparesentará mensagem de erro
					$this->session->set_flashdata("danger","Login/Senha incorreto!");
					redirect('home/login');
				}
			}else{
				//Caso os dados inseridos no form de login estejam em desacordo com as regras definidas no
				//set_rules() apresentará o erro na tela.
				//strip_tags() = retirar tags PHP e HTML da mensagem de erro.
				$errors = validation_errors();
				$this->session->set_flashdata("danger",strip_tags($errors));
				redirect('home/login');
			}
		}
	}

	public function logout(){
		//Destruir a sessão ativa e redicionará para a tela de login
		$this->session->sess_destroy();
		redirect('home/login');
	}

	public function verificar_sessao(){
		//Verifica se existe sessão ativa. Se não existir redicionará para a tela de login
		//logado = definido como função booleana no momento do login
		if($this->session->userdata('logado') == false){
			redirect('home/login');
		}
	}

}
