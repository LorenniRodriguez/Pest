<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';
	protected $primaryKey = 'id_provincia';

	protected $fillable = ['id_pais', 'descripcion'];
  	public $timestamps = false;


  	public function pais ()
  	{
  		return $this->belongsTo('App\Pais', 'id_pais');
  	}
}
