<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformesController extends Controller {

    //
    public function GetInformeDocumentos(Request $request) {

        $hdffiltersaAsociado = $request->input('hdffiltersaAsociado');
        $filtersaAsociado = $request->input('filtersaAsociado');
        $hdffiltersPagaduria = $request->input('hdffiltersPagaduria');
        $filtersPagaduria = $request->input('filtersPagaduria');
        $hdffiltersDocumento = $request->input('hdffiltersDocumento');
        $filtersDocumento = $request->input('filtersDocumento');
        $filtersano = $request->input('filtersano');
        $hdffiltersano = $request->input('hdffiltersano');
        $filtersMes = $request->input('filtersMes');
        $hdffiltersMes = $request->input('hdffiltersMes');
        $bInformes = new \App\Bussiness\BInformes();
        $informe = $bInformes->GetInformeDocumentos($hdffiltersaAsociado, $hdffiltersPagaduria, $hdffiltersDocumento, $hdffiltersano, $hdffiltersMes);

        return view("Informes.InformeDocumentos", ['informe' => $informe
            , "filtersaAsociado" => $filtersaAsociado
            , "hdffiltersaAsociado" => $hdffiltersaAsociado
            , "filtersPagaduria" => $filtersPagaduria
            , "hdffiltersPagaduria" => $hdffiltersPagaduria
            , "filtersDocumento" => $filtersDocumento
            , "hdffiltersDocumento" => $hdffiltersDocumento
            , "filtersano" => $filtersano
            , "hdffiltersano" => $hdffiltersano
            , "filtersMes" => $filtersMes
            , "hdffiltersMes" => $hdffiltersMes]);
    }

    public function GetInformeDocumentosGen(Request $request) {

        $hdffiltersaAsociado = $request->input('hdffiltersaAsociado');
        $filtersaAsociado = $request->input('filtersaAsociado');
        $hdffiltersPagaduria = $request->input('hdffiltersPagaduria');
        $filtersPagaduria = $request->input('filtersPagaduria');
        $hdffiltersDocumento = $request->input('hdffiltersDocumento');
        $filtersDocumento = $request->input('filtersDocumento');
        $filtersano = $request->input('filtersano');
        $hdffiltersano = $request->input('hdffiltersano');
        $filtersMes = $request->input('filtersMes');
        $hdffiltersMes = $request->input('hdffiltersMes');
        $bInformes = new \App\Bussiness\BInformes();
        $informe = $bInformes->GetInformeDocumentos($hdffiltersaAsociado, $hdffiltersPagaduria, $hdffiltersDocumento, $hdffiltersano, $hdffiltersMes);

        return view("Informes.InformeDocumentosGen", ['informe' => $informe
            , "filtersaAsociado" => $filtersaAsociado
            , "hdffiltersaAsociado" => $hdffiltersaAsociado
            , "filtersPagaduria" => $filtersPagaduria
            , "hdffiltersPagaduria" => $hdffiltersPagaduria
            , "filtersDocumento" => $filtersDocumento
            , "hdffiltersDocumento" => $hdffiltersDocumento
            , "filtersano" => $filtersano
            , "hdffiltersano" => $hdffiltersano
            , "filtersMes" => $filtersMes
            , "hdffiltersMes" => $hdffiltersMes]);
    }

    public function GetFiltersInfo(Request $request) {

        $type = $request->input('type');
        $token = $request->input('token');
        $bInformes = new \App\Bussiness\BInformes();
        $respuesta = $bInformes->GetFiltersInfo($token, $type);

        return response()->json($respuesta);
    }

}
