<?php
namespace App;

use Illuminate\Database\Eloquent\model;

class Cliente extends Model {

    protected $table = 'clientes';

    protected $primaryKey = 'id_cliente';

    protected $fillable = ['nombres', 'apellidos', 'edad', 'direccion', 'cedula', 'telefono','celular', 'correo', 
    'id_provincia','fecha_registro','id_genero', 'id_pais'];
    public $timestamps = false;


    // Relaciones entre modelos
    public function genero ()
    {
        return $this->belongsTo('App\Genero', 'id_genero');
    }

    public function pais ()
    {
        return $this->belongsTo('App\Pais', 'id_pais');
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
}