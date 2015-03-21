<?php
class Galeria_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function all()
	{
		return $this->db->get('galerias')
						->result();
	}

	public function galeria_save($nombre,$autor)
	{
		$this->db->set('nombre',$nombre)
				 ->set('autor',$autor)
				 ->set('fecha_creacion',date("Y/m/d"))
				 ->insert('galerias');
		return $this->db->insert_id();
	}

	public function imagen_save($nombre_imagen,$ruta_imagen)
	{
		$this->db->set('nombre',$nombre_imagen)
				 ->set('ruta_imagen',$ruta_imagen)
				 ->insert('imagenes');
		return $this->db->insert_id();
	}

	public function imagenes_has_galerias($imagen_id,$id_galeria)
	{
		return $this->db->set('imagenes_id',$imagen_id)
						->set('galerias_id',$id_galeria)
						->insert('imagenes_has_galerias');
	}

	public function getRouteFirstElement($galeria_id)
	{
		return $this->db->select('imagenes.ruta_imagen')
						->from('galerias')
						->join('imagenes_has_galerias','galerias.id = imagenes_has_galerias.galerias_id')
						->join('imagenes','imagenes_has_galerias.imagenes_id = imagenes.id')
						->where('galerias.id',$galeria_id)
						->get()
						->result();
	}
}