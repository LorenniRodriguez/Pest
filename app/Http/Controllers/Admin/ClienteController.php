<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Cliente;
use App\Pais;
use App\Provincia;
use App\Genero;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('back_end.clientes.index')
            ->with([
                'clientes' => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('back_end.clientes.create', [

              'paises' => Pais::all(),
              'provincias' => Provincia::all(),
              'generos' => Genero::all()
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
         $this->validate($request, [

            'nombres'      => 'required',
            'apellidos'    => 'required'
    
        ]);
    

        $cliente = Cliente::create($request->only('nombres', 'apellidos','edad', 'direccion', 'cedula', 'telefono','celular', 'correo', 
            'id_provincia','id_genero', 'id_pais'));

        Session::flash('success', 'El Cliente se ha guardado correctamente.');
        return redirect()->route('clientes.index');

          //echo '<pre>';
          //var_dump($request->all());
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
    public function edit(Cliente $cliente)
    {
        return view('back_end.clientes.edit') -> with([
            'cliente' => $cliente, 
            'paises' => Pais::all(),
            'provincias' => Provincia::all(),
            'generos' => Genero::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $cliente, Request $request)
    {
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->edad = $request->edad;
        $cliente->direccion = $request->direccion;
        $cliente->cedula = $request->cedula;
        $cliente->telefono = $request->telefono;
        $cliente->celular = $request->celular;
        $cliente->correo = $request->correo;
        $cliente->id_provincia = $request->id_provincia;
        $cliente->id_genero = $request->id_genero;
        $cliente->id_pais = $request->id_pais;
        $cliente->update();

        Session::flash('success', 'El cliente se ha actualizado correctamente.');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->estatus = 'I';
        $cliente->update();

        Session::flash('success', 'El registro se ha enviado a la papelera correctamente.');
        return redirect()->route('clientes.index');
    }

    public function restore (Cliente $cliente)
    {
        $cliente->estatus = 'A';
        $cliente->update();

        Session::flash('success', 'El registro se ha sido restaurado correctamente.');
        return redirect()->route('clientes.index');
    }
}
