<?php

class Vdrive_controlador extends Controlador {

	public function __construct() {
		parent::__construct();
		$this->url = Configuracion::$url;
	}

	public function index_accion() {
		$this->cargar_vista('login', array('url'=>$this->url));
	}

	public function login_accion() {
		$this->cargar_vista('login', array('url'=>$this->url));
	}

}

/* fin controlador/vdrive.php */