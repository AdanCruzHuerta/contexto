<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	private $sesion;
	private $usuario;

	public function __construct() {
       parent::__construct();
       
       $this->load->model('usuario_model');
       $this->load->model('persona_model');
       $this->load->model('notificacion_model');
       $this->load->model('nota_model');
       $this->load->model('personas_has_notas_model');
       $this->load->model('secciones_has_notas_model');
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

  			redirect('administrador');

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

        redirect('administrador');

      endif;
   }

   ///FUNCION DONDE REGISTRO LOS DATOS DEL USUARIO EN LA BASE DE DATOS
   public function addusuario()
   {
      if($this->sesion == 1):
        
        if ($this->input->get()):
              
          $status=1;
              if($_FILES){ //pregunto si me llega algo
                  $file = $_FILES[0]['name']; //le asigno el nombre de la imagen que recibo a la variable file
                  $url = "media/img/usuarios/".$file; //concateno la ruta donde se subira la imagen junto con la variable file
                  $file && move_uploaded_file($_FILES[0]['tmp_name'],$url); //aqui se  sube la imagen a la url que hice antes
              }
              else{
                  $url = "media/img/usuarios/avatar.png";
              }

          //Cadena Aleatoria
          $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $cadena = '';
          for ($i = 0; $i < 10; $i++) {
              $cadena = $caracteres[rand(0, strlen($caracteres))];
          }
          $password=sha1($cadena);

          $id=$this->usuario_model->addusuario($this->input->get('email'),
                                               $password,
                                               $this->input->get('rol2'),
                                               $url,
                                               $status);

          $this->persona_model->addpersona($this->input->get('nombre'),
                                           $this->input->get('apellidos'),
                                           $this->input->get('tel'),
                                           $id);

          //Enviar correo

          echo json_encode($respuesta = array('resp' => true,
                                             'mensaje' => "se registro con exito el usuario" )); 
        else:
          echo json_encode($respuesta = array('resp' => true,
                                             'mensaje' => "Ocurrio un error" ));
        endif;
          
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
        redirect('administrador');
      endif;
   }

   public function modiusuario()
   {
   		if($this->sesion == 1):
       if($this->input->get()):

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
            echo json_encode($respuesta = array('resp' => true,
                                               'mensaje' => "Ocurrio un error" ));
        endif;
      
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
        redirect('login');
      endif;
   }

   public function cambiastatus()
   {
 		   if($this->sesion == 1):
       if ($this->input->post()):
          
          $status = $this->input->post('status');
            if( $status == 1 ){
                $status=0;
            }else{
                $status=1;
            }

          $this->usuario_model->cambiastatus($status,$this->input->post('id'));
          echo json_encode(array('resp'=>true));
       else:
          echo json_encode(array('resp'=>false));
       endif;
        else:
          redirect('login');
        endif;
   }

   public function perfilusua()
   {
       if($this->sesion == 1):
          $data['administrador'] = $this->usuario_model->all($this->usuario);
          $data['contenido'] = 'administrador/perfilusuario';
          $this->load->view('templates/layoutAdministrador',$data);    
        else:
          redirect('login');
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
          redirect('login');
        endif;
   }

    public function obtienenotiadmin()
   {
      $status=0;
      $numero=$this->notificacion_model->numnotificaciones($status);
      $notificaciones=$this->notificacion_model->obtienenotificaciones($status);
      $datos = array('numero' => $numero,
                     'notificaciones' => $notificaciones );


      echo json_encode($datos);
   }

   public function vernotificaciones()
   {
      if($this->sesion == 1):
        if ($this->input->post()):
                
                $datos = $this->input->post('idnotificaciones');
                $tipo = $this->input->post('tipo');

                if($datos[0] == 0):
                 
                 $status=1;

                 //consulta para traer las notificaciones leidas
                  if($tipo==4){
                    $idnotificaciones=$this->notificacion_model->notificacionesleidas2($status);
                  }else{
                    $idnotificaciones=$this->notificacion_model->notificacionesleidas($tipo,$status);
                  }

                    if(!$idnotificaciones):
                      
                        exit("NO HAY notificaciones");

                    else:

                      //obtengo el id de las notas
                      foreach ($idnotificaciones as $id) {
                              $valor=$id->id;
                              $idnota=$this->notificacion_model->datosgralnotificacion($valor,$status);
                              $notas[]=$idnota->notas_id;
                        }

                    endif;
                  
                  

                else:
                  //para traer las notificaciones no leidas
                  $status=0;
                  //Obtengo los id de las notificaciones sin leer y los almaceno en una variable
                  $idnotificaciones = explode(",", $datos[0]);
                  //obtengo el id de las notas     
                  foreach ($idnotificaciones as $id) {
                    $idnota=$this->notificacion_model->datosgralnotificacion($id,$status);
                    $notas[]=$idnota->notas_id;
                  }

                  $status=1;
                            foreach ($idnotificaciones as $id) {
                              $this->notificacion_model->cambiastatus($id,$status);
                            }

                endif;
          

                            //Obtengo Informacion de las notas y los autores y quien sube la info
                            foreach ($notas as $notitas) {
                              
                              $info=$this->nota_model->obtengodatosnota($notitas);
                              $autores=$this->personas_has_notas_model->obtieneautor($notitas);
                              $secciones=$this->secciones_has_notas_model->obtienesecciones($notitas);
                                
                                //Con este ciclo determino quien es el autor y quien sube la nota
                                  foreach ($autores as $subioautores){
                                    $nombrepersona=$this->persona_model->obtienenombre($subioautores->personas_id);
                                      if ($info->redaccion == 1) {
                                            $autor = 'redaccion';
                                            $subio = $nombrepersona->nombre.' '.$nombrepersona->apellidos;
                                          }else{
                                              
                                              if ($subioautores->tipo == 2){
                                                $subio = $nombrepersona->nombre.' '.$nombrepersona->apellidos;
                                              }

                                              if($subioautores->tipo == 1){
                                                $autor = $nombrepersona->nombre.' '.$nombrepersona->apellidos;
                                              }
                                          }
                                 }
                                 //CREO UN ARRAY CON TODOS LOS DATOS DE LA NOTIFICACION
                                $infonota[] = ['subio' => $subio,
                                              'autor' => $autor,
                                              'nombrenota' => $info->nombrenota,
                                              'tiponota' => $info->tiponota,
                                              'seccion' => $info->seccion,
                                              'nombre' =>$info->nombre,
                                              'apellidos' =>$info->apellido,
                                              'secciones' =>$secciones];
                            }
                              //PREGUNTO QUE TIPO DE NOTIFICACION ES PARA DESPLEGAR SU NOMBRE
                            if($tipo==1){
                              $notificacion="Nueva Nota";}
                            if($tipo==2){
                              $notificacion="Modificación de Nota";}
                            if($tipo==3){
                              $notificacion="Eliminación de Nota";}
                            if($tipo==4){
                              $notificacion="Todos los tipos";
                            }

                            $data['nombrenotificacion']=$notificacion;
                            $data['notificaciones'] = $infonota;
                            $data['contenido'] = 'administrador/notificaciones';
                            $data['administrador'] = $this->usuario_model->all($this->usuario);
                            $this->load->view('templates/layoutAdministrador', $data);
        else:
          redirect('login');
       endif;
      else:
        redirect('login');
      endif;                         
  }
}