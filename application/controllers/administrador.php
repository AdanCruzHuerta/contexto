<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	private $sesion;
	private $usuario;

	public function __construct() {
       parent::__construct();

       $this->load->model('usuario_model');

       $this->sesion = $this->session->userdata('rol');

       $this->usuario = $this->session->userdata('id');

       $this->status = $this->session->userdata('status');
   }

	public function panel()
	{
		if($this->sesion == 1 && $this->status == 1 ):

			$data['contenido'] = 'administrador/inicio';

			$data['administrador'] = $this->usuario_model->all($this->usuario);

			$data['editores'] = $this->usuario_model->get_usuarios_editores(2); 	// editores

			$data['reporteros'] = $this->usuario_model->get_usuarios_reporteros(3);	//reporteros

			$this->load->view('templates/layoutAdministrador', $data);

		else:

			redirect('login');

		endif;

	}
	public function estadisticas()
	{
		if($this->sesion == 1):

			$data['contenido'] = 'administrador/estadisticas';

			$data['administrador'] = $this->usuario_model->all($this->usuario);

			$this->load->view('templates/layoutAdministrador', $data);

		else:

			redirect('login');

		endif;
	}
}
