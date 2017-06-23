<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _PagaduriaController extends Controller
{
    //
     public function GetPagaduriaByNombre(Request $request) {
        $token = $request->input('searchText');
        $bPagaduria = new \App\Bussiness\BPagaduria();
        $pagaduria = $bPagaduria->GetPagaduriaByNombre($token);

        return response()->json($pagaduria);
    }

}
