<?php

class Distritos extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crear($nombre)
	{
		$distritos = ORM::for_table('distritos')->create();
		$distritos->set('nombre', $nombre);
		$distritos->save();

		return $distritos->id();
	}

	public function editar($id, $nombre)
	{
		$distritos = ORM::for_table('distritos')->where_equal('id', $id)->find_one();
		$distritos->set('nombre', $nombre);
		$distritos->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('distritos')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar($provincia_id)
	{
		return ORM::for_table('distritos')->select('id')->select('nombre')->where('provincia_id', $provincia_id)->find_array();
	}
}

?>
