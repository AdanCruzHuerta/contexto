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
						->select('usuarios.status')
						->select('usuarios.id')
						->select('personas.nombre')
						->select('personas.apellidos')
						->select('personas.telefono')
						->select('personas.direccion')
						->select('roles_usuario.nombre as rol')
						->select('roles_usuario.id as rol2')
						->where('usuarios_id',$id)
						->from('usuarios')
						->join('personas','usuarios.id = personas.usuarios_id')
						->join('roles_usuario','usuarios.roles_usuario_id = roles_usuario.id')
						->get()
						->row();
	}

	public function addusuario($email,$password,$rol,$imagen,$status)
	{
		$this->db->set('email',$email)
				 ->set('password',$password)
				 ->set('roles_usuario_id',$rol)
				 ->set('foto_usuario',$imagen)
				 ->set('status',$status)
				 ->insert('usuarios');
		return $this->db->insert_id();
	}

	public function cambiastatus($status,$id)
	{
		$this->db->set('status',$status)
				 ->where('id',$id)
				 ->update('usuarios');
	}

	public function modiusuario($id,$rol,$url)
	{
		$this->db->set('roles_usuario_id',$rol)
				 ->set('foto_usuario',$url)
				 ->where('id',$id)
				 ->update('usuarios');
	}

	public function cambiaperfil($email,$id)
	{
		$this->db->set('email',$email)
				 ->where('id',$id)
				 ->update('usuarios');
	}

	public function get_usuarios_editores()
	{
		return $this->db->select('usuarios.id')
				 ->select('usuarios.roles_usuario_id')
				 ->select('personas.nombre')
				 ->select('personas.apellidos')
				 ->select('roles_usuario.nombre as rol')
				 ->from('usuarios')
				 ->join('personas','usuarios.id = personas.usuarios_id')
				 ->join('roles_usuario','usuarios.roles_usuario_id = roles_usuario.id')
				 ->where('roles_usuario.id', 1)
				 ->or_where('roles_usuario.id', 2)
				 ->get()
				 ->result();
	}

	public function get_usuarios_reporteros()
	{
		return $this->db->select('usuarios.id')
				 ->select('usuarios.roles_usuario_id')
				 ->select('personas.nombre')
				 ->select('personas.apellidos')
				 ->select('roles_usuario.nombre as rol')
				 ->from('usuarios')
				 ->join('personas','usuarios.id = personas.usuarios_id')
				 ->join('roles_usuario','usuarios.roles_usuario_id = roles_usuario.id')
				 ->where('roles_usuario.id', 3)
				 ->get()
				 ->result();
	}
}