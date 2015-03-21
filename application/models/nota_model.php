<?php
class Nota_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function all()
	{
		return $this->db->query("SELECT  n.id, n.nombre, n.fecha, n.tipo_nota, n.status, autores(n.id) as autor, publicador(n.id) as publicador FROM notas as n  order by(n.id)");
	}

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

	public function crearNotaGaleria($nombre,$contenido,$tipo_nota,$imagen_nota,$url_video,$redaccion,$galeria_id){
		$this->db->set('nombre',$nombre)
				 ->set('status',1)
				 ->set('fecha',date("Y/m/d H:i:s"))
				 ->set('contenido',$contenido)
				 ->set('tipo_nota',$tipo_nota)
				 ->set('imagen_nota',$imagen_nota)
				 ->set('url_video',$url_video)
				 ->set('redaccion',$redaccion)
				 ->set('galerias_id',$galeria_id)
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

	public function desactivar_nota($id)
	{
		return $this->db->set('status',0)
						->where('id',$id)
						->update('notas');
	}

	public function activar_nota($id)
	{
		return $this->db->set('status',1)
						->where('id',$id)
						->update('notas');
	}

	public function detalle_nota($id)
	{
		return $this->db->where('id',$id)
						->get('notas')
						->row();
	}

	public function autor($id)
	{
		return $this->db->query("select personas.nombre, personas.apellidos 
								 from notas join personas_has_notas on notas.id = personas_has_notas.notas_id
								 join personas on personas_has_notas.personas_id = personas.id 
								 where notas.id = ".$id." and personas_has_notas.tipo = 1");
	}

	public function publico($id)
	{
		return $this->db->select('p.nombre')
						->select('p.apellidos')
						->from('notas as n')
						->join('personas_has_notas as pn','n.id = pn.notas_id')
						->join('personas as p','pn.personas_id = p.id')
						->where('n.id',$id)
						->or_where('pn.tipo',2)
						->get()
						->row();
	}
}