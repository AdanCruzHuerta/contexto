<?php
class Home_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function getNotasSlider()
	{
		return $this->db->select('notas.id')
						->select('notas.nombre')
						->select('notas.imagen_nota')
						->from('notas')
						->join('secciones_has_notas','notas.id = secciones_has_notas.notas_id')
						->join('secciones','secciones_has_notas.secciones_id = secciones.id')
						->where('secciones.id', 1) // primera plana
						->order_by("notas.fecha")
						->limit(5)
						->get()
						->result();
	}

	public function getUltimasNotas()
	{
		// Gobierno
		$data['gobierno'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 2)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Seguridad
		$data['seguridad'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 3)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Educación
		$data['educacion'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 4)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Salud
		$data['salud'] 				= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 5)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Economia
		$data['economia'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 6)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Colima
		$data['colima'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 7)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Manzanillo
		$data['manzanillo'] 		= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 8)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Villa de Alvarez
		$data['villa_de_alvarez'] 	= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 9)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Tecoman
		$data['tecoman'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 10)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Armeria
		$data['armeria'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 11)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Zona Norte
		$data['zona_norte'] 		= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 12)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Entidades
		$data['entidades'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 13)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Cultura
		$data['cultura'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 14)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Sociales
		$data['sociales'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 15)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Medio ambiente
		$data['medio_ambiente'] 	= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 16)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Urbes
		$data['urbes'] 				= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 17)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Migrantes
		$data['migrantes'] 			= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 18)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Agro
		$data['agro'] 				= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 19)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		// Elecciones 2015
		$data['elecciones'] 		= $this->db->select('n.id')
							 ->select('n.nombre')
							 ->select('n.contenido')
							 ->select('n.imagen_nota')
							 ->from('notas as n')
							 ->join('secciones_has_notas as s_n','n.id = s_n.notas_id')
							 ->join('secciones as s','s_n.secciones_id = s.id')
							 ->where('s.id', 20)
							 ->order_by('n.fecha')
							 ->limit(1)
							 ->get()
							 ->row();

		return $data;

	}
}