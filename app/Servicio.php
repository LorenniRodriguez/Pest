<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
	protected $primaryKey = 'id_servicio';

	protected $fillable = ['id_tipo_servicio', 'descripcion'];
  	public $timestamps = false;


  	public function tipoServicio ()
  	{
  		return $this->belongsTo('App\TipoServicio', 'id_tipo_servicio');
  	}
}
