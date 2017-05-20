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

	public function buscar($texto)
	{
		return ORM::for_table('distritos')->raw_query('
						SELECT id, nombre FROM vw_distrito_provincia_departamento WHERE nombre LIKE :texto LIMIT 0,10;', array('texto' => $texto . '%'))->find_array();
	}

  	public function buscar_vista($distrito_id)
    {
      //return ORM::for_table('distritos')->raw_query('
              //SELECT id, nombre FROM vw_distrito_provincia_departamento WHERE id LIKE :texto LIMIT 0,10;', array('texto' => $texto . '%'))->find_array();
      return ORM::for_table('vw_distrito_provincia_departamento')->select('nombre')->where('id', $distrito_id)->find_array();
    }
}

?>
