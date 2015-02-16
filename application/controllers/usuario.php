<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	private $sesion;
	private $usuario;

	public function __construct() {
       parent::__construct();
       
       $this->load->model('usuario_model');
       $this->load->model('persona_model');
       $this->sesion = $this->session->userdata('rol');
       $this->usuario = $this->session->userdata('id');
   }

   //FUNCION POR DEFECTO Y ES DONDE ME MUESTRA EL CATALOGO DE LOS USUARIOS

   public function index()
   {
 		if($this->sesion == 1):
			$data['contenido'] = 'administrador/usuarios';
			$data['administrador'] = $this->usuario_model->all($this->usuario);
      $personas = $this->persona_model->getpersonas();

      foreach ($personas as $per) {
        $persona=$this->usuario_model->all($per->usuarios_id);
        $allpersonas[] = $persona;
        
      }
      $data['personas'] = $allpersonas;
			$this->load->view('templates/layoutAdministrador', $data);

		else:

			redirect('login');

		endif;
   }

   //FUNCION QUE ME CARGA LA VISTA PARA REGISTRAR UN NUEVO USUARIO

   public function newusuario()
   {
    if($this->sesion == 1):
    $data['administrador'] = $this->usuario_model->all($this->usuario);
    $data['contenido'] = 'administrador/newusuario';
 		$this->load->view('templates/layoutAdministrador',$data);
    else:

      redirect('login');

    endif;
   }

   ///FUNCION DONDE REGISTRO LOS DATOS DEL USUARIO EN LA BASE DE DATOS
   public function addusuario()
   {
    if($this->sesion == 1):
    
    $status=1;

    if($_FILES){ //pregunto si me llega algo
      $file = $_FILES[0]['name']; //le asigno el nombre de la imagen que recibo a la variable file
      $url = "media/img/usuarios/".$file; //concateno la ruta donde se subira la imagen junto con la variable file
      $file && move_uploaded_file(
        $_FILES[0]['tmp_name'],$url); //aqui se  sube la imagen a la url que hice antes
    }else{
      $url = "media/img/usuarios/avatar.png";
    }

    $password= "hola";

 		$id=$this->usuario_model->addusuario($this->input->get('email'),
                                         $password,
                                         $this->input->get('rol2'),
                                         $url,
                                         $status);

    $this->persona_model->addpersona($this->input->get('nombre'),
                                     $this->input->get('apellidos'),
                                     $this->input->get('tel'),
                                     $id);

    
    echo json_encode($respuesta = array('resp' => true,
                                        'mensaje' => "se registro con exito el usuario" )); 
    else:

      redirect('login');

    endif;
   }

   // FUNCION DONDE CARGO LA VISTA PARA MODIFICAR EL USUARIO
   public function alteruser()
   {
   if($this->sesion == 1):
    $data['administrador'] = $this->usuario_model->all($this->usuario);
    $data['persona']= $this->usuario_model->all($this->input->post('usuario'));
    $data['contenido'] = 'administrador/alterusuario';
    $this->load->view('templates/layoutAdministrador',$data);
    else:
      redirect('login');
    endif;
   }

   public function modiusuario()
   {
 		if($this->sesion == 1):
    $status=1;

    if($_FILES){ //pregunto si me llega algo
      $file = $_FILES[0]['name']; //le asigno el nombre de la imagen que recibo a la variable file
      $url = "media/img/usuarios/".$file; //concateno la ruta donde se subira la imagen junto con la variable file
      $file && move_uploaded_file(
        $_FILES[0]['tmp_name'],$url); //aqui se  sube la imagen a la url que hice antes
    }

    else{
      $url = $this->input->get('img');
    }
      $id=$this->usuario_model->modiusuario($this->input->get('id'),
                                          $this->input->get('rol2'),
                                          $url);
   
     echo json_encode($respuesta = array('resp' => true,
                                        'mensaje' => "se modifico con exito el usuario" ));  
    else:
      redirect('login');
    endif;
   }

   public function obtienenombre()
   {
 		
    if($this->sesion == 1):

      $usuario=$this->persona_model->obtienenombre($this->input->post('valor'));
      echo json_encode($usuario);
    
    else:


    endif;
   }

   public function cambiastatus()
   {
 		 
     if($this->sesion == 1):
       
        $status = $this->input->post('status');
          if( $status == 1 ){
            $status=0;
          }else{
            $status=1;
          }

      $this->usuario_model->cambiastatus($status,$this->input->post('id'));
      
      echo json_encode(array('resp'=>true));
    
      else:


      endif;

   }

   public function perfilusua()
   {
     
     if($this->sesion == 1):
       
      $data['administrador'] = $this->usuario_model->all($this->usuario);
      $data['contenido'] = 'administrador/perfilusuario';
      $this->load->view('templates/layoutAdministrador',$data);    
      else:

      endif;
   }

   public function cambiaperfil()
   {
      if($this->sesion == 1):

        $hola=$this->input->post('nombre');
      $this->persona_model->cambiaperfil($this->input->post('nombre'),
                                         $this->input->post('apellidos'),
                                         $this->input->post('tel'),
                                         $this->input->post('id'));

      $this->usuario_model->cambiaperfil($this->input->post('email'),
                                         $this->input->post('id'));
      
     echo json_encode($respuesta = array('resp' => true,
                                        'mensaje' => "se guardaron con exito tus datos" ));  
    
      else:


      endif;


   }

}