<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatura extends Model
{
	protected $table = 'estaturas';
	protected $primaryKey = 'id_estatura';

	public function mascotas ()
	{
		return $this->hasMany('App\Mascota');
	}
}
