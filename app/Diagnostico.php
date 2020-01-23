<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
	protected $table = 'diagnosticos';
	protected $primaryKey = 'id_diagnostico';

	protected $fillable = ['id_mascota','descripcion'];

	public $timestamps = false;

	//Relaciones entre modelos

	public function mascota ()
	{
		return $this->belongsTo('App\Mascota', 'id_mascota');
	}

    // Assessors

	public function getFechaRegistroAttribute ($fecha_registro)
	{
		$fecha = new \DateTime($fecha_registro);

		return $fecha->format('d-m-Y');
	}


}
