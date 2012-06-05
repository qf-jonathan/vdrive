<?php

class Controlador {

	private static $_modelos_cargados = array();
	private static $_librerias_cargadas = array();
	private static $_db_cargados = array();

	public function __construct() {
		
	}

	public function cargar_vista($vista, $variables = array()) {
		extract($variables);
		include BASE . 'vista' . SEP . $vista . EXT;
	}

	public function cargar_modelo($modelo, $nombre = NULL) {
		if (!isset(self::$_modelos_cargados[$modelo])) {
			require BASE . 'modelo' . SEP . $modelo . EXT;
			$clase = ucfirst($modelo) . '_Modelo';
			self::$_modelos_cargados[$modelo] = new $clase;
		}
		if ($nombre === NULL)
			$this->$modelo = &self::$_modelos_cargados[$modelo];
		else
			$this->$nombre = &self::$_modelos_cargados[$modelo];
	}

	public function cargar_libreria($libreria) {
		
	}

	public function cargar_db($conexion, $nombre = NULL) {
		if (!isset(self::$_db_cargados[$conexion])) {
			$datos = Configuracion::$database[$conexion];
			require_once BASE . 'base' . SEP . 'manejador' . SEP .
					($datos['manejador']) . '.php';
			$clase = ucfirst($datos['manejador']);
			self::$_db_cargados[$conexion] = new $clase($datos);
		}
		if ($nombre === NULL)
			$this->$conexion = &self::$_db_cargados[$conexion];
		else
			$this->$nombre = &self::$_db_cargados[$conexion];
	}

	public function post($elemento, $limpiar = FALSE) {
		if (is_array($elemento)) {
			$res = array();
			foreach ($elemento as $el) {
				if (isset($_POST[$el]))
					$res[$el] = mysql_escape_string($_POST['el']);
				else
					$res[$el] = FALSE;
			}
		}else {
			if (isset($_POST[$elemento]))
				$res = mysql_escape_string($_POST[$elemento]);
			else
				$res = FALSE;
		}
		return $res;
	}

}

/* fidn base/controlador.php */