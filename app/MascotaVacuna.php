<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;

class MascotaVacuna extends Model
{
    protected $table = 'mascota_vacuna';
	protected $primaryKey = 'id_mascota_vacuna';

	protected $fillable = ['id_mascota', 'id_vacuna', 'id_usuario'];
	public $timestamps = false;


	// Relaciones entre modelos
	public function mascota ()
	{
		return $this->belongsTo('App\Mascota', 'id_mascota');
	}

	public function vacuna ()
	{
		return $this->belongsTo('App\Vacuna', 'id_vacuna');
	}

	public function usuario ()
	{
		return $this->belongsTo('App\User', 'id_usuario');
	}

	// Assessors
    public function getFechaRegistroAttribute ($fecha_registro)
    {
        $fecha = new \DateTime($fecha_registro);

        return $fecha->format('d-m-Y');
    }
}
