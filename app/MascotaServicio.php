<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MascotaServicio extends Model
{
    protected $table = 'mascota_servicio';
    protected $primaryKey = 'id_mascota_servicio';

    protected $fillable = ['id_servicio', 'id_mascota', 'id_usuario', ];
    public $timestamps = false;

    public function servicio ()
	{
		return $this->belongsTo('App\servicio', 'id_servicio');
	}

	public function mascota ()
	{
		return $this->belongsTo('App\Mascota', 'id_mascota');
	}

	public function usuario ()
	{
		return $this->belongsTo('App\User', 'id_usuario');
	}

	public function servicioDescripcion ()

	{
		return $this->belongsTo('App\Servicio', 'descripcion');
	}

	public function mascotaNombre ()
	{
		return $this->belongsTo('App\Mascota', 'nombre');
	}
	

	// Assessors

	public function getFechaRegistroAttribute ($fecha_registro)
    {
        $fecha = new \DateTime($fecha_registro);

        return $fecha->format('d-m-Y');
    }

}
