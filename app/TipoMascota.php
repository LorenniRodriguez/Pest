<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMascota extends Model
{
	protected $table = 'tipo_mascotas';
	protected $primaryKey = 'id_tipo_mascota';


	public function mascotas ()
	{
		return $this->hasMany('App\Mascota');
	}
}