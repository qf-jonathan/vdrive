<?php

class Saludo_Controlador extends Controlador {

	public function __construct() {
		parent::__construct();
		$this->cargar_modelo('prueba');
		$this->cargar_db('default','db');
	}
	
	public function index_accion(){
		$res=$this->db->consulta('SELECT * FROM hola');
		echo $res->filas();
	}
	
	public function otro_accion(){
		echo 'Hola';
	}

}

/* fin controlador/saludo.php */