<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Jaula;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JaulaController extends Controller
{
    public function index()
    {
        return view('back_end.jaulas.index', [
            'jaulas' => Jaula::all()
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
           'descripcion' => 'required|min:2|max:50|unique:jaulas,descripcion'
           
        ],

        [
            'descripcion.min' => 'El campo descripción debe contener más de 2 caracteres.',
            'descripcion.max' => 'El campo descripción debe contener menos de 50 caracteres.',
            'descripcion.unique' => 'La jaula ingresada ya existe.'
        ]
    );

         $this->validate($request, [
            'descripcion' => 'required'
        ]);

        $jaula = new Jaula;
        $jaula->descripcion = $request->descripcion;
        $jaula->save();

        Session::flash('success', 'La jaula se ha guardado correctamente.');
        return redirect()->route('jaulas.index');
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
        return view('back_end.jaulas.edit', [
            'jaula' => Jaula::find($id)
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

      $this->validate($request, [
           'descripcion' => 'required|min:2|max:50|unique:jaulas,descripcion'
           
        ],

        [
            'descripcion.min' => 'El campo descripción debe contener más de 2 caracteres.',
            'descripcion.max' => 'El campo descripción debe contener menos de 50 caracteres.',
            'descripcion.unique' => 'La jaulas ingresada ya existe.'
        ]
    );

        $jaula = Jaula::find($id);
        $jaula->descripcion = $request->descripcion;
        $jaula->update();

        Session::flash('success', 'La jaula se ha actualizado correctamente.');
        return redirect()->route('jaulas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jaula = Jaula::find($id);
        $jaula->estatus = 'I';
        $jaula->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('jaulas.index');
    }

    public function restore ($id)
    {
        $jaula = Jaula::find($id);
        $jaula->estatus = 'A';
        $jaula->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('jaulas.index');
    }
}
