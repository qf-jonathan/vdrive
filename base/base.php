<?php

class Base {

	private static $_modelos_cargados = array();
	private static $_librerias_cargadas = array();
	private static $_db_cargados = array();

	public function cargar_modelo($modelo, $nombre = NULL) {
		if (!isset(self::$_modelos_cargados[$modelo])) {
			require BASE . 'modelo' . SEP . $modelo . EXT;
			$clase = ucfirst($modelo) . '_Modelo';
			self::$_modelos_cargados[$modelo] = new $clase;
		}
		$nombre = $nombre === NULL ? $modelo : $nombre;
		$this->$nombre = &self::$_modelos_cargados[$modelo];
	}

	public function cargar_libreria($libreria, $nombre) {
		if (!isset(self::$_librerias_cargadas[$libreria])) {
			require BASE . 'libreria' . SEP . $modelo . EXT;
			$clase = ucfirst($libreria) . '_Lib';
			self::$_librerias_cargadas[$libreria] = new $clase;
		}
		$nombre = $nombre === NULL ? $libreria : $nombre;
		$this->$nombre = self::$_librerias_cargadas[$libreria];
	}

	public function cargar_db($conexion, $nombre = NULL) {
		if (!isset(self::$_db_cargados[$conexion])) {
			$datos = Configuracion::$database[$conexion];
			require_once BASE . 'base' . SEP . 'manejador' . SEP .
					($datos['manejador']) . '.php';
			$clase = ucfirst($datos['manejador']);
			self::$_db_cargados[$conexion] = new $clase($datos);
		}
		$nombre = $nombre === NULL ? $conexion : $nombre;
		$this->$nombre = &self::$_db_cargados[$conexion];
	}

	public function entrada($elemento, $limpiar = FALSE) {
		if (is_array($elemento)) {
			$res = array();
			foreach ($elemento as $el) {
				if (isset($_POST[$el]))
					$res[$el] = mysql_escape_string($_REQUEST[$el]);
				else
					$res[$el] = FALSE;
			}
		}else {
			if (isset($_POST[$elemento]))
				$res = mysql_escape_string($_REQUEST[$elemento]);
			else
				$res = FALSE;
		}
		return $res;
	}

}