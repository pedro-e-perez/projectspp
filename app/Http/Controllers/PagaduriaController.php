<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagaduriaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $pagaduria = \App\Pagaduria::all();
        //
        return view("Pagaduria.Index", ['pagaduria' => $pagaduria]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view("Pagaduria.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $pagaduria = new \App\Pagaduria();
        $pagaduria->Nombre = $request->input('nombre');
        $pagaduria->save();
        return redirect()->action('PagaduriaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $pagaduria = \App\Pagaduria::find($id);
        return view("pagaduria.Delete", ['pagaduria' => $pagaduria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $pagaduria = \App\Pagaduria::find($id);
        return view("pagaduria.Edit", ['pagaduria' => $pagaduria]);
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
        $pagaduria = \App\Pagaduria::find($id);

        $pagaduria->Nombre = $request->input('nombre');
      


        $pagaduria->save();
        return redirect()->action('PagaduriaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $pagaduria = \App\Pagaduria::find($id);
        $pagaduria->delete();
        return redirect()->action('PagaduriaController@index');
    }

}
