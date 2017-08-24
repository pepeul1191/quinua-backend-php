<?php

class UsuarioController extends Controller
{
   	public static function acceder()
   	{
   		# demo POST : http://localhost/quinua-php/usuario/acceder?usuario=yacky&contrasenia=koki123
		$usuario = Flight::request()->query['usuario'];
		$contrasenia = Flight::request()->query['contrasenia'];
		$cantidad = Model::factory('Usuario')->where(array('username' => $usuario, 'password' => $contrasenia))->find_array();
		$rpta = null;

		if(intval($cantidad) >= 1){
			$token = null;
			$temp = ORM::for_table('tokens')->where(array('usuario' => $usuario))->find_array();
			if(intval($temp) == 1){
				$token = $temp[0]['token'];
			}else{
				$token = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(50/strlen($x)) )),1,35);
				$new_token = ORM::for_table('tokens')->create();
				$new_token->set('usuario', $usuario);
				$new_token->set('token', $token);
				$new_token->save();
			}
			$rpta = array("existe"=> 1, "token"=> $token);
		}else{
			$rpta['existe'] = 0;
		}

		echo json_encode($rpta);
   	}
}

?>
