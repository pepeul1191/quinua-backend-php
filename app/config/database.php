<?php

require_once 'app/vendor/j4mie/idiorm/idiorm.php';
require_once 'app/vendor/j4mie/paris/paris.php';

ORM::configure('pgsql:dbname=quinua;host=168.121.220.36;username=postgres;password=ulima');
ORM::configure('pgsql:dbname=dc8kfe3kkehphc;host=ec2-23-23-221-255.compute-1.amazonaws.com;username=ekkabwlszqifss;password:2781d95a789ed3939c85ee2ff3f0552cade3fdbc072d8ab2cd59f48261261ddc', 'tokens');

ORM::configure('return_result_sets', true);
ORM::configure('error_mode', PDO::ERRMODE_WARNING);
ORM::configure('return_result_sets', true);
ORM::configure('error_mode', PDO::ERRMODE_WARNING);

// FUENTE: http://idiorm.readthedocs.io/en/latest/configuration.html | http://paris.readthedocs.io/en/latest/configuration.html

?>
