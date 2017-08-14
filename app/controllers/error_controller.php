<?php

class ErrorController extends Controller
{
    public static function error_404()
    {
      $rpta['tipo_mensaje'] = 'error';
      $rpta['mensaje'] = ['Error 404 : Recurso no encontrado', '404'];

		Flight::json($rpta, $code = 404);
    }
}

?>