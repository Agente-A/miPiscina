<?php

namespace App\Http\Controllers;

use App\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.registro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([  //Solicitar Datos y validarlos
            'nom'   => 'required',
            'ap'    => 'required',
            'email' =>  ['required','email', 'unique:ADMINISTRADOR,correo'],
            'pass'  =>   'required',
            'calle' =>  '',
            'num'   =>  ''
        ],[                             //Mensajes de error en caso de fallo de validación
            'nom.required'  =>  'El campo nombre es obligatorio!',
            'ap.required'   =>  'El campo apellido es obligatorio!',
            'email.required'=>  'El campo correo es obligatorio!',
            'email.email'   =>  'Por favor ingresa un correo válido',
            'email.unique'  =>  'El correo ingresado ya existe',
            'pass.required' =>  'El campo contraseña es obligatorio!'
        ]);

        Administrador::create([         // Crear Administrador
            'nombre'    =>  $data['nom'],
            'apellido'  =>  $data['ap'],
            'correo'    =>  $data['email'],
            'contrasena'=>  $data['pass'],
            'direccion' =>  $data['calle']." ".$data['num']
        ]);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrador $administrador)
    {
        //
    }

    public function login(Request $request)
    {
        $data = request()->validate([  //Solicitar Datos y validarlos
            'email' =>  ['required','email'],
            'password'  =>   'required',
        ],[                             //Mensajes de error en caso de fallo de validación
            'email.required'=>  'El campo correo es obligatorio!',
            'email.email'   =>  'Por favor ingresa un correo válido',
            'password.required' =>  'El campo contraseña es obligatorio!'
        ]);

        $admin = Administrador::where('CORREO', '=', $data['email'])
                            ->where('CONTRASENA', '=', $data['password'])
                            ->first();

        if ($admin != null)
        {
            session(['admin' => $admin]);
            return redirect()->route('index');
        }
        else
        {
            return back()->withErrors(['msg'=>'Usuario o contraseña incorrectos']);
        }
        
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('index');
    }
}
