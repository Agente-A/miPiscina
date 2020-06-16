<?php

namespace App\Http\Controllers;

use App\Raspberry;
use App\Piscina;
use App\Medicion;
use Illuminate\Http\Request;

class PiscinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piscinas = Piscina::all();

        $title = "Lista de Piscinas:";

        return view('index', compact('title','piscinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Piscina.registrar');
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
            'nom'       =>  'required',
            'tamano'    =>  'required',
            'sensor'    =>  'required'
        ],[                             //Mensajes de error en caso de fallo de validación
            'nom.required'      =>  'El campo nombre es obligatorio!',
            'tamano.required'   =>  'El campo tamaño es obligatorio!',
            'sensor.required'   =>  'El campo sensor es obligatorio!',
        ]);

        if (!Raspberry::where('id_raspberry', '=', $data['sensor'])->exists()) {
            Raspberry::create([
                'id_raspberry'  =>  $data['sensor'],
                'estado'        =>  '1'
            ]);
         }

        Piscina::create([         // Crear Administrador
            'nombre'        =>  $data['nom'],
            'tamano'        =>  $data['tamano'],
            'id_raspberry'  =>  $data['sensor'],
            'condicion'     =>  '4'
        ]);

        return redirect()->route('index');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Piscina  $piscina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $piscina = Piscina::where('id_piscina',$id)->first();
        $mediciones = $piscina->mediciones();
        //$mediciones = $piscina->raspberry->mediciones->sortBy('FECHA_Y_HORA');
        return view('Piscina.administrar', compact('piscina','mediciones'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Piscina  $piscina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $piscina = Piscina::where('id_piscina',$id)->first();
        return view('Piscina.modificar', compact('piscina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Piscina  $piscina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([  //Solicitar Datos y validarlos
            'nom'       =>  'required',
            'tamano'    =>  'required',
            'sensor'    =>  'required'
        ],[                             //Mensajes de error en caso de fallo de validación
            'nom.required'      =>  'El campo nombre es obligatorio!',
            'tamano.required'   =>  'El campo tamaño es obligatorio!',
            'sensor.required'   =>  'El campo sensor es obligatorio!',
        ]);

        if (!Raspberry::where('id_raspberry', '=', $data['sensor'])->exists()) {
            Raspberry::create([
                'id_raspberry'  =>  $data['sensor'],
                'estado'        =>  '1'
            ]);
         }
         
        $piscina = Piscina::where('id_piscina',$id)
            ->update([         // Modificar
                'nombre'        =>  $data['nom'],
                'tamano'        =>  $data['tamano'],
                'id_raspberry'  =>  $data['sensor']
            ]);

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Piscina  $piscina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piscina = Piscina::where('id_piscina',$id)->delete();

        return redirect()->route('index');
    }
}
