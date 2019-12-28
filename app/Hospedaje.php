<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
     protected $table = 'Clientes';

  protected $primaryKey = 'id_cliente';
  
  protected $fillable = ['id_mascota', 'id_jaula', 'id_usuario', 'tipo_hospedaje', 'Asuntos'];

  public $timestamps = false;
}
