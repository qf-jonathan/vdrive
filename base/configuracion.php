<?php

class Configuracion {

	public static $url = 'http://localhost/vdrive/';
	public static $controlador_defecto = 'saludo';
	public static $accion_defecto = 'index';
	public static $argumento_defecto = array();
	public static $database = array(
		'default' => array(
			'manejador' => 'mysql',
			'hosting' => 'localhost',
			'usuario' => 'root',
			'clave' => 'j0nathan_',
			'nombre' => 'tienda'
		),
	);

}

/* fin de configuracion.php */