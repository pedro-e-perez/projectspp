<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Usuario;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
       
        return view("login.Login", ['error' => null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Redirector $redirect) {
        //
        $request->session()->put('idUsuario', null);
        $request->session()->put('nombreUsuario', null);
        $request->session()->put('administrador', null);
        return redirect("login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Redirector $redirect) {
        //
        Cache::forever('js_version_number', time());
        $user = $request->input('txtUser');
        $pwr = $request->input('txtPwr');

        if ($user == "" Or $pwr == "") {
            $error = "Usuario y contraseña requerido";

            return view('login.Login', ['error' => $error]);
        } else {
            $pwrMd5 = new \App\Bussiness\BUsuario();
            $pwrresult = $pwrMd5->createPassword($pwr);
            $userFind = Usuario::where('Pwr', $pwrresult)
                    ->where('Usuario', $user)
                    ->first();
            if ($userFind != null) {

                $request->session()->put('idUsuario', $userFind->id);
                $request->session()->put('nombreUsuario', $userFind->Nombre . ' ' . $userFind->Apellidos);
                $request->session()->put('administrador', $userFind->Administrador);
                return view('welcome');
            } else {

                return view("login.Login", ['error' => 'Usuario o clave incorrecta']);
            }

            //return View::make('Archivo.Index',['archivos' => null]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        //
        $request->session()->put('idUsuario', null);
        $request->session()->put('nombreUsuario', null);
       
        return view('login.Login', ['error' => null]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
