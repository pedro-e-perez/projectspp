<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoDocumentoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $tipoDocumentos = \App\TipoDocumento::all();
        //
        return view("TipoDocumento.Index", ['tipoDocumentos' => $tipoDocumentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view("TipoDocumento.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        //
        $tipoDocumento = new \App\TipoDocumento();

        $tipoDocumento->Nombre = $request->input('nombre');
        $tipoDocumento->Nomenclatura = strtoupper($request->input('nomenclatura'));


        $tipoDocumento->save();
        return redirect()->action('TipoDocumentoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        //
        $tipoDocumento = \App\TipoDocumento::find($id);
        return view("TipoDocumento.Delete", ['tipoDocumento' => $tipoDocumento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $tipoDocumento = \App\TipoDocumento::find($id);
        return view("TipoDocumento.Edit", ['tipoDocumento' => $tipoDocumento]);
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
        $tipoDocumento = \App\TipoDocumento::find($id);


        $tipoDocumento->Nombre = $request->input('nombre');
        $tipoDocumento->Nomenclatura = strtoupper($request->input('nomenclatura'));


        $tipoDocumento->save();
        return redirect()->action('TipoDocumentoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $tipoDocumento = \App\TipoDocumento::find($id);
        $tipoDocumento->delete();
        return redirect()->action('TipoDocumentoController@index');
    }

}
