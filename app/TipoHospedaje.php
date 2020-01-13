<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHospedaje extends Model
{
    protected $table = 'tipo_hospedajes';
	protected $primaryKey = 'id_tipo_hospedaje';


	public function hospedaje ()
	{
		return $this->hasMany('App\Hospedaje');
	}
}
