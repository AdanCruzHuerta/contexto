<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nota extends CI_Controller {

	private $sesion;
	private $usuario;

	public function __construct() {
       parent::__construct();

        $this->load->model('usuario_model');
		    $this->load->model('nota_model');
        $this->load->model('notificacion_model');
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
        $nombre = $this->input->get("nombre");
        $contenido = $this->input->get("contenido");
        $url_video = $this->input->get("url_video");
        $tipo_nota = $this->input->get("tipo_nota");
        $autor = $this->input->get('autor');
        $secciones = $this->input->get('secciones_id');
        $fecha = date("Y/m/d");
        $status = 1;

        // Tipo de nota a subir 1 - Común 2 - Columna 3 - Video 4 - Galeria
		  // Nota común
        if($tipo_nota == 1)
        {
          if($_FILES)
          {
            $file = $_FILES[0]['name'];
            $imagen_nota = "media/img/notas/".$file;
            if(move_uploaded_file($_FILES[0]['tmp_name'], $imagen_nota))
            {
              if($autor == 'redaccion'){
                $redaccion = 1;
                $nota_id = $this->nota_model->crearNota($nombre,$status,$fecha,$contenido,$tipo_nota,$imagen_nota,$url_video,$redaccion);
					
                // guardamos las secciones a la que pertenece la nota
                foreach($secciones as $seccion){
                    $this->nota_model->secciones_has_nota($seccion,$nota_id);
                }

                // guardamos la persona que sube la nota
                $persona_nota = $this->nota_model->personas_has_notas($this->usuario,$nota_id);

                if($persona_nota){

                  // generamos la notificacion
                  $this->notificacion_model->crearNotificacion($nota_id,1,1,1);

                  echo json_encode(array('resp'=>true,'mensaje'=>'La nota ha sido creada correctamente'));
                }else{
                  echo json_encode(array('resp'=>false, 'mensaje'=>'Error al crear la nota'));
                }
              }
            }else
            {
              echo json_encode(array('resp'=>false,'mensaje'=>'No se pudo guardar la imagen'));
            }
          }
        }
        else if($tipo_nota == 2)  // Nota Columna
        {

          exit('columna');

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
