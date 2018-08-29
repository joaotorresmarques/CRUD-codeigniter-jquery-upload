<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Carrega o model M_videos atribuindo um apelido 'Model_Videos' 
		//Escrito dentro de um construtor pois será usado por todos os metodos.
		$this->load->model('m_videos','Model_Videos');

		//Verifica se a sessão logado esta vazia. Se sim é redirecionado para o login.
		if(empty($this->session->logado)):
			redirect('home/login');
		endif; 
	}

	public function index(){	
		$data['titulo'] = 'Videos';
		$data['resultVideos'] = $this->Model_Videos->resultAutores();
		//enviando o array para a view
		$this->load->view('back-end/v_videos',$data);
	}

	public function upload(){
		$dados['titulo'] = 'Cadastrar Video';
		//Atribuindo a uma matriz o nome de todos os usuarios cadastrados PARA O SELECT DO FORM
		$dados['usuarios'] = $this->db->get('usuarios')->result();
		//enviando o array a view
		$this->load->view('back-end/v_upload',$dados);
	}

	public function add_video(){
		//TRATAMENTO DO ARQUIVO DE VIDEO
		$inputVideo = $_FILES['vid_video']['name']; 	//Encurtamento do _FILE
		$date = date("Hisd-m-y");					//evitar erro de nome duplicado
		$configVideo['upload_path'] = './upload';	//Pasta de destino
		$configVideo['max_size'] = '60000';			//Tamanho máximo
		$configVideo['allowed_types'] = 'mp4';		//Video Suportado
		$configVideo['remove_spaces'] = TRUE;		//Elimina o espaço(Se houver) e coloca underline no lugar
		$video_name = $date.$inputVideo;			//Data+nome do arquivo
		$configVideo['file_name'] = $video_name;	//Definindo o nome do arquivo

		$this->load->library('upload', $configVideo);
		if(!$this->upload->do_upload('vid_video')) {
			//Armazenando o erro gerado retirando tags html.
			$error = strip_tags($this->upload->display_errors()); 
			//Mostrando o erro na tela
			$this->session->set_flashdata('danger',$error);
			redirect('dashboard/videos');
		}else{ 
			//Ocorrendo nenhum erro realiza o upload na pasta indicada
			$videoDetails = $this->upload->data();
		}
		//Registrando em um array as informações inseridas no form
		$dados = array(
			"vid_titulo" => $this->input->post('vid_titulo'),
			"vid_descricao" => $this->input->post('vid_descricao'),
			"vid_data" => date('Y-m-d H:i:s'),
			"vid_autor" => $this->input->post('vid_autor'),
			"vid_video" => $video_name
		);
		//Realizando o cadastro e enviando mensagem positiva
		if($this->Model_Videos->cadastro($dados)):
			$this->session->set_flashdata('success','Video Cadastrado com sucesso!');
			redirect('dashboard/videos');
		endif;
	}

	public function excluir($id=null){
		/*
		*O id recebido para exclusão é enviado por meio de javascript. Arquivo encontrado em 
		* views/back-end/modais/usuarios/modal_excluir.php
		*/
		
		//Enviando ao metodo excluir o id para exclusão
		if($this->Model_Videos->excluir($id)):
			$this->session->set_flashdata('success','Video excluido com sucesso!');
			redirect('dashboard/videos');
	else:
		$this->session->set_flashdata('danger','Não foi possivel excluir.');
			redirect('dashboard/videos');
	endif;
	}

	public function editar($id=null){
		/*
		*A LISTAGEM DOS DADOS APRESENTADOS NA TELA DE EDIÇÃO É REALIZADO POR MEIO DO ARQUIVO ENCONTRADO EM
		* assets/back/js/proprio.js.
		* ID recebido pelo link de editar na view V_videos
		*/ 

		//Registrando em um array as informações inseridas no form
		$dados['titulo'] = 'Editar Video';

		$dados['getusu'] = $this->db->get('usuarios')->result();
		//Armazena o conteudo da model de listagem de acordo com ID inserida.
		$dados['sqlEditar'] = $this->Model_Videos->editar($id);
		$this->load->view('back-end/v_editarVideo',$dados);
	}

	public function editar_salvar(){
		$data = array(
			"vid_titulo" => $this->input->post('vid_titulo'),
			"vid_descricao" => $this->input->post('vid_descricao'),
			"vid_autor" => $this->input->post('vid_autor')
		);
		$id = $this->input->post('vid_id');

		if($this->Model_Videos->editar_salvar($id,$data)):
			$this->session->set_flashdata('success','Editado com sucesso!');
			redirect('dashboard/videos');
		else:
			$this->session->set_flashdata('danger','Ocorreu um erro em editar');
			redirect('dashboard/videos');
		endif;
	}

}
