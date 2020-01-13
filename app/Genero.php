<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
  protected $table = 'generos';

  protected $primaryKey = 'id_genero';

  //Relaciones entre modelos

  public function generos ()
	{
		return $this->hasMany('App\Cliente');
	}
}
