<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteMascota extends Model
{
    protected $table = 'cliente_mascota';
	protected $primaryKey = 'id_cliente_mascota';


	protected $fillable = ['id_mascota', 'id_cliente','id_usuario', 'es_adopcion', 'registrado_por','borrado_por', 'fecha_conclusion'];
	public $timestamps = false;

	//Relaciones entre modelos

	public function mascota ()
	{
		return $this->belongsTo('App\Mascota', 'id_mascota');
	}

	public function cliente ()
	{
		return $this->belongsTo('App\Cliente', 'id_cliente');
	}

	public function usuario ()
	{
		return $this->belongsTo('App\User', 'id_usuario');
	}

	public function registradoPor ()
    {
        return $this->belongsTo('App\User', 'registrado_por');
    }

    public function borradoPor ()
    {
        return $this->belongsTo('App\User', 'borrado_por');
    }

	 //Assessors
    public function getFechaRegistroAttribute ($fecha_registro)
    {
        $fecha = new \DateTime($fecha_registro);

        return $fecha->format('d-m-Y');
    }

     public function getFechaConclusion ($fecha_conclusion)
    {
        $fecha = new \DateTime($fecha_conclusion);

        return $fecha->format('d-m-Y');
    }

        public function getFechaFinalAttribute ($fecha_final)
    {
        $fecha = new \DateTime($fecha_conclusion);

        return $fecha->format('d-m-Y');
    }

    
}