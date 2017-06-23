<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use App\Bussiness\BUsuario;

class UsuarioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $usuarios = Usuario::all();
        //
        return view("Usuario.Index", ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view("Usuario.Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $usuario = new Usuario();
        $busuario = new BUsuario();
        $usuario->Nombre = $request->input('nombres');
        $usuario->Apellidos = $request->input('apellidos');
        $usuario->email = $request->input('mail');
        $usuario->telefono = $request->input('mail');
        $usuario->Usuario = $usuario->email;
        $usuario->Pwr = $busuario->createPassword('123');

        $usuario->save();
        return redirect()->action('UsuarioController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $usuario = Usuario::find($id);
        //
        return view("Usuario.Delete", ['usuario' => $usuario]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $usuario = Usuario::find($id);
        //
        return view("Usuario.Editar", ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function editPwr($id) {
        //
        $usuario = Usuario::find($id);
        //
        return view("Usuario.EditarPwr", ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        $usuario = Usuario::find($id);
        if ($request->has('editpwr')) {
            $busuario = new BUsuario();
            $usuario->Pwr = $busuario->createPassword($request->input('password'));
        } else {
            $usuario->Nombre = $request->input('nombres');
            $usuario->Apellidos = $request->input('apellidos');
            $usuario->email = $request->input('mail');
            $usuario->telefono = $request->input('mail');
            if ($request->has('chkAdmin')) {
                $usuario->Administrador = 1;
            } else {

                $usuario->Administrador = 0;
            }
        }
        $usuario->save();
        return redirect()->action('UsuarioController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect()->action('UsuarioController@index');
    }

}
