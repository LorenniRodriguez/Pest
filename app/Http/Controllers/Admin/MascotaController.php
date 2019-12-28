<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Raza;
use App\Color;
use App\Mascota;
use App\Estatura;
use App\Tipomascota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.mascotas.index')
            ->with([
                'mascotas' => Mascota::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.mascotas.create', [
            'razas' => Raza::all(),
            'estaturas' => Estatura::all(),
            'tipo_mascotas' => Tipomascota::all(),
            'colores'=> Color::all()
        
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
        //echo '<pre>';
        //var_dump($request->all()); //Lee la data que trae la vista

         $this->validate($request, [

            'nombre'      => 'required|min:1|max:30',
            'edad'        => 'required',
            'peso'        => 'required',
            'id_raza'     => 'required',
            'id_estatura' => 'required',
            'id_color'    => 'required'
        ]);
        
        $mascota = Mascota::create($request->only('nombre', 'edad', 'peso', 'id_raza', 'id_estatura',
            'id_tipo_mascota', 'id_color'));

        //echo '<pre>';
        //var_dump($mascota);

        Session::flash('success', 'La mascota se ha guardado correctamente.');
        return redirect()->route('mascotas.index');
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
    public function edit(Mascota $mascota)
    {
        return view('back_end.mascotas.edit')->with([
            'mascota' => $mascota, 
            'razas' => Raza::all(),
            'estaturas' => Estatura::all(),
            'tipo_mascotas' => Tipomascota::all(),
            'colores'=> Color::all()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Mascota $mascota, Request $request)
    {
        $mascota->nombre = $request->nombre;
        $mascota->edad   = $request->edad;
        $mascota->peso   = $request->peso;
        $mascota->id_raza = $request->id_raza;
        $mascota->id_estatura = $request->id_estatura;
        $mascota->id_color = $request->id_color;
        $mascota->update();

        Session::flash('success', 'La mascota se ha actualizado correctamente.');
        return redirect()->route('mascotas.index');

        //echo '<pre>';
        //var_dump($request->all());


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->estatus = 'I';
        $mascota->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('mascotas.index');
    }


    public function restore (Mascota $mascota)
    {
        $mascota->estatus = 'A';
        $mascota->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('mascotas.index');
    }
}