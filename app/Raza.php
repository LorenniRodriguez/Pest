<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
	protected $table = 'razas';
	protected $primaryKey = 'id_raza';
	public $timestamps = false;
  
  	protected $fillable = ['descripcion'];

  	public function mascotas ()
	{
		return $this->hasMany('App\Mascota');
	}
}