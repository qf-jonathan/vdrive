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

	public function consulta($sql, $dev = TRUE) {
		$resultado = @mysql_query($sql, $this->enlace);
		if (mysql_errno($this->enlace) != 0 && $dev)
			Error::db(mysql_errno($this->enlace), mysql_error($this->enlace));
		return new Mysql_dataset($resultado);
	}

	public static function ultimo_id() {
		return mysql_insert_id($this->enlace);
	}

	public static function es_error($error) {
		$estado = TRUE;
		if (is_array($error)) {
			foreach ($error as $er)
				$estado = $estado && (mysql_errno($this->enlace) == $er);
		} else if (mysql_errno($this->enlace) != $error)
			$estado = FALSE;
		return $estado;
	}

}

/* fin base/manejador/mysql.sql */