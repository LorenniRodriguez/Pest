<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Vacuna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.vacunas.index', [
            'vacunas' => Vacuna::all()
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
        $vacuna = new Vacuna;
        $vacuna->descripcion = $request->descripcion;
        $vacuna->para_gatos = $request->para_gatos;
        $vacuna->para_perros = $request->para_perros;
        $vacuna->save();

        Session::flash('success', 'La vacuna se ha guardado correctamente.');
        return redirect()->route('vacunas.index');
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
        return view('back_end.vacunas.edit', [
            'vacuna' => Vacuna::find($id)
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
        $vacuna = Vacuna::find($id);
        $vacuna->descripcion = $request->descripcion;
        $vacuna->para_gatos = $request->para_gatos;
        $vacuna->para_perros = $request->para_perros;
        $vacuna->update();

        Session::flash('success', 'La vacuna se ha actualizado correctamente.');
        return redirect()->route('vacunas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacuna = Vacuna::find($id);
        $vacuna->estatus = 'I';
        $vacuna->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('vacunas.index');
    }

    public function restore ($id)
    {
        $vacuna = Vacuna::find($id);
        $vacuna->estatus = 'A';
        $vacuna->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('vacunas.index');
    }
}
