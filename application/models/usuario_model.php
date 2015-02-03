<?php
class Usuario_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function get_user($email,$password)
	{
		return $this->db->where('email',$email)

						->where('password',$password)

						->get('usuarios')

						->row();
	}

	public function all($id)
	{
		return $this->db->select('usuarios.email')

						->select('usuarios.foto_usuario')

						->select('personas.nombre')

						->select('personas.apellido_p')

						->select('personas.apellido_m')

						->select('personas.telefono')

						->select('roles_usuario.nombre as rol')

						->from('usuarios')

						->join('personas','usuarios.id = personas.usuarios_id')

						->join('roles_usuario','usuarios.roles_usuario_id = roles_usuario.id')

						->get()

						->row();
	}
}