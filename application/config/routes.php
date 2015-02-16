<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "home";

$route['404_override'] = '';

/*
|-----------------------------------------------------------
|		Rutas de Login
|-----------------------------------------------------------
*/

$route['administrador'] = 'login/index';



/*
|-----------------------------------------------------------
|		Rutas de Notas
|-----------------------------------------------------------	
*/

$route['administrador/notas'] = 'nota/index';

$route['administrador/notas/crear'] = 'nota/create';

$route['administrador/notas/(:num)'] = 'nota/show/$1';

$route['administrador/notas/editar/(:num)'] = 'nota/edit/$1';

$route['administrador/notas/actualizar'] = 'nota/update';

$route['administrador/notas/borrar/(:num)'] = 'nota/delete/$1';

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