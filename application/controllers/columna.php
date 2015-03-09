<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Columna extends CI_Controller {

	private $sesion;
	private $usuario;

	public function __construct() 
  {
       parent::__construct();

        $this->sesion = $this->session->userdata('rol');
        $this->usuario = $this->session->userdata('id');
       	$this->load->model('columna_model');
        $this->load->model('usuario_model');
        $this->load->model('persona_model');
  }

   public function index()
   {
    	if($this->usuario == 1){

        if($this->input->is_ajax_request()){
          
          echo json_encode($this->columna_model->all());

        }else{
            $data['contenido'] = 'administrador/columnas';
            $data['administrador'] = $this->usuario_model->all($this->usuario);
            $data['columnas'] = $this->columna_model->all();

            $this->load->view('templates/layoutAdministrador',$data);
        }
    	}
    	else{
    		redirect('administrador');
    	}
   }

   public function store()
   {
      if ($this->sesion == 1) {
        if ($this->input->get()) {

          $nombre = $this->input->get('nombre');
          $personas_id = $this->input->get('autor');

          if($_FILES)
          {
            $file = $_FILES[0]['name'];
            $imagen_columna = "media/img/notas/columnas/".$file;
            if(move_uploaded_file($_FILES[0]['tmp_name'], $imagen_columna))
            {
                $columna = $this->columna_model->guardar($nombre,$imagen_columna,$personas_id);

                if($columna){
                  echo json_encode(array('resp'=>true, 'mensaje'=>'La columna ha sido creada correctamente'));
                }
                else{
                  echo json_encode(array('resp'=>false, 'mensaje'=>'Error al crear la columna'));
                }
            }else{
              echo json_encode(array('resp' => false,'mensaje'=>'Error al guardar la imagen'));
            }
          }
          else{
            echo json_encode(array('resp'=>false,'mensaje'=>'Error al enviar la imagen'));
          }
        }
      }
      else{
        echo json_encode(array('resp'=>false,'mensaje'=>'Su sesión ha terminado, inicie sesión nuevamente'));
      }
   }

   public function update()
   {
      if($this->sesion == 1){
          if($this->input->get()){
            $id = $this->input->get('id');
            $nombre = $this->input->get('nombre');
            $imagen_columna = $this->input->get('imagen');

            if($_FILES){
              $file = $_FILES[0]['name'];
              $imagen_columna = "media/img/notas/columnas/".$file;

              if(move_uploaded_file($_FILES[0]['tmp_name'], $imagen_columna))
              {
                  // actualizamos el nombre e imagen_columna
                  $columna_edita = $this->columna_model->edita_columna($id,$nombre,$imagen_columna);
                  if($columna_edita){
                    echo json_encode(array('resp'=>true,'mensaje'=>'La columna ha sido actualizada correctamente','columnas'=>$this->columna_model->all()));
                  }else{
                    echo json_encode(array('resp'=>false,'mensaje'=>'Error al actualizar la columna'));
                  }
              }else{
                echo json_encode(array('resp' => false,'mensaje'=>'Error al guardar la imagen'));
              }
            }else{
              //actualizamos solo nombre de la columna
              $columna_edita = $this->columna_model->edita_columna($id,$nombre,$imagen_columna);
              if($columna_edita){
                echo json_encode(array('resp'=>true,'mensaje'=>'La columna ha sido actualizada correctamente','columnas'=>$this->columna_model->all()));
              }else{
                echo json_encode(array('resp'=>false,'mensaje'=>'Error al actualizar la nota'));
              }
            }
          }
      }
      else{
          echo json_encode(array('resp'=>false,'mensaje'=>'Su sesión ha terminado, inicie sesión nuevamente'));
      }
   }

   public function activar()
   {
      if($this->sesion == 1){
        if($this->input->post()) {
            $this->columna_model->activar_columna($this->input->post('id_columna'));
            redirect('columna');
        }
      }else{
        echo json_encode(array('resp'=>false,'mensaje'=>'Su sesión ha terminado, inicie sesión nuevamente'));
      }
   }

   public function borrar()
   {
      if($this->sesion == 1){ 
          if($this->input->post()){
            $this->columna_model->borrar_columna($this->input->post('id_columna'));
            redirect('columna');
          }
      }else{
        redirect_to('administrador');
      }
   }
}
