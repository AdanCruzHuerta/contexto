<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nota extends CI_Controller {

	private $sesion;
	private $usuario;

	public function __construct() {
       parent::__construct();

       $this->load->model('usuario_model');

       $this->load->model('nota_model');;
       
       $this->sesion = $this->session->userdata('rol');
       
       $this->usuario = $this->session->userdata('id');
       
   }

   public function index()
   {
 		if($this->sesion == 1):

			$data['contenido'] = 'administrador/notas';

			$data['administrador'] = $this->usuario_model->all($this->usuario);

      $data['notas'] = $this->nota_model->all();

			$this->load->view('templates/layoutAdministrador', $data);

		else:

			redirect('login');

		endif;
   }

   public function create()
   {

    if($this->sesion == 1):
 	  
      if( $this->input->get() ):

        $data['get'] = $this->input->get();

       if(isset($_FILES[0])):

          echo json_encode($_FILES[0]);
          echo json_encode($data['get']);
        
        else:
        
          echo json_encode(false);
        
        endif;
      
      else:

        echo json_encode("No llega por get");

      endif;

    else:

      redirect('login');

    endif;
   }

   public function store()
   {
 		//
   }

   public function show($id)
   {
 		  echo "La nota que buscas es: ".$id;
   }

   public function edit($id)
   {
 	    echo "La nota a editar es: ".$id;
   }

   public function update()
   {
 		//
   }

   public function delete($id)
   {  
 		   echo "La nota a borrar es: ". $id;
   }

}