<?php

class SensorController extends Controller
{
	public static function historico($id)
	{
		// demo sqlite : http://BASE_URL:3000/sensor/historico/1?fecha_inicio=2017-02-01&fecha_fin=2017-02-10
		// demo postgres : http://localhost:3000/sensor/historico/1?fecha_inicio=2017-01-01&fecha_fin=2017-08-10

		$fecha_inicio = Flight::request()->query['fecha_inicio'] . ' 00:00:00';
		$fecha_fin = Flight::request()->query['fecha_fin'] . ' 23:59:59';
		// sqlite
		/*
		$stmt = ORM::get_db()->prepare(
				'SELECT strftime("%d",  fec_med) as dia, strftime("%m",  fec_med) as mes, strftime("%Y",  fec_med) as anio, AVG(valor_med) AS medicion 
                FROM inve_instru_dato 
                WHERE fec_med > strftime("' . $fecha_inicio . '") AND fec_med < strftime("' . $fecha_fin . '") AND ide_sensor = ' . $id . '
                GROUP BY dia;'
               );
               */
		// postgres
               echo "SELECT to_char(fec_med, 'YY') AS anio,to_char(fec_med, 'MM') AS mes, to_char(fec_med, 'DD') AS dia, AVG(valor_med) AS medicion 
                FROM inve_instru_dato 
                WHERE fec_med > '" . $fecha_inicio + "' AND fec_med < '" . $fecha_fin . "' AND ide_sensor = " . $id . " GROUP BY dia, mes, anio ORDER BY anio, mes, dia;";
               exit();
		$stmt = ORM::get_db()->prepare(
				"SELECT to_char(fec_med, 'YY') AS anio,to_char(fec_med, 'MM') AS mes, to_char(fec_med, 'DD') AS dia, AVG(valor_med) AS medicion 
                FROM inve_instru_dato 
                WHERE fec_med > '" . $fecha_inicio + "' AND fec_med < '" . $fecha_fin . "' AND ide_sensor = " . $id . " GROUP BY dia, mes, anio ORDER BY anio, mes, dia;"
               );
		$stmt->execute();
		$detalle = $stmt->fetchAll(PDO::FETCH_CLASS);
		echo json_encode($detalle);
	}

}

?>
