<?php
namespace App;

use Illuminate\Database\Eloquent\model;

class Mascota extends Model
{
    protected $table = 'mascotas';
    protected $primaryKey = 'id_mascota';

    protected $fillable = ['nombre', 'edad', 'peso', 'id_raza', 'id_estatura','id_tipo_mascota', 'id_color','fecha_nacimiento'];
    
    public $timestamps = false;


    // Relaciones entre modelos
    public function tipoMascota ()
    {
        return $this->belongsTo('App\TipoMascota', 'id_tipo_mascota');
    }

    public function raza ()
    {
        return $this->belongsTo('App\Raza', 'id_raza');
    }

    public function color ()
    {
        return $this->belongsTo('App\Color', 'id_color');
    }

    public function estatura ()
    {
        return $this->belongsTo('App\Estatura', 'id_estatura');
    }

    // Assessors
    public function getFechaRegistroAttribute ($fecha_registro)
    {
        $fecha = new \DateTime($fecha_registro);

        return $fecha->format('d-m-Y');
    }

    public function getFechaNacimientoAttribute ($fecha_nacimiento)
    {
        $fecha = new \DateTime($fecha_nacimiento);

        return $fecha->format('d-m-Y');
    }
}