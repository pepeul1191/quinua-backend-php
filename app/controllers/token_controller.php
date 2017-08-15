<?php

class TokenController extends Controller
{
   	public static function obtener()
   	{
		$usuario = Flight::request()->query['usuario'];
		$temp = ORM::for_table('tokens', 'tokens')->where(array('usuario' => $usuario))->find_array();
		$rpta = null;
		
		if(intval($temp) == 1){
			$rpta = $temp[0]['token'];
		}else{
			$rpta = array("tipo_mensaje"=> 'warning', "mensaje"=> 'usuario no encontrado');
		}

		echo json_encode($rpta);
   	}
}

?>
