<?php

namespace App;

use \DateTime;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';

    protected $fillable = ['id_usuario', 'id_mascota', 'id_vacuna', 'id_usuario_atendio', 'fecha_atendida', 'fecha_cita'];
    public $timestamps = false;


    // relaciones entre modelos
    public function usuario ()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function atendidoPor ()
    {
        return $this->belongsTo('App\User', 'id_usuario_atendio');
    }

    public function canceladaPor ()
    {
        return $this->belongsTo('App\User', 'borrado_por');
    }

    public function mascota ()
    {
        return $this->belongsTo('App\Mascota', 'id_mascota');
    }

    public function vacuna ()
    {
        return $this->belongsTo('App\Vacuna', 'id_vacuna');
    }


    // Assessors
    public function getFechaCitaAttribute ($fecha_cita)
    {
        $fecha = new DateTime($fecha_cita);

        return $fecha->format('d-m-Y');
    }

    public function getFechaAtendidaAttribute ($fecha_atendida)
    {
        if($fecha_atendida != null)
        {
            $fecha = new DateTime($fecha_atendida);
            
            return $fecha->format('d-m-Y');
        }

        return null;
    }

    public function getDiasRestantesAttribute ()
    {
        $fecha_cita = new DateTime($this->fecha_cita);
        $fecha_hoy = new DateTime();

        return $fecha_hoy->diff($fecha_cita)->format('%R%a días');
    }
}
