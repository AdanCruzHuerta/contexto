<?php
class Nota_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function all()
	{
		return $this->db->select('notas.id')

						->select('notas.nombre')

						->select('notas.status')

						->select('notas.tipo_nota')

						->select('notas.fecha')

						->select('personas.nombre')

						->select('personas.apellido_p')

						->select('personas.apellido_m')

						->select('secciones.nombre')

						->from('notas')

						->join('personas','notas.personas_id = personas.id')

						->join('secciones_has_notas','notas.id = secciones_has_notas.notas_id')

						->join('secciones','secciones_has_notas.secciones_id = secciones.id')

						->get()

						->result();
	}
}