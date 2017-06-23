<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ArchivoController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function Index(Request $request) {
        $request->session()->put('idUsuario', 'pedro perez');

        //$archivos = DB::select('SELECT * FROM archivosfinancieros;');
        $archivos = Usuario::all();
        return view('Archivo.Index', ['archivos' => $archivos]);
    }

    public function edit($id) {
        //
        $barchivo = new \App\Bussiness\BAsociarArchivo();
        $archivo = $barchivo->GetArchivoByID($id);
        return view("archivo.Edit", ['archivo' => $archivo]);
    }

    public function update(Request $request, $id) {

     
        $archivotercero = \App\ArchivoTercero::where('archivo_id', '=', $id)->first();
        //
        $hdffiltersaAsociado = $request->input('hdffiltersaAsociado');
  echo         $hdffiltersaAsociado;
        $hdffiltersPagaduria = $request->input('hdffiltersPagaduria');

        $hdffiltersDocumento = $request->input('hdffiltersDocumento');


        $hdffiltersano = $request->input('hdffiltersano');

        $hdffiltersMes = $request->input('hdffiltersmes');

        $archivotercero->tercero_id = $hdffiltersaAsociado;
        $archivotercero->mes = $hdffiltersMes;
        $archivotercero->ano = $hdffiltersano;
        $archivotercero->pagaduria_id = $hdffiltersPagaduria;
        $archivotercero->tipodocumento_id = $hdffiltersDocumento;
        $barchivo = new \App\Bussiness\BAsociarArchivo();
        $barchivo->UpdateAsociarArchivo($archivotercero);
        return redirect()->action('InformesController@GetInformeDocumentosGen');
    }

}
