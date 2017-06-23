<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class _ArchivoController extends Controller {

    //
    public function GuardarArchivos(Request $request) {

        $jsonArchivo = $request->input('searchText');
        $idAsociado = $request->input('idAsociado');
        $idPagaduria = $request->input('idPagaduria');
        $ano = $request->input('ano');
        $mes = $request->input('mes');
        $bArchivo = new \App\Bussiness\BAsociarArchivo();

        $area = json_decode($jsonArchivo, true);
        $fileResponse = array();
        foreach ($area as $i) {
            $bArchivo->AsociarArchivo($i["nombre"], $idAsociado, $ano, $mes, $idPagaduria);

            $i["eliminado"] = true;
            array_push($fileResponse, $i);
        }
        return $fileResponse;
    }

    public function uploadfiles(Request $request) {


        $file = $request->file('uploadFile');

        $path = $file[0]->store('tmpArchivoDigital');
        $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        return response()->json(["FileName" => $path, "Ruta" => $storagePath . $path]);
    }

    public function getArchivoByiD(Request $request) {
        $idArchivo = $request->input('idArchivo');
        $bArchivo = new \App\Bussiness\BAsociarArchivo();
        return response()->json($bArchivo->GetArchivoByID($idArchivo));
    }

}
