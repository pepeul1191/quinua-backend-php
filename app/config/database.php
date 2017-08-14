<?php

require_once 'app/vendor/j4mie/idiorm/idiorm.php';
require_once 'app/vendor/j4mie/paris/paris.php';

ORM::configure('sqlite:./db/db_ubicaciones.db');
ORM::configure('return_result_sets', true);
ORM::configure('error_mode', PDO::ERRMODE_WARNING);

// FUENTE: http://idiorm.readthedocs.io/en/latest/configuration.html | http://paris.readthedocs.io/en/latest/configuration.html

?>
