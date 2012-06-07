<?php

class Controlador extends Base {

	public function __construct() {
		;
	}

	public function cargar_vista($vista, $variables = array()) {
		extract($variables);
		include BASE . 'vista' . SEP . $vista . EXT;
	}

}

/* fidn base/controlador.php */