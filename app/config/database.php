<?php

require_once 'app/vendor/j4mie/idiorm/idiorm.php';
require_once 'app/vendor/j4mie/paris/paris.php';

ORM::configure('pgsql:dbname=quinua;host=168.121.220.36;user=postgres;password=ulima');

ORM::configure('return_result_sets', true);
ORM::configure('error_mode', PDO::ERRMODE_WARNING);
ORM::configure('return_result_sets', true);
ORM::configure('error_mode', PDO::ERRMODE_WARNING);

// FUENTE: http://idiorm.readthedocs.io/en/latest/configuration.html | http://paris.readthedocs.io/en/latest/configuration.html

?>
