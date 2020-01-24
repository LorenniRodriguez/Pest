<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use App\Diagnostico;
use App\Mascota;
use App\MascotaVacuna;
use App\MascotaServicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('back_end.diagnosticos.create', [

        'mascotas' => Mascota::where('estatus', '=', 'A')->get()

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
        
        $diagnostico = new Diagnostico;

        $diagnostico->id_mascota = $request->id_mascota;
        $diagnostico->descripcion = $request->descripcion;
       //$diagnostico->id_usuario = Auth::user()->id;
        $diagnostico->save();

        Session::flash('success', 'El historial clinico se ha guardado correctamente.');
        return redirect()->route('diagnosticos.create');
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

    public function consultar ()
    {
        return view('back_end.diagnosticos.consultar_mascota', [
            'mascotas' => Mascota::where('estatus', '=', 'A')->get()
        ]);
    }

    public function historialMascota (Request $request)
    {
        return view('back_end.diagnosticos.historial_clinico', [
            'mascota' => Mascota::find($request->id_mascota),
            'mascota_vacunas' => MascotaVacuna::where('estatus', '=', 'A')->get(),
            'mascota_servicios' => MascotaServicio::whereRaw("estatus = 'A' and id_mascota = ?", array($request->id_mascota))->get()
        ]);
    }
}
