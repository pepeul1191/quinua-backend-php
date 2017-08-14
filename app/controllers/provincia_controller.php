<?php

class ProvinciaController extends Controller
{
  public static function guardar()
	{
		$data = json_decode(Flight::request()->query['data']);
		$nuevos = $data->{'nuevos'};
		$editados = $data->{'editados'};
		$eliminados = $data->{'eliminados'};
		$rpta = []; $array_nuevos = [];

    try {
			if(count($nuevos) > 0){
				foreach ($nuevos as &$nuevo) {
				    $id_generado = self::crear($nuevo->{'nombre'});
				    $temp = [];
				    $temp['temporal'] = $nuevo->{'id'};
	              $temp['nuevo_id'] = $id_generado;
	              array_push( $array_nuevos, $temp );
				}
			}
			if(count($editados) > 0){
				foreach ($editados as &$editado) {
					self::editar($editado->{'id'}, $editado->{'nombre'});
				}
			}
			if(count($eliminados) > 0){
				foreach ($eliminados as &$eliminado) {
			    	self::eliminar((int)$eliminado);
				}
			}
			$rpta['tipo_mensaje'] = 'success';
        	$rpta['mensaje'] = ['Se ha registrado los cambios en los provincias', $array_nuevos];
		} catch (Exception $e) {
		    #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $rpta['tipo_mensaje'] = 'error';
        	$rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de provincias', $e->getMessage()];
		}

		echo json_encode($rpta);
	}

    public static function listar($departamento_id)
    {
      echo json_encode(Model::factory('Provincia')->select('id')->select('nombre')->where('departamento_id', $departamento_id)->find_array());
    }

    public static function crear($nombre)
    {
    	$provincias = Controller::load_model('provincias');
		return $provincias->crear($nombre);
    }

    public static function editar($id, $nombre)
    {
    	$provincias = Controller::load_model('provincias');
		$provincias->editar($id, $nombre);
    }

    public static function eliminar($id)
    {
    	$provincias = Controller::load_model('provincias');
		$provincias->eliminar($id);
    }
}

?>
