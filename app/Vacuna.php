<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
	protected $table = 'vacunas';
	protected $primaryKey = 'id_vacuna';

	protected $fillable = ['descripcion', 'para_gatos', 'para_perros'];
  	public $timestamps = false;
}
