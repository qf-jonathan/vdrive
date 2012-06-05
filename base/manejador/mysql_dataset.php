<?php

class Mysql_dataset {

	private $_dataset = NULL;

	public function __construct(&$dataset) {
		$this->_dataset = &$dataset;
	}

	public function filas() {
		return mysql_num_rows($this->_dataset);
	}

	public function extraer_array() {
		return mysql_fetch_assoc($this->_dataset);
	}

	public function extraer_objeto() {
		return mysql_fetch_object($this->_dataset);
	}

	public function &convertir_array() {
		$res = array();
		while ($fila = mysql_fetch_assoc($this->_dataset))
			$res[] = $fila;
		return $res;
	}

}

/* fin base/manejador/mysq_dataset.php */