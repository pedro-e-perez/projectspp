<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _TerceroController extends Controller {

    //
    public function GetTercerobyNombreIdentno(Request $request) {
        $token = $request->input('searchText');
        $bTercero = new \App\Bussiness\BTercero();
        $terceros = $bTercero->GetTercerobyNombreIdentno($token);

        return response()->json($terceros);
    }

    

}
