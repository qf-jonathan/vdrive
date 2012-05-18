<?php

class Controlador {

	private static $_modelos_cargados = array();
	private static $_librerias_cargadas = array();

	public function __construct() {
		;
	}

	public function cargar_vista($vista, $variables = array()) {
		extract($variables);
		include BASE . 'vista' . SEP . $vista . EXT;
	}

	public function cargar_modelo($modelo) {
		if (!isset(self::$_modelos_cargados[$modelo])) {
			require BASE . 'modelo' . SEP . $modelo . EXT;
			$clase = ucfirst($modelo) . '_Modelo';
			self::$_modelos_cargados[$modelo] = new $clase;
		}
		$this->$modelo = &self::$_modelos_cargados[$modelo];
	}

	public function cargar_libreria($libreria) {
		
	}

}

/* fidn base/controlador.php */