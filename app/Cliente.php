<?php
namespace App;

use Illuminate\Database\Eloquent\model;

class Cliente extends Model {

    protected $table = 'clientes';

    protected $primaryKey = 'id_cliente';

    protected $fillable = ['nombres', 'apellidos', 'fecha_nacimiento', 'direccion', 'cedula', 'telefono','celular', 'correo', 
    'id_provincia','fecha_registro','id_genero'];
    public $timestamps = false;


    // Relaciones entre modelos
    public function genero ()
    {
        return $this->belongsTo('App\Genero', 'id_genero');
    }

    public function provincia()
    {
        return $this->belongsTo('App\Provincia', 'id_provincia');
    }

    public function mascota ()
    {
        return $this->hasMany('App\ClienteMascota', 'id_cliente')
            ->where('estatus', '=', 'A');
    }

    public function getnombreCompletoAttribute ()
    {
        return $this->nombres . ' ' . $this->apellidos;
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