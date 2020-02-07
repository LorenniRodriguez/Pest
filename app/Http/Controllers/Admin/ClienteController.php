<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\Rule;
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

        'nombres'      => 'required|min:3|max:50',
        'apellidos'    => 'required|min:3|max:50',
        'fecha_nacimiento' => 'required|date',
        'direccion'    => 'required|min:10|max:100',
        'cedula'       => 'required|min:13|max:13|unique:clientes,cedula', 
        'telefono'     => 'required|min:12|max:12',
        'celular'      => 'required|min:12|max:12',
        'correo'       => 'required|email|unique:clientes,correo',
        'id_provincia' => 'required',
        'id_genero'    => 'required'
    ],

    [
    'nombres.required' => 'El campo nombres es requerido.',
    'nombres.min' => 'El campo nombres debe contener más de 2 caracteres.',
    'nombres.max' => 'El campo nombres debe contener menos de 50 caracteres.',
    
    'apellidos.required' => 'El campo apellido es requerido.',
    'apellido.min' => 'El campo apellido debe contener más de 2 caracteres.',
    'apellido.max' => 'El campo apellido debe contener  menos de 2 caracteres',
    
    'direccion.required' => 'El campo fecha es requerido.',
    'direccion.max' => 'El campo dirección  debe contener menos de 100 caracteres.',
    'direccion.min' => 'El campo dirección  debe contener más de 10 caracteres.',
    
    'cedula.required' => 'El campo cédula es requerido.',
    'cedula.min' => 'El campo cédula debe contener  13 caracteres.',
    'cedula.max' => 'El campo cédula debe contener  13 caracteres.',
    'cedula.unique' => 'El campo cédula debe ser único.',

    'telefono.required' => 'El campo  teléfono es requerido',
    'telefono.min' => 'El campo teléfono debe contener 12 caracteres.',
    'telefono.max' => 'El campo teléfono debe contener 12 caracteres.',

    'celular.required' => 'El campo  celular es requerido',
    'celular.min' => 'El campo celular debe contener 12 caracteres.',
    'celular.max' => 'El campo celular debe contener 12 caracteres.',


    'correo.required' => 'El campo correo es requerido.',
    'correo.email' => 'Asegurese que el campo del correo se encuentre correcto.',
    'correo.unique' => 'El campo correo debe ser único ',
    
    'fecha_nacimiento.required' => 'Ingrese la fecha de nacimiento.' 

    ]

    );


     $cliente = Cliente::create($request->only('nombres', 'apellidos', 'fecha_nacimiento', 'direccion', 'cedula', 'telefono','celular', 'correo', 
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
        // quitar los guiones
        $request['cedula'] = str_replace('-', '', (str_replace('_', '', $request->cedula)));
        $request['celular'] = str_replace('-', '', (str_replace('_', '', $request->celular)));
        $request['telefono'] = str_replace('-', '', (str_replace('_', '', $request->telefono)));

        $this->validate($request, [

        'nombres'      => 'required|min:3|max:50',
        'apellidos'    => 'required|min:3|max:50',
        'fecha_nacimiento' => 'required|date',
        'direccion'    => 'required|min:10|max:100',
        'cedula'       =>  ['required', 'min:11', 'max:11', Rule::unique('clientes')->ignore($cliente->id_cliente, 'id_cliente')],
        'telefono'     => 'required|min:10|max:10',
        'celular'      => 'required|min:10|max:10',
        'correo'       => ['required', 'email', Rule::unique('clientes')->ignore($cliente->id_cliente, 'id_cliente')],
        'id_provincia' => 'required',
        'id_genero'    => 'required'
    ],

    [
    'nombres.required' => 'El campo nombres es requerido.',
    'nombres.min' => 'El campo nombres debe contener más de 2 caracteres.',
    'nombres.max' => 'El campo nombres debe contener menos de 50 caracteres.',
    
    'apellidos.required' => 'El campo apellido es requerido.',
    'apellido.min' => 'El campo apellido debe contener más de 2 caracteres.',
    'apellido.max' => 'El campo apellido debe contener  menos de 2 caracteres',
    
    'direccion.required' => 'El campo dirección es requerido.',
    'direccion.max' => 'El campo dirección  debe contener menos de 100 caracteres.',
    'direccion.min' => 'El campo dirección  debe contener más de 10 caracteres.',
    
    'cedula.required' => 'El campo cédula es requerido.',
    'cedula.min' => 'El campo cédula debe contener al menos 11 caracteres.',
    'cedula.max' => 'El campo cédula no puede contener más de 11 caracteres.',
    'cedula.unique' => 'El campo cédula debe ser único.',

    'telefono.required' => 'El campo  teléfono es requerido',
    'telefono.min' => 'El campo teléfono debe contener al menos 10 caracteres.',
    'telefono.max' => 'El campo teléfono no puede contener más de 10 caracteres.',

    'celular.required' => 'El campo  celular es requerido',
    'celular.min' => 'El campo celular debe contener al menos 10 caracteres.',
    'celular.max' => 'El campo celular no puede contener más de 10 caracteres.',


    'correo.required' => 'El campo correo es requerido.',
    'correo.email' => 'Asegurese que el campo del correo se encuentre correcto.',
    'correo.unique' => 'El campo correo debe ser único ',
    
    'fecha_nacimiento.required' => 'Ingrese la fecha de nacimiento.' 

    ]

    );
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->direccion = $request->direccion;
        $cliente->cedula = $request->cedula;
        $cliente->telefono = $request->telefono;
        $cliente->celular = $request->celular;
        $cliente->correo = $request->correo;
        $cliente->id_provincia = $request->id_provincia;
        $cliente->id_genero = $request->id_genero;
        // $cliente->id_pais = $request->id_pais;
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
