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
        $this->load->library('nuevanota');
        $this->sesion = $this->session->userdata('rol');
        $this->usuario = $this->session->userdata('id');

   }

   public function index()
   {
 		if($this->sesion == 1):
      echo $this->nuevanota->show_hello_world($this->sesion);
			$data['contenido'] = 'administrador/notas';
			$data['administrador'] = $this->usuario_model->all($this->usuario);
      $data['notas'] = $this->nota_model->all();
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
        if($_FILES){ $file = $_FILES[0]['name']; $imagen_nota = "media/img/notas/".$file; }

        /*
        |   TIPO DE NOTA COMUN
        */
        if($tipo_nota == 1)
        {
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
        /*
        |   TIPO DE NOTA COLUMNA
        */
        else if($tipo_nota == 2)
        {              
            if($autor == 'redaccion'){
              /*
              |   Parametros para nueva nota columna
              |   1.-$columna_id, 2.-$contenido, 3.-$tipo_nota, 4.-$url_video, 5.-$redaccion, 6.-$columna_id, 7.- autor
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
        /*
        | TIPO DE NOTA GALERIA
        */
        else                      
        {
          //
        }
      else:

        echo json_encode(array('resp'=>'false', 'mensaje'=>'Ocurrio un error'));

      endif;

    else:

      redirect('administrador');

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
