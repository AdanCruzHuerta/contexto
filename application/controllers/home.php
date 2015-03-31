<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
       parent::__construct();
       
       $this->load->model('home_model');
   }

	public function index()
	{
		$data['notasSlider'] 	= $this->home_model->getNotasSlider();

		$data['ultimasNotas'] 	= $this->home_model->getUltimasNotas();

		$data['contenido'] 		= 'pagina/inicio';

		$this->load->view('templates/layoutPagina',$data);
		
	}
}