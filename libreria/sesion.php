<?php

class Sesion_Lib {

	public function __construct() {
		session_start();
		session_name(Configuracion::$nombre_sesion);
	}

	public function poner_dato($clave, $valor) {
		
	}

	public function obtener_dato($clave) {
		
	}

	public function quitar_dato($clave) {
		
	}

	public function destruir_sesion() {
		session_destroy();
	}

}

/* fin libreria/sesion.php */