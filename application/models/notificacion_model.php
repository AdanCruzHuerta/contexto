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

	public function numnotificaciones($status)
	{
		return $this->db->where('status',$status)
						->from('notificaciones')
						->count_all_results();				
	}

	public function obtienenotificaciones($status)
	{
		return $this->db->where('status',$status)
						->get('notificaciones')
						->result();
	}

	public function cambiastatus($id,$status)
	{
		$this->db->set('status',$status)
				 ->where('id',$id)
				 ->update('notificaciones');
	}

	public function datosgralnotificacion($id,$status)
	{
		return $this->db->select('notas_id')
						->where('id',$id)
						->where('status',$status)
						->get('notificaciones')
						->row();
	}

	public function notificacionesleidas($tipo,$status)
	{
		
		return $this->db->where('tipo',$tipo)
						->where('status',$status)
						->get('notificaciones')
						->result();
	}

	public function notificacionesleidas2($status)
	{
		
		return $this->db->where('status',$status)
						->get('notificaciones')
						->result();
	}

}