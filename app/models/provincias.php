<?php

class Provincias extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crear($nombre)
	{
		$provincias = ORM::for_table('provincias')->create();
		$provincias->set('nombre', $nombre);
		$provincias->save();

		return $provincias->id();
	}

	public function editar($id, $nombre)
	{
		$provincias = ORM::for_table('provincias')->where_equal('id', $id)->find_one();
		$provincias->set('nombre', $nombre);
		$provincias->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('provincias')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar($departamento_id)
	{
		return ORM::for_table('provincias')->select('id')->select('nombre')->where('departamento_id', $departamento_id)->find_array();
	}
}

?>
