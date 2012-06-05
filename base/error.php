<?php

class Error {

	public static function set_404() {
		header("HTTP/1.0 404 Not Found");
		include BASE . 'base' . SEP . 'vista' . SEP . '404' . EXT;
		exit();
	}
	
	public static function db($numero, $mensage){
		include BASE . 'base' . SEP . 'vista' . SEP . 'db' . EXT;
		exit();
	}

}

/* fin base/error.php */