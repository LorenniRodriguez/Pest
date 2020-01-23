<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $primaryKey = 'id_post';

    protected $fillable = ['titulo', 'descripcion', 'imagen', 'borrado_por'];

    public $timestamps = false;

    //realicones entre modelos

    public function borradoPor ()
    {
        return $this->belongsTo('App\User', 'borrado_por');
    }

    // Assessors
    public function getFechaRegistroAttribute ($fecha_publicacion)
    {
        $fecha = new \DateTime($fecha_publicacion);

        return $fecha->format('d-m-Y');
    }
}
