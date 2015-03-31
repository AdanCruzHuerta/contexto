<?php
class Personas_has_notas_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function obtieneautor($idnota){
		
		return $this->db->where('notas_id',$idnota)
						->get('personas_has_notas')
						->result();

	}
	
}