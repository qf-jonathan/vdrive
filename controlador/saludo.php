<?php

class Saludo_Controlador extends Controlador {

	public function __construct() {
		parent::__construct();
		$this->cargar_modelo('prueba');
	}
	
	public function index_accion(){
		$this->prueba->mensaje();
	}

}

/* fin controlador/saludo.php */