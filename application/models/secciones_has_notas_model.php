<?php
class Secciones_has_notas_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function obtienesecciones($idnota){
		
		return $this->db->select('secciones.nombre as secciones')
						->where('notas_id',$idnota)
						->from('secciones_has_notas')
						->join('secciones','secciones_has_notas.secciones_id = secciones.id')
						->get()
						->result();

	}
	
}