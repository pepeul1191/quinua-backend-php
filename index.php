<?php

require 'app/vendor/autoload.php';
require_once 'app/config/database.php';

header('x-powered-by: PHP');
header('Server: Ubuntu');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-type: text/html; charset=UTF-8');

Configuration::init( realpath(dirname(__FILE__)) . '/app/', 'http://localhost/ubicaciones/');

Flight::route('GET /', array('IndexController','index'));
Flight::route('GET /error/404', array('ErrorController','error_404'));

Flight::route('GET /estacion/listar', array('EstacionController','listar'));
Flight::route('GET /estacion/detalle/@id', array('EstacionController','detalle'));
Flight::route('GET /sensor/historico/@id', array('SensorController','historico'));
Flight::route('POST /usuario/acceder', array('UsuarioController','acceder'));

Flight::map('notFound', function(){
	header('HTTP/1.0 404 Not Found');
	Flight::redirect('/error/404');
});

Flight::start();

?>
