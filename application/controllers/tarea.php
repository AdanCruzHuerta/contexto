<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarea extends CI_Controller {

	private $sesion;
	private $usuario;

	public function __construct() {
       parent::__construct();
       
       $this->load->model('usuario_model');
       
       $this->sesion = $this->session->userdata('rol');
       
       $this->usuario = $this->session->userdata('id');
   }

   public function index()
   {
 		if($this->sesion == 1):

			$data['contenido'] = 'administrador/tareas';

			$data['administrador'] = $this->usuario_model->all($this->usuario);

			$this->load->view('templates/layoutAdministrador', $data);

		else:

			redirect('administrador');

		endif;
   }

   public function create()
   {
 		//
   }

   public function store()
   {
 		//
   }

   public function show()
   {
 		//
   }

   public function edit()
   {
 		//
   }

   public function update()
   {
 		//
   }

   public function delete()
   {
 		//
   }

}