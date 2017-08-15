<?php

class EstacionController extends Controller
{
   	public static function listar()
   	{
   		echo json_encode(Model::factory('Estacion')->find_array());
   	}
}

?>
