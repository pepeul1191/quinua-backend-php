# Accesos SQLite - PP

### Tecnologías

+ PHP (5.3+)
+ SQLite3
+ Composer

### Instalación - Despliegue

 	$ composer install && composer update

### Para recargar el autoload de clases:

 	$ composer dump-autoload -o

 Thanks/Credits

    Pepe Valdivia: developer Software Web Perú [http://softweb.pe]

### Descipción

Servicio web desarrollado en PHP usando el framework FlightPHP, con patrones de diseño front-controller y distpacher y la interfaz de Idiorm para interactuar con la base de datos.

### Rutas

	+ GET -> /', IndexController#index
	+ GET -> /error/404', ErrorController#error_404
	+ GET -> /estacion/listar', EstacionController#listar
	+ GET -> /estacion/detalle/@id', EstacionController#detalle
	+ GET -> /sensor/historico/@id', SensorController#historico
	+ GET -> /token/obtener', TokenController#obtener
	+ POST -> /usuario/acceder', UsuarioController#acceder
--- 

#### Fuentes

IDIORM y PARIS - ORM a la base de datos

+ http://idiorm.readthedocs.io/
+ http://paris.readthedocs.io/en/latest/index.html
	
Framework FlightPHP :

+ http://flightphp.com/

Composer :
+ http://phpenthusiast.com/blog/how-to-autoload-with-composer