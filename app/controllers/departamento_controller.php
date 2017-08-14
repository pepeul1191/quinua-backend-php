<?php

class DepartamentoController extends Controller
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
				    $departamento = Model::factory('User')->create();
					 $departamento->nombre = $nuevo->{'nombre'};
					 $departamento->save();
					 $id_generado = $departamento->id();
				    $temp = [];
				    $temp['temporal'] = $nuevo->{'id'};
	             $temp['nuevo_id'] = $id_generado;
	             array_push( $array_nuevos, $temp );
				}
			}
			if(count($editados) > 0){
				foreach ($editados as &$editado) {
					$departamento = Model::factory('Departamento')->find_one($editado->{'id'});
					$departamento->nombre = $editado->{'nombre'};
					$departamento->save();
				}
			}
			if(count($eliminados) > 0){
				foreach ($eliminados as &$eliminado) {
			    	$departamento = Model::factory('Departamento')->find_one($eliminado);
					$departamento->delete();
				}
			}
			$rpta['tipo_mensaje'] = 'success';
        	$rpta['mensaje'] = ['Se ha registrado los cambios en los departamentos', $array_nuevos];
		} catch (Exception $e) {
		    #echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    $rpta['tipo_mensaje'] = 'error';
        	$rpta['mensaje'] = ['Se ha producido un error en guardar la tabla de departamentos', $e->getMessage()];
		}

		echo json_encode($rpta);
	}

    public static function listar()
    {
      echo json_encode(Model::factory('Departamento')->find_array());
    }

    public static function crear($nombre)
    {
    	$departamentos = Controller::load_model('departamentos');
		return $departamentos->crear($nombre);
    }
}

?>
