<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    public function dashboard ()
    {
    	return view('back_end.dashboard', [
    		'mascotas' => \App\Mascota::where('estatus', '=', 'A')->count(),
    		'clientes' => \App\Cliente::where('estatus', '=', 'A')->count(),
    		'citas' => \App\Cita::whereRaw("estatus = 'A' AND fecha_atendida IS NULL")->count()
    	]);
    }
}