<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function __construct() {
       parent::__construct();
       
       $this->load->model('usuario_model');
   }

	public function panel()
	{
		if($this->session->userdata('rol') == 1):

			$data['contenido'] = 'administrador/inicio';

			$data['administrador'] = $this->usuario_model->all($this->session->userdata('id'));

			$this->load->view('templates/layoutAdministrador', $data);

		else:

			redirect('login');

		endif;
		
	}

}