<?php

class UsuarioController extends Controller
{
   	public static function acceder()
   	{
   		# demo POST : http://localhost/quinua-php/usuario/acceder?usuario=yacky&contrasenia=koki123
		$usuario = Flight::request()->query['usuario'];
		$contrasenia = Flight::request()->query['contrasenia'];
		$cantidad = Model::factory('Usuario')->where(array('username' => $usuario, 'password' => $contrasenia))->find_array();

		if(intval($cantidad) >= 1){
			echo "existe";
		}else{
			echo "no existe";
		}
   	}
}

?>
