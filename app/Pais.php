<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';
	protected $primaryKey = 'id_pais';

	protected $fillable = ['descripcion'];
  	public $timestamps = false;


  	public function provincias ()
  	{
  		return $this->hasMany('App\Provincia');
  	}
}
