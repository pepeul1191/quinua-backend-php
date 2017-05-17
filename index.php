<?php

require 'app/vendor/autoload.php';

header('x-powered-by: PHP');
header('Server: Ubuntu');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=UTF-8');

Configuration::init( realpath(dirname(__FILE__)) . '/app/', 'http://localhost/ubicaciones/', realpath(dirname(__FILE__) . '/db/' . 'db_ubicaciones.db'));

Flight::route('GET /', array('Controller_Index','index'));
Flight::route('GET /error/404', array('Controller_Error','error_404'));

Flight::route('GET /departamento/listar', array('Controller_Departamento','listar'));
Flight::route('POST /departamento/guardar', array('Controller_Departamento','guardar'));

Flight::route('GET /provincia/listar/@departamento_id', array('Controller_Provincia','listar'));
Flight::route('POST /provincia/guardar', array('Controller_Provincia','guardar'));

Flight::route('GET /distrito/listar/@provincia_id', array('Controller_Distrito','listar'));
Flight::route('POST /distrito/guardar', array('Controller_Distrito','guardar'));

/*Flight::map('notFound', function(){
	Flight::redirect('/error/404');
});*/

Flight::start();

?>
