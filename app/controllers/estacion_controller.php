<?php

class EstacionController extends Controller
{
   	public static function listar()
   	{
   		echo json_encode(Model::factory('Estacion')->find_array());
   	}

	public static function detalle($id)
	{
		$rs = ORM::get_db()->prepare(
				'SELECT IE.nombre_estacion, II.ide_sensor, IE.descripcion, II.nombre_sensor, II.desc_instrumento, MTT.des_tipo FROM inve_estacion IE 
				INNER JOIN inve_estacion_instru IEI ON IE.ide_estacion = IEI.ide_estacion 
				INNER JOIN inve_instru II ON II.ide_sensor = IEI.ide_sensor 
				INNER JOIN mae_tablatipo_tipo MTT ON MTT.ide_tipo = II.fk_tipo_unidad_medida 
				WHERE IEI.ide_estacion = '. $id
			);
		$rs->execute();
		$estaciones = $rs->fetchAll();
		
		$sensores = array();
		foreach ($estaciones as &$estacion) {
			var_dump($estacion['nombre_sensor']);
		    $temp = array(
		    		"nombre_sensor"=> $estacion['nombre_sensor'], 
		    		"desc_instrumento"=> $estacion['desc_instrumento'], 
		    		"des_tipo"=> $estacion['des_tipo'], 
		    		"ide_sensor"=> $estacion['ide_sensor'], 
				);
		    array_push($sensores, $temp);
		}

		$rpta = array(
		    		"nombre_estacion"=> $estaciones[0]['nombre_estacion'], 
		    		"descripcion"=> $estaciones[0]['descripcion'], 
		    		"sensores"=> $sensores 
			);

		echo json_encode($rpta);
	}

}

?>
