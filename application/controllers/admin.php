<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
       parent::__construct();
       
       $this->load->model('usuario_model');
   }

   public function index()
   {
 		if( $this->session->userdata('id') ):

   			redirect('administrador/panel')

   		endif;

   		redirect('login');
   }

}