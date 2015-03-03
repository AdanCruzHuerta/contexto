<?php
class Columna_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function all()
	{
		return $this->db->select('columna.id')
						->select('columna.nombre')
						->select('columna.fecha_creacion as fecha')
						->select('columna.imagen_columna')
						->from('columna')
						->get()
						->result();
	}
	public function find($id)
	{
		return $this->db->where('id',$id)
						->from('columna')
						->get()
						->row();
	}
	public function guardar($nombre,$imagen_columna)
	{
		return $this->db->set('nombre',$nombre)
						->set('imagen_columna',$imagen_columna)
						->set('fecha_creacion',date("Y/m/d"))
						->set('estatus', 1)
						->insert('columna');
	}
	public function edita_columna($id,$nombre,$imagen_columna)
	{
			return $this->db->set('nombre',$nombre)
							->set('imagen_columna',$imagen_columna)
							->where('id',$id)
							->update('columna');
	}
}
