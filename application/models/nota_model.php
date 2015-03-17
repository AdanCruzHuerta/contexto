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
						->select('personas.nombre as autor_nombre')
						->select('personas.apellidos')
						->from('notas')
						->join('personas_has_notas','notas.id = personas_has_notas.notas_id')
						->join('personas','personas_has_notas.personas_id = personas.id')
						->join('secciones_has_notas','notas.id = secciones_has_notas.notas_id')
						->join('secciones','secciones_has_notas.secciones_id = secciones.id')
						->where('personas_has_notas.tipo',1)
						->get()
						->result();
	}
	/*
		select notas.id, notas.nombre, notas.fecha, notas.tipo_nota, personas.nombre
		FROM notas join personas_has_notas on notas.id = personas_has_notas.notas_id
		join personas on personas_has_notas.personas_id = personas.id
		where personas_has_notas.tipo = 1;
	*/
	public function crearNota($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,$redaccion)
	{
		$this->db->set('nombre',$nombre)
				->set('status',1) 
				->set('fecha',date("Y/m/d H:i:s"))
				->set('contenido',$contenido)
				->set('tipo_nota',$tipo_nota)
				->set('imagen_nota',$imagen_nota)
				->set('url_video',$url_video)
				->set('redaccion',$redaccion)
				->insert('notas');
		return $this->db->insert_id();
	}
	public function crearNotaColumna($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,$redaccion,$columna_id)
	{
		$this->db->set('nombre',$nombre)
				 ->set('status',1)
				 ->set('fecha',date("Y/m/d H:i:s"))
				 ->set('contenido',$contenido)
				 ->set('tipo_nota',$tipo_nota)
				 ->set('imagen_nota',$imagen_nota)
				 ->set('url_video',$url_video)
				 ->set('redaccion',$redaccion)
				 ->set('columna_id',$columna_id)
				 ->insert('notas');
		return $this->db->insert_id();
	}
	public function secciones_has_nota($seccion,$nota_id)
	{

		return $this->db->set('secciones_id',$seccion)
						->set('notas_id', $nota_id)
						->insert('secciones_has_notas');
	}

	public function personas_has_notas($persona,$nota_id,$tipo)
	{
		return $this->db->set('personas_id',$persona)
						->set('notas_id',$nota_id)
						->set('tipo',$tipo) //tipo de persona_nota
						->insert('personas_has_notas');
	}
}