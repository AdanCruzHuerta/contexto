<?php
class Nuevanota extends CI_Controller {

	private $usuario;

	public function __construct() {
       parent::__construct();

		$this->load->model('nota_model');
		$this->load->model('notificacion_model');
		$this->load->model('columna_model');
		$this->usuario = $this->session->userdata('id');
   }

  public function nota_comun($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,$redaccion,$secciones,$autor)
  {
	$nota_id = $this->nota_model->crearNota($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,$redaccion);

	// guardamos las secciones a la que pertenece la nota
    foreach($secciones as $seccion){
        $this->nota_model->secciones_has_nota($seccion,$nota_id);
    }

    if($autor == 'redaccion'){
    	// guardamos la persona que sube la nota
    	$persona_nota_publica = $this->nota_model->personas_has_notas($this->usuario,$nota_id,2);
    	if($persona_nota_publica){
    		$this->notificacion_model->crearNotificacion($nota_id,1,0); //(id_nota, tipo, status)
        	return true;	
    	}else{
    		return false;
    	}
    }else{
    	$persona_nota_publica = $this->nota_model->personas_has_notas($this->usuario,$nota_id,2);
    	$persona_nota_autor   = $this->nota_model->personas_has_notas($autor,$nota_id,1);
    	if($persona_nota_publica && $persona_nota_autor){
    		$this->notificacion_model->crearNotificacion($nota_id,1,0); //(id_nota, tipo, status)
        	return true;
    	}else{
    		return false;
    	}
    }
  }
  public function nota_columna($contenido,$tipo_nota,$imagen_nota,$url_video,$redaccion,$columna_id,$secciones,$autor)
  {
  		$columna = $this->columna_model->get_all_columna($columna_id);
        $nombre = $columna->nombre;
        $imagen_nota = $columna->imagen_columna;
  		$nota_id = $this->nota_model->crearNotaColumna($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,1,$columna_id);
  		// guardamos las secciones a la que pertenece la nota
        foreach($secciones as $seccion){
            $this->nota_model->secciones_has_nota($seccion,$nota_id);
        }
        if($autor == 'redaccion')
       	{
       		// guardamos la persona que publica la nota
        	$persona_nota_publica = $this->nota_model->personas_has_notas($this->usuario,$nota_id,2);
        	if($persona_nota_publica){
        		// generamos la notificacion
                $this->notificacion_model->crearNotificacion($nota_id,1,0); //(id_nota, tipo, status)
                return true;
        	}else{
        		return false;
        	}	
       	}else{
       		// guardamos la persona que publica la nota
            $persona_nota_publica = $this->nota_model->personas_has_notas($this->usuario,$nota_id,2);
            //Persona autor
            $persona_nota_autor = $this->nota_model->personas_has_notas($autor,$nota_id,1);
            if($persona_nota_publica && $persona_nota_autor){
            	 // generamos la notificacion
                 $this->notificacion_model->crearNotificacion($nota_id,1,0);
                 return true;
            }else{
            	return false;
            }
       	}
  }
}