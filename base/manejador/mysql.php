<?php

require 'mysql_dataset.php';

class Mysql {

	private $enlace = NULL;

	public function __construct($data) {
		$this->enlace = mysql_connect(
				$data['hosting'], $data['usuario'], $data['clave']
		);
		mysql_select_db($data['nombre'], $this->enlace);
	}

	public function query($sql) {
		$resultado = mysql_query($sql, $this->enlace);
		return Mysql_dataset($resultado);
	}

	public static function ultimo_id() {
		return mysql_insert_id($this->enlace);
	}

}

/* fin base/manejador/mysql.sql */