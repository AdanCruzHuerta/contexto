<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
       parent::__construct();
       
       $this->load->model('usuario_model');
   }

	public function index()
	{
		if($this->session->flashdata('error')):

			$data['error'] = true;

			$this->load->view('pagina/login',$data);

		else:

			$data['error'] = false;

			$this->load->view('pagina/login',$data);

		endif;
	}

	public function create()
	{
		if($this->input->post()):

			$usuario = $this->usuario_model->get_user( $this->input->post('email'), $this->input->post('password'));

			if(is_object($usuario)):

				$this->session->set_userdata("id", $usuario->id);

				$this->session->set_userdata("rol", $usuario->roles_usuario_id);

				$this->session->set_userdata("status",$usuario->status);

				if($this->session->userdata('rol') == '1')				//ADMINISTRADOR

					redirect('administrador/panel');

				else if($this->session->userdata('rol') == '2')			//EDITOR

					exit('EDITOR');

				else 													//REPORTERO

					exit('REPORTERO');

			endif;

			$this->session->set_flashdata('error', true);

			redirect('administrador');

		endif;

		redirect('administrador');
	}

	public function logout()
	{

		$this->session->sess_destroy();

		redirect('administrador');
	}

}