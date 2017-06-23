<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _TipoDocumentoController extends Controller {

    //
    public function GetTipoDocumentoByTipo(Request $request) {
        $token = $request->input('searchText');
        $bPagaduria = new \App\Bussiness\BTipoDocumento();
        $pagaduria = $bPagaduria->GetTipoDocumentoByTipo($token);

        return response()->json($pagaduria);
    }

}
