<?php

define('SEP', DIRECTORY_SEPARATOR);
define('BASE', __DIR__ . SEP);
define('EXT', '.php');

require BASE . 'base' . SEP . 'configuracion' . EXT;
require BASE . 'base' . SEP . 'error' . EXT;
require BASE . 'base' . SEP . 'modelo' . EXT;
require BASE . 'base' . SEP . 'controlador' . EXT;
require BASE . 'base' . SEP . 'despachador' . EXT;

$app = new Despachador;
$app->lanzar();

/* fin de index.php */