<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "home";

$route['404_override'] = '';

/*
|-----------------------------------------------------------
|		Rutas de Notas
|-----------------------------------------------------------	
*/

$route['administrador/notas'] = 'nota/index';

/*
|-----------------------------------------------------------
|		Rutas de Tareas
|-----------------------------------------------------------	
*/

$route['administrador/tareas'] = 'tarea/index';

/*
|-----------------------------------------------------------
|		Rutas de Usuarios
|-----------------------------------------------------------	
*/

$route['administrador/usuarios'] = 'usuario/index';