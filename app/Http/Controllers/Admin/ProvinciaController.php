<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Pais;
use App\Provincia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.provincias.index', [
            'paises' => Pais::where('estatus', '=', 'A')->get(),
            'provincias' => Provincia::all()
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
        //   $this->validate($request, [
        //     'id_provincia' => 'required',
        //     'descripcion' => 'required'
        // ]);

        $provincia = new Provincia;
        $provincia->id_pais = $request->id_pais;
        $provincia->descripcion = $request->descripcion;
        $provincia->save();

        Session::flash('success', 'La provincia se ha guardado correctamente.');
        return redirect()->route('provincias.index');
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
        return view('back_end.provincias.edit', [
            'paises' => Pais::where('estatus', '=', 'A')->get(),
            'provincia' => Provincia::find($id)
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
        $provincia = Provincia::find($id);
        $provincia->id_pais = $request->id_pais;
        $provincia->descripcion = $request->descripcion;
        $provincia->save();

        Session::flash('success', 'La provincia se ha actualizado correctamente.');
        return redirect()->route('provincias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provincia = Provincia::find($id);
        $provincia->estatus = 'I';
        $provincia->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('provincias.index');
    }

    public function restore ($id)
    {
        $provincia = Provincia::find($id);
        $provincia->estatus = 'A';
        $provincia->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('provincias.index');
    }
}
