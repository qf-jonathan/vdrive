<?php

class Saludo_Controlador extends Controlador {

	public function __construct() {
		parent::__construct();
	}
	
	public function index_accion(){
		echo 'hola mundo';
	}

}

/* fin controlador/saludo.php */