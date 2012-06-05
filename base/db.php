<?php

class DB {

	private $obj = NULL;
	private $manejador = '';
	private $hosting = '';
	private $usuario = 's';
	private $clave = '';
	private $nombre = '';
	private static $conecciones = array();

	public static function &crear($cnombre) {
		if (!isset(self::$conecciones[$cnombre])) {
			self::$conecciones[$cnombre] =
					new self(Configuracion::$database[$cnombre]);
		}
		return self::$conecciones[$cnombre];
	}

	private function __construct($data) {
		$this->manejador = $data['manejador'];
		$this->hosting = $data['manejador'];
		$this->usuario = $data['usuario'];
		$this->clave = $data['clave'];
		$this->nombre = $data['nombre'];
		require_once BASE . 'base' . SEP . 'manejador' . SEP .
				($this->manejador) . 'php';
		$clase = ucfirst($this->manejador);
		$this->obj = new $clase($data);
	}

	public function query($sql) {
		return $this->obj->query($sql);
	}

}