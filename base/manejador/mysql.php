<?php

class Mysql {

	private $enlace = NULL;

	public function __construct($data) {
		$this->enlace = mysql_connect(
				$data['hosting'], $data['usuario'], $data['clave']
		);
		mysql_select_db($data['nombre'], $this->enlace);
	}

	public function query($sql) {
		return mysql_query($sql, $this->enlace);
	}

}