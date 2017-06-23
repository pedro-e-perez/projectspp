<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerceroController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //
        $hdffiltersaAsociado = $request->input('hdffiltersaAsociado');
        $filtersaAsociado = $request->input('filtersaAsociado');
        if (!empty($hdffiltersaAsociado)) {
            $terceros = \App\Tercero::where('id', '=', $hdffiltersaAsociado)->paginate(30);
        }
         else{
              $terceros = \App\Tercero::paginate(30);
             
         }
        //
        return view("Tercero.Index", ['terceros' => $terceros
             , "filtersaAsociado" => $filtersaAsociado
            , "hdffiltersaAsociado" => $hdffiltersaAsociado
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view("Tercero.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $tercero = new \App\Tercero();

        $tercero->Nombre = $request->input('nombre');
        $tercero->Apellidos = strtoupper($request->input('apellidos'));
        $tercero->NumeroId = strtoupper($request->input('noIdentificacion'));
        $tercero->TipoDoc = strtoupper($request->input('tipoDoc'));
        $tercero->Telefonos = strtoupper($request->input('Telefonos'));
        $tercero->Email = strtoupper($request->input('Email'));


        $tercero->save();
        return redirect()->action('TerceroController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $tercero = \App\Tercero::find($id);
        return view("tercero.Delete", ['tercero' => $tercero]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $tercero = \App\Tercero::find($id);
        return view("tercero.Edit", ['tercero' => $tercero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        $tercero = \App\Tercero::find($id);

        $tercero->Nombre = $request->input('nombre');
        $tercero->Apellidos = strtoupper($request->input('apellidos'));
        $tercero->NumeroId = strtoupper($request->input('noIdentificacion'));
        $tercero->TipoDoc = strtoupper($request->input('tipoDoc'));
        $tercero->Telefonos = strtoupper($request->input('Telefonos'));
        $tercero->Email = strtoupper($request->input('Email'));


        $tercero->save();
        return redirect()->action('TerceroController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $tercero = \App\Tercero::find($id);
        $tercero->delete();
        return redirect()->action('TerceroController@index');
    }

}
