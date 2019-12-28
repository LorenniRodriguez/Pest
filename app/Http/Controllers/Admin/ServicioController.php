<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Servicio;
use App\TipoServicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.servicios.index', [
            'servicios' => Servicio::all(),
            'tipo_servicios' => TipoServicio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servicio = new Servicio;
        $servicio->id_tipo_servicio = $request->id_tipo_servicio;
        $servicio->descripcion = $request->descripcion;
        $servicio->save();

        Session::flash('success', 'El servicio se ha guardado correctamente.');
        return redirect()->route('servicios.index');
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
        return view('back_end.servicios.edit', [
            'servicio' => Servicio::find($id),
            'tipo_servicios' => TipoServicio::all()
        ]);
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
        $servicio = Servicio::find($id);
        $servicio->id_tipo_servicio = $request->id_tipo_servicio;
        $servicio->descripcion = $request->descripcion;
        $servicio->update();

        Session::flash('success', 'El servicio se ha actualizado correctamente.');
        return redirect()->route('servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->estatus = 'I';
        $servicio->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('servicios.index');
    }

    public function restore ($id)
    {
        $servicio = Servicio::find($id);
        $servicio->estatus = 'A';
        $servicio->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('servicios.index');
    }
}
