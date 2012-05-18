<?php

define('BASE', __DIR__ . '/');
define('SEP', DIRECTORY_SEPARATOR);
define('EXP', '.php');

require BASE . 'base' . SEP . 'configuracion' . EXT;
require BASE . 'base' . SEP . 'despachador' . EXT;

$app = new Despachador;
$app->lanzar();

/* fin de index.php */