<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Raza;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.razas.index', [
            'razas' => Raza::all()
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
        $raza = new Raza;
        $raza->descripcion = $request->descripcion;
        $raza->save();

        Session::flash('success', 'La raza se ha guardado correctamente.');
        return redirect()->route('razas.index');
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
        return view('back_end.razas.edit', [
            'raza' => Raza::find($id)
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
        $raza = Raza::find($id);
        $raza->descripcion = $request->descripcion;
        $raza->update();

        Session::flash('success', 'La raza se ha actualizado correctamente.');
        return redirect()->route('razas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $raza = Raza::find($id);
        $raza->estatus = 'I';
        $raza->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('razas.index');
    }

    public function restore ($id)
    {
        $raza = Raza::find($id);
        $raza->estatus = 'A';
        $raza->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('razas.index');
    }
}
