<?php
class Persona_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function getpersonas()
	{
		return $this->db->get('personas')
						->result();
	}

	public function addpersona($nombre,$apellidos,$tel,$id)
	{
		$this->db->set('nombre',$nombre)
				 ->set('apellidos',$apellidos)
				 ->set('telefono',$tel)
				 ->set('usuarios_id',$id)
				 ->insert('personas');
	}

	public function obtienenombre($id)
	{
		return $this->db->select('personas.nombre')
				 ->select('usuarios.id')
				 ->select('personas.apellidos')
				 ->select('usuarios.status')
				 ->where('usuarios_id',$id)
				 ->from('personas')
				 ->join('usuarios','personas.usuarios_id = usuarios.id')
				 ->get()
				 ->row();
	}

	public function cambiaperfil($nombre,$apellidos,$tel,$id)
	{
		$this->db->set('nombre',$nombre)
				 ->set('apellidos',$apellidos)
				 ->set('telefono',$tel)
				 ->where('usuarios_id',$id)
				 ->update('personas');
	}

}