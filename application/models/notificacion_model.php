<?php
class Notificacion_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function crearNotificacion($nota_id,$tipo,$status)
	{
		return $this->db->set('notas_id',$nota_id)
						->set('tipo',$tipo)
						->set('status',$status)
						->insert('notificaciones');
	}

}