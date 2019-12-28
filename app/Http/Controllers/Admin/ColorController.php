<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.colores.index', [
            'colores' => Color::all()
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
        $color = new Color;
        $color->descripcion = $request->descripcion;
        $color->save();

        Session::flash('success', 'El color se ha guardado correctamente.');
        return redirect()->route('colores.index');
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
        return view('back_end.colores.edit', [
            'color' => Color::find($id)
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
        $color = Color::find($id);
        $color->descripcion = $request->descripcion;
        $color->update();

        Session::flash('success', 'El color se ha actualizado correctamente.');
        return redirect()->route('colores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->estatus = 'I';
        $color->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('colores.index');
    }

    public function restore ($id)
    {
        $color = Color::find($id);
        $color->estatus = 'A';
        $color->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('colores.index');
    }
}
