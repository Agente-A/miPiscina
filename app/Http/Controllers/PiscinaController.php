<?php

namespace App\Http\Controllers;

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
        //
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
        $mediciones = Medicion::where('ID_RASPBERRY',$piscina->raspberry->ID_RASPBERRY)
                                ->orderBy('FECHA_Y_HORA','DESC')
                                ->get();
        //$mediciones = $piscina->raspberry->mediciones->sortBy('FECHA_Y_HORA');
        return view('Piscina.administrar', compact('piscina','mediciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Piscina  $piscina
     * @return \Illuminate\Http\Response
     */
    public function edit(Piscina $piscina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Piscina  $piscina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piscina $piscina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Piscina  $piscina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piscina $piscina)
    {
        //
    }
}
