<?php

class Depachador {

	private $controlador = '';
	private $accion = '';
	private $argumentos = array();

	public function __construct() {
		if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !== '/') {
			$segmentos = explode('/', $_SERVER['PATH_INFO']);
			foreach ($segmentos as $segmento) {
				if ($segmento !== '') {
					if ($this->controlador === '')
						$this->controlador = $segmento;
					else if ($this->accion === '')
						$this->accion = $segmento;
					else
						$this->argumentos[] = $segmento;
				}
			}
		} else {
			$this->controlador = Configuracion::$controlador_defecto;
			$this->accion = Configuracion::$accion_defecto;
			$this->argumentos = Configuracion::$accion_defecto;
		}
	}

	public function lanzar() {
		
	}

}

/* fin base/despachador */