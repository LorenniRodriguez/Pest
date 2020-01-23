<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
    protected $table = 'Hospedajes';

    protected $primaryKey = 'id_hospedaje';

    protected $fillable = ['id_mascota', 'id_jaula', 'id_usuario', 'id_tipo_hospedaje', 'fecha_inicio', 'fecha_final','asuntos', 'estatus', 'fecha_registro', 'finalizado_por', 'fecha_entrega'];

    public $timestamps = false;

    //Relaciones entre modelos
    public function  mascota ()
    {
        return $this->belongsTo('App\Mascota', 'id_mascota');
    }

    public function jaula ()
    {
        return $this->belongsTo('App\Jaula', 'id_jaula');
    }

    public function usuario ()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function TipoHospedaje ()
    {
        return $this->belongsTo('App\TipoHospedaje', 'id_tipo_hospedaje');
    }

    public function finalizadoPor ()
    {
        return $this->belongsTo('App\User', 'finalizado_por');
    }

    public function borradoPor ()
    {
        return $this->belongsTo('App\User', 'borrado_por');
    }

    public function hospedajeDescripcion ()
    {
        return $this->belongsTo('App\TipoHospedaje', 'descripcion');
    }

    public function jaulaDescripcion ()
    {
        return $this->belongsTo('App\Jaula', 'descripcion');
    }

    public function adoptadaPor ()
    {
        return $this->hasMany('App\ClienteMascota', 'id_mascota')
        ->where('estatus', '=', 'A');
    }

    // Assessors
    public function getFechaRegistroAttribute ($fecha_registro)
    {
        $fecha = new \DateTime($fecha_registro);

        return $fecha->format('d-m-Y');
    }

    public function getFechaFinalAttribute ($fecha_final)
    {
        $fecha = new \DateTime($fecha_final);

        return $fecha->format('d-m-Y');
    }

    public function getDiasRestantesAttribute ()
    {
        $fecha_final = new \DateTime($this->fecha_final);
        $fecha_hoy = new \DateTime(date('d-m-Y'));

        return $fecha_hoy->diff($fecha_final)->format('%R%a');
    }
}