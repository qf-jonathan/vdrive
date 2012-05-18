<?php

class Despachador {

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
		if($this->accion==='')
			$this->accion = Configuracion::$accion_defecto;
	}

	public function lanzar() {
		if ($this->controlador === '' || $this->accion === '')
			Error::set_404();

		$direccion = BASE . 'controlador' . SEP;

		if (!file_exists($direccion . $this->controlador . EXT))
			Error::set_404();

		require $direccion . $this->controlador . EXT;

		$clase = ucfirst($this->controlador) . '_Controlador';

		if (!class_exists($clase))
			Error::set_404();

		$accion = $this->accion . '_accion';

		if (!method_exists($clase, $accion))
			Error::set_404();

		call_user_func_array(array(new $clase, $accion), $this->argumentos);
	}

}

/* fin base/despachador */