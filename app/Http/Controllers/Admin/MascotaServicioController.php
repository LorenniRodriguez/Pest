<?php

namespace App\Http\Controllers\Admin;

use \DB;
use \Auth;
use Session;
use App\MascotaServicio;
use App\Mascota;
use App\Servicio;
use App\TipoServicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MascotaServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('back_end.mascota_servicio.index', [
            'mascota_servicios' => MascotaServicio::whereRaw("estatus = 'A' ")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.mascota_servicio.create', [

            'mascotas' => Mascota::where('estatus', '=', 'A')->get(),

            'servicios' => Servicio::where('estatus', '=', 'A')->get()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mascota_servicio = new MascotaServicio;

        $mascota_servicio->id_mascota = $request->id_mascota;
        $mascota_servicio->id_servicio = $request->id_servicio;
        $mascota_servicio->id_usuario = Auth::user()->id;
        $mascota_servicio-> save();

        Session::flash('success', 'El servicio se ha registrado correctamente.');
         return redirect()->route('mascota_servicio.index');
        echo '<pre>';
        var_dump($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
