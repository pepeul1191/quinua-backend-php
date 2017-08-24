<?php

require_once 'app/vendor/j4mie/idiorm/idiorm.php';
require_once 'app/vendor/j4mie/paris/paris.php';

ORM::configure('pgsql:dbname=quinua;host=168.121.220.36;');
ORM::configure('username', 'postgres');
ORM::configure('password', 'ulima');
ORM::configure('port', '5432');

//ORM::configure('sqlite:./db/db_quinua.db');
//ORM::configure('sqlite:./db/db_tokens.db', null, 'tokens');
ORM::configure('pgsql:dbname=dc8kfe3kkehphc;host=ec2-23-23-221-255.compute-1.amazonaws.com;', 'tokens');
ORM::configure('username', 'ekkabwlszqifss');
ORM::configure('password', '2781d95a789ed3939c85ee2ff3f0552cade3fdbc072d8ab2cd59f48261261ddc');
ORM::configure('port', '5432');

ORM::configure('return_result_sets', true);
ORM::configure('error_mode', PDO::ERRMODE_WARNING);
ORM::configure('sqlite:./db/db_tokens.db', null, 'tokens');
ORM::configure('return_result_sets', true);
ORM::configure('error_mode', PDO::ERRMODE_WARNING);

// FUENTE: http://idiorm.readthedocs.io/en/latest/configuration.html | http://paris.readthedocs.io/en/latest/configuration.html

?>
