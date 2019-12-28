<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $table = 'colores';
	protected $primaryKey = 'id_color';

	protected $fillable = ['descripcion'];
  	public $timestamps = false;


	public function mascotas ()
	{
		return $this->hasMany('App\Mascota');
	}
}