<?php
namespace App;

use Illuminate\Database\Eloquent\model;

class Empleado extends Model {

	protected $table = 'empleados';

	protected $primaryKey = 'id_empleado';

	protected $fillable = ['', '', ''];

	public $timestamps = false;

}