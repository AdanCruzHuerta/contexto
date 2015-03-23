<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nota extends CI_Controller {

	private $sesion;
	private $usuario;

	public function __construct() {
       parent::__construct();

        $this->load->model('usuario_model');
		    $this->load->model('nota_model');
        $this->load->model('notificacion_model');
        $this->load->model('columna_model');
        $this->load->model('galeria_model');
        $this->load->library('nuevanota');
        $this->sesion = $this->session->userdata('rol');
        $this->usuario = $this->session->userdata('id');

   }

   public function index()
   { 
 		 if($this->sesion == 1):
			   $data['contenido'] = 'administrador/notas';
			   $data['administrador'] = $this->usuario_model->all($this->usuario);
         $data['notas'] = $this->nota_model->all()->result();
			   $this->load->view('templates/layoutAdministrador', $data);
		  else:
			   redirect('administrador');
		  endif;
   }
 
   public function create()
   {
      if($this->sesion == 1):
      if( $this->input->get() ):
        $nombre = $this->input->get("nombre");
        $contenido = $this->input->get("contenido");
        $url_video = $this->input->get("url_video");
        $tipo_nota = $this->input->get("tipo_nota");
        $autor = $this->input->get('autor');
        $secciones = $this->input->get('secciones_id');
        $columna_id = $this->input->get('columna');
        $galeria_id = $this->input->get('galerias_id');
        if($_FILES){ $file = $_FILES[0]['name']; $imagen_nota = "media/img/notas/".$file;}

        /*
        |   TIPO DE NOTA COMUN
        */
        if($tipo_nota == 1)
        {

          if($secciones == false){
              echo json_encode(array('resp'=>false,'mensaje'=>'Selecciona al menos una Seccion'));
          }else{
            if(move_uploaded_file($_FILES[0]['tmp_name'], $imagen_nota))
            {
              if($autor == 'redaccion'){
                /*
                |   Parametros para nueva nota comun
                |   1.-$nombre, 2.-$contenido, 3.-$tipo_nota, 4.-$imagen_nota, 5.-$url_video, 6.-$redaccion, 7.-$secciones, 8.-$autor
                */
                $nota = $this->nuevanota->nota_comun($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,1,$secciones,$autor);
                if($nota){
                  echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array('resp'=>false, 'mensaje'=>'Error al crear la nota'));
                }
              }else{
                $autor = explode("-", $autor);
                $autor = $autor[1];
                $nota = $this->nuevanota->nota_comun($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,0,$secciones,$autor);
                if($nota){
                    echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array("resp"=>false, "mensaje"=>"Error al crear la nota"));
                }
              }
            }
            else{
              echo json_encode(array('resp'=>false,'mensaje'=>'Error no se pudo guardar la imagen'));
            }
          }
        }
        /*
        |   TIPO DE NOTA COLUMNA
        */
        else if($tipo_nota == 2)
        {              
            if($autor == 'redaccion'){
              /*
              |   Parametros para nueva nota columna
              |   1.-$contenido, 2.-$tipo_nota, 3.-$url_video, 4.-$redaccion, 5.-$columna_id, 6.- autor
              */
              $nota = $this->nuevanota->nota_columna($contenido,$tipo_nota,$url_video,1,$columna_id,$autor);
              if($nota){
                  echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array('resp'=>false,'mensaje'=>'Error al crear la nota'));
                }
            }else{
                $autor = explode("-", $autor);
                $autor = $autor[1];
                $nota = $this->nuevanota->nota_columna($contenido,$tipo_nota,$url_video,0,$columna_id,$autor);
                if($nota){
                  echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array("resp"=>false, "mensaje"=>"Error al crear la nota"));
                }
            }
        }
        /*
        | TIPO DE NOTA VIDEO
        */
        else if($tipo_nota == 3)
        {
          if($secciones == false){
              echo json_encode(array('resp'=>false,'mensaje'=>'Selecciona al menos una Seccion'));
          }else{
              if(move_uploaded_file($_FILES[0]['tmp_name'], $imagen_nota))
            {
              if($autor == 'redaccion'){
                /*
                |   Parametros para nueva nota comun
                |   1.-$nombre, 2.-$contenido, 3.-$tipo_nota, 4.-$imagen_nota, 5.-$url_video, 6.-$redaccion, 7.-$secciones, 8.-$autor
                */
                $nota = $this->nuevanota->nota_comun($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,1,$secciones,$autor);
                if($nota){
                  echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array('resp'=>false, 'mensaje'=>'Error al crear la nota'));
                }
              }else{
                $autor = explode("-", $autor);
                $autor = $autor[1];
                $nota = $this->nuevanota->nota_comun($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,0,$secciones,$autor);
                if($nota){
                    echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array("resp"=>false, "mensaje"=>"Error al crear la nota"));
                }
              }
            }
            else{
              echo json_encode(array('resp'=>false,'mensaje'=>'Error no se pudo guardar la imagen'));
            }
          }
        }
        /*
        | TIPO DE NOTA GALERIA
        */
        else                      
        {
          if($secciones == false){
              echo json_encode(array('resp'=>false,'mensaje'=>'Selecciona al menos una Seccion'));
          }else{
            if ($autor == 'redaccion') {
              /*
              |   Parametros para nueva nota columna
              |   1.- $nombre, 2.$contenido, 3.-$tipo_nota, 4.-$url_video, 5.-$redaccion, 6.-$galeria_id, 7.- autor
              */
                $nota = $this->nuevanota->nota_galeria($nombre,$contenido,$tipo_nota,$url_video,1,$galeria_id,$secciones,$autor);
                if($nota){
                    echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                    echo json_encode(array('resp'=>false,'mensaje'=>'Error al crear la nota'));
                }
            }else{
                $autor = explode("-", $autor);
                $autor = $autor[1];

                $nota = $this->nuevanota->nota_galeria($nombre,$contenido,$tipo_nota,$url_video,0,$galeria_id,$secciones,$autor);

                 if($nota){
                  echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array("resp"=>false, "mensaje"=>"Error al crear la nota"));
                }
            }
          }
        }
      else:

        echo json_encode(array('resp'=>'false', 'mensaje'=>'Ocurrio un error'));

      endif;

      else:

      redirect('administrador');

      endif;
   }

   public function edit($id)
   {
 	    if($this->sesion == 1)
      {
        $data['contenido'] = 'administrador/nota';
        $data['administrador'] = $this->usuario_model->all($this->usuario);
        $data['nota'] = $this->nota_model->detalle_nota($id);
        $data['nota_autor'] = $this->nota_model->autor($id)->row();
        $data['nota_publico'] = $this->nota_model->publico($id);
        $this->load->view('templates/layoutAdministrador',$data);
      }else{
        redirect('administrador');
      }
   }

   public function galeria()
   {
       if($this->sesion == 1){
          if($this->input->get()){
            $nombre = $this->input->get('nombre_galeria'); 
            $autor = $this->input->get('autor_galeria');

            if ($_FILES) {

                $id_galeria = $this->galeria_model->galeria_save($nombre,$autor);

                for($i = 0; $i < count($_FILES); $i++){
                  $nombre_imagen = $_FILES[$i]["name"];
                  $ruta_imagen = 'media/img/notas/galerias/'.$nombre_imagen;

                  if(move_uploaded_file($_FILES[$i]['tmp_name'], $ruta_imagen))
                  {
                      $imagen_id = $this->galeria_model->imagen_save($nombre_imagen,$ruta_imagen);
                      $this->galeria_model->imagenes_has_galerias($imagen_id,$id_galeria);  
                  }                  
                }
                echo json_encode(array('resp'=>true,'mensaje'=>'La galería se creo correctamente','data_option_id'=>$id_galeria));   
            } 
            else{
                echo json_encode(array('resp'=>false,'mensaje'=>'Error al cargar las imagenes'));
            }           
          }
      }    
   }

   public function change_status()
   {
      if($this->sesion == 1){
          $id = $this->input->post('id_nota');
          $status = $this->input->post('status_nota');

          if($status == 1){
              // Desactivamos nota
              $desctivar = $this->nota_model->desactivar_nota($id);
              redirect('administrador/notas');
          }else{
              // Activamos nota
              $activar = $this->nota_model->activar_nota($id);
              redirect('administrador/notas');
          }
      }else{
        redirect('administrador');
      }
   }

}
