<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jaula extends Model
{
    protected $table = 'jaulas';
	protected $primaryKey = 'id_jaula';

	protected $fillable = ['descripcion'];
  	public $timestamps = false;
}
