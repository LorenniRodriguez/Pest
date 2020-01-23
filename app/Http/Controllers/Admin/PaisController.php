<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Pais;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.paises.index', [
            'paises' => Pais::all()
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
          $this->validate($request, [
            'descripcion' => 'required'
        ]);

        $pais = new Pais;
        $pais->descripcion = $request->descripcion;
        $pais->save();

        Session::flash('success', 'El país se ha guardado correctamente.');
        return redirect()->route('paises.index');
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
        return view('back_end.paises.edit', [
            'pais' => Pais::find($id)
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
        $pais = Pais::find($id);
        $pais->descripcion = $request->descripcion;
        $pais->update();

        Session::flash('success', 'El país se ha actualizado correctamente.');
        return redirect()->route('paises.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = Pais::find($id);
        $pais->estatus = 'I';
        $pais->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('paises.index');
    }

    public function restore ($id)
    {
        $pais = Pais::find($id);
        $pais->estatus = 'A';
        $pais->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('paises.index');
    }
}
