<?php

require 'mysql_dataset.php';

class Mysql {

	private $enlace = NULL;

	public function __construct($data) {
		$this->enlace = @mysql_connect(
				$data['hosting'], $data['usuario'], $data['clave']
		);
		if (mysql_errno() != 0)
			Error::db(mysql_errno(), mysql_error());
		@mysql_select_db($data['nombre'], $this->enlace);
		if (mysql_errno($this->enlace) != 0)
			Error::db(mysql_errno($this->enlace), mysql_error($this->enlace));
	}

	public function consulta($sql) {
		$resultado = @mysql_query($sql, $this->enlace);
		if (mysql_errno() != 0)
			Error::db(mysql_errno($this->enlace), mysql_error($this->enlace));
		return new Mysql_dataset($resultado);
	}

	public static function ultimo_id() {
		return mysql_insert_id($this->enlace);
	}

}

/* fin base/manejador/mysql.sql */