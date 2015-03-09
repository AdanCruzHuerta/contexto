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

        // Tipos de nota
        if($tipo_nota == 1) //Nota comun
        {
          if($_FILES)
          {
            $file = $_FILES[0]['name'];
            $imagen_nota = "media/img/notas/".$file;
            if(move_uploaded_file($_FILES[0]['tmp_name'], $imagen_nota))
            {
              if($autor == 'redaccion'){

                $nota_id = $this->nota_model->crearNota($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,1);
					
                // guardamos las secciones a la que pertenece la nota
                foreach($secciones as $seccion){
                    $this->nota_model->secciones_has_nota($seccion,$nota_id);
                }

                // guardamos la persona que sube la nota
                $persona_nota_publica = $this->nota_model->personas_has_notas($this->usuario,$nota_id,2);

                if($persona_nota_publica){

                  // generamos la notificacion
                  $this->notificacion_model->crearNotificacion($nota_id,1,0); //(id_nota, tipo, status)

                  echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array('resp'=>false, 'mensaje'=>'Error al crear la nota'));
                }
              }else{
                $autor = explode("-", $autor);
                $autor = $autor[1];

                $nota_id = $this->nota_model->crearNota($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,0);

                // guardamos las secciones a la que pertenece la nota
                foreach($secciones as $seccion){
                    $this->nota_model->secciones_has_nota($seccion,$nota_id);
                }
                //Persona sube
                $persona_nota_sube = $this->nota_model->personas_has_notas($this->usuario,$nota_id,2);
                //Persona autor
                $persona_nota_autor = $this->nota_model->personas_has_notas($autor,$nota_id,1);

                if($persona_nota_sube && $persona_nota_autor){
                     // generamos la notificacion
                    $this->notificacion_model->crearNotificacion($nota_id,1,0);

                    echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array("resp"=>false, "mensaje"=>"Error al crear la nota"));
                }
              }
            }else
            {
              echo json_encode(array('resp'=>false,'mensaje'=>'Error no se pudo guardar la imagen'));
            }
          }
        }
        else if($tipo_nota == 2)  // Nota Columna
        {
            $columna = $this->columna_model->get_all_columna($columna_id);
            $nombre = $columna->nombre;
            $imagen_nota = $columna->imagen_columna;
              
            if($autor == 'redaccion'){
                $nota_id = $this->nota_model->crearNotaComun($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,1,$columna_id);
                
                // guardamos las secciones a la que pertenece la nota
                foreach($secciones as $seccion){
                    $this->nota_model->secciones_has_nota($seccion,$nota_id);
                }

                // guardamos la persona que publica la nota
                $persona_nota_publica = $this->nota_model->personas_has_notas($this->usuario,$nota_id,2);

                if ($persona_nota_publica) {
                  // generamos la notificacion
                  $this->notificacion_model->crearNotificacion($nota_id,1,0); //(id_nota, tipo, status)

                  echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array('resp'=>false,'mensaje'=>'Error al crear la nota'));
                }
            }else{
                $autor = explode("-", $autor);
                $autor = $autor[1];

                $nota_id = $this->nota_model->crearNotaComun($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,1,$columna_id);
                
                // guardamos las secciones a la que pertenece la nota
                foreach($secciones as $seccion){
                    $this->nota_model->secciones_has_nota($seccion,$nota_id);
                }

                // guardamos la persona que publica la nota
                $persona_nota_publica = $this->nota_model->personas_has_notas($this->usuario,$nota_id,2);
                //Persona autor
                $persona_nota_autor = $this->nota_model->personas_has_notas($autor,$nota_id,1);

                if($persona_nota_publica && $persona_nota_autor){
                     // generamos la notificacion
                    $this->notificacion_model->crearNotificacion($nota_id,1,0);

                    echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array("resp"=>false, "mensaje"=>"Error al crear la nota"));
                }
            }
        }
        else if($tipo_nota == 3)  // Nota Video
        {

          exit('video');

        }
        else                      // Nota Galeria
        {

          exit('galeria');
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
